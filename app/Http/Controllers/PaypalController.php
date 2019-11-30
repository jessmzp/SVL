<?php

namespace SistemaVentasLinea\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundations\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;


use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;

class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {
    $paypal_conf= \Config::get('paypal');
    $this->_api_context =new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'],$paypal_conf['secret']));
    $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function postPayment()
    {
        //creando nuestros objetos.
        //cliente que hara el pago.
        $payer=new Payer();
        $payer->setPaymentMethod('paypal');

        $items=array();
        $subtotal=0;
        $carrito=\Session::get('carrito');
        $currency='USD';

        foreach($carrito as $articulo)
        {
            $item =new Item();
            $item->setName($articulo->nomarticulo)
            ->setCurrency($currency)
            ->setDescription($articulo->descriparticulo)
            ->setQuantity($articulo->cantidad)
            ->setPrice($articulo->precioarticulo);
            $items[]=$item;   
            $subtotal+=$articulo->cantidad*$articulo->precioarticulo;
        }
        $item_list= new ItemList();
        $item_list->setItems($items);
        

        $details=new Details();
        $details->setSubTotal($subtotal)
        ->setShipping(100);


        $total=$subtotal+100;
        $amount =new Amount();
        $amount->setCurrency($currency)
               ->setTotal($total)
               ->setDetails($details);

        $transaction =new Transaction();
        $transaction->setAmount($amount)
        ->setItemList($item_list)
        ->setDescription('Pedido de prueba');

        $redirect_urls=new RedirectUrls();
        $redirect_urls->setReturnUrl(\URL::route('payment.status'))
        ->setCancelUrl(\URL::route('payment.status'));
//Pasamos todo.
        $payment=new Payment();
        $payment->setIntent('Sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirect_urls)
        ->setTransactions(array($transaction));

        //conexion
        try{
            $payment->create($this->_api_context);
        }catch(\PayPal\Exception\PPConnectionException $ex){
            if(\Config::get('app.debug')){
                echo "Exception: " . $ex->getMessage() .PHP_EQL;
                $err_data =json_decode($ex->getData(), true);
                exit;
            } else{
                die('Algo salió mal');
            }
        }
        foreach($payment->getLinks() as $link){
            if($link->getRel() =='approval_url'){
                $redirect_url =$link->getHref();
            break;
            }
        }
//Pago ID a la sesion
    \Session::put('paypal_payment_id',$payment->getId());
    if(isset($redirect_url)){
        //redirige a paypal
        return \Redirect::away($redirect_url);
    }
    return \Redirect::route('carrito-mostrar')
    ->with('message','Error desconocido');

    }

    
    public function getPaymentStatus()
    {
        // Get the payment ID before session clear
        $payment_id = \Session::get('paypal_payment_id');
        // clear the session payment ID
        \Session::forget('paypal_payment_id');
        $payerId=\Input::get('PayerID');
        $token=\Input::get('token');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            return \Redirect::route('home')->with('error', 'Payment failed');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
       
        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);
        echo '<pre>';
        print_r($result);
        echo '</pre>';
        exit;
        // DEBUG RESULT, remove it later
        if ($result->getState() == 'approved') {
            // payment made
            return \Redirect::route('home')->with('success', 'Payment success');
        }
        return \Redirect::route('home')->with('error', 'Payment failed');
    }
        
    }
