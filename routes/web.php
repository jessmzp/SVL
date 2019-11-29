<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::bind('articulo',function($detallearticulo)
{
return SistemaVentasLinea\Articulo::where('detallearticulo',$detallearticulo)->first();
});
Route::get('/', function () { 
    return view('auth/login');});
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/articulos/{detallearticulo}','ArticulosController@show')->name('articulo-detalle');
Route::get('/usuario/articulos','ArticulosController@index')->name('articulos');
Route::get('carrito/mostrar','CarritoController@show')->name('carrito-mostrar');
Route::get('carrito/agregar/{articulo}','CarritoController@add')->name('carrito-añadir');
Route::get('carrito/eliminar/{articulo}','CarritoController@delete')->name('carrito-eliminar');
Route::get('carrito/vaciar','CarritoController@trash')->name('carrito-vaciar');
Route::get('carrito/actualizar/{articulo}/{cantidad}','CarritoController@update')->name('carrito-actualizar');
Route::get('detalle-orden','CarritoController@detalleOrden',['middleware'=>['auth']])->name('detalle-orden');
/*Route::get('/', function(){  
    return 'Home';
});  

Route::get('/usuarios', function(){
    return 'Usuarios';
}); */ 

//Enviando pedido a paypal
Route::get('payment',array(
    'as'=>'payment',
    'uses'=>'PaypalController@postPayment',
));

//PAYPAL
Route::get('payment/status',array(
    'as'=>'payment.status',
    'uses'=>'PaypalController@getPaymentStatus',
));


Route::resource('tienda/departamento','DepartamentoController');
Route::resource('tienda/categoria','CategoriaController');
Route::resource('tienda/subcategoria','SubcategoriaController');
Route::resource('tienda/articulo','ArticuloController');
Route::resource('usuario/articuloU','ArticuloUController');
Route::resource('usuario/articulos','ArticulosController');



/*function index(){
    $departamento = Departamento::all();
    $articulo   = Articulo::all();

    return view('/tienda', compact('departamento', 'articulo'));
} */