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

Route::get('/', function () { 
    return view('auth/login');});
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*Route::get('/', function(){  
    return 'Home';
});  

Route::get('/usuarios', function(){
    return 'Usuarios';
}); */ 

Route::resource('tienda/departamento','DepartamentoController');
Route::resource('tienda/departamento/categoria','DepartamentoCategoria');
Route::resource('tienda/departamento/categoria/subcategoria','CategoriaSubCategoria');
Route::resource('tienda/departamento/categoria/subcategoria/articulo','SubCategoriaArticulo');
Route::resource('tienda/categoria','CategoriaController');
Route::resource('tienda/subcategoria','SubcategoriaController');
Route::resource('tienda/articulo','ArticuloController');
Route::resource('usuario/articuloU','ArticuloController');
Route::get('usuario/contactanos','ContactanosController@index');
/*function index(){
    $departamento = Departamento::all();
    $articulo   = Articulo::all();

    return view('/tienda', compact('departamento', 'articulo'));
} */