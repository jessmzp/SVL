<?php

namespace SistemaVentasLinea\Http\Controllers;

use Illuminate\Http\Request;
use SistemaVentasLinea\Articulo;
use Illuminate\Session;

class CarritoController extends Controller
{
    public function __construct()
    {
        if(!\Session::has('carrito'))\Session::put('carrito',array());
    }
    //Mostrar carrito
    public function show()
    {
       // return \Session::get('carrito');
       $carrito=\Session::get('carrito');
       $total=$this->total();
       return view('tienda.carrito',["carrito"=>$carrito,"total"=>$total]);

    }
    //Añadir articulo
    public function add(Articulo $articulo)
    {
        //Variable de sesion carrito:
        $carrito =\Session::get('carrito');
       //Propiedad de cantidad:
        $articulo->cantidad=1;
         //Agregamos a nuestro arreglo, se guarda en la posicion que define el detallearticulo
        $carrito[$articulo->detallearticulo]=$articulo;
        \Session::put('carrito',$carrito);
        return redirect()->route('carrito-mostrar');

    }

    //Eliminar articulo
    public function delete(Articulo $articulo)
    {
        $carrito=\Session::get('carrito');
        unset($carrito[$articulo->detallearticulo]);
        \Session::put('carrito',$carrito);
        return redirect()->route('carrito-mostrar');
    }

    //Actualizar articulo
    public function update($articuloId,$cantidad)
    {

        $carrito=\Session::get('carrito');
        $carrito[$articulo->detallearticulo]->cantidad=$cantidad;
        \Session::put('carrito',$carrito);
        return redirect()->route('carrito-mostrar');
    }

    //Vaciar carrito
    public function trash()
    {
        \Session::forget('carrito');
        return redirect()->route('carrito-mostrar');
    }

    //Total
    private function total()
    {
        $carrito=\Session::get('carrito');
        $total=0;
        foreach($carrito as $art){
            $total+=$art->precioarticulo*$art->cantidad;
        }
        return $total;
    }

    public function detalleOrden()
    {
        if(count(\Session::get('carrito'))<=0) return redirect()->route('home');
        $carrito=\Session::get('carrito');
        $total=$this->total();
        return view('tienda.detalle-orden',["carrito"=>$carrito,"total"=>$total]);
    }

}
