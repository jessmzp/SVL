<?php

namespace SistemaVentasLinea\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistemaVentasLinea\Http\Requests\ArticuloFormRequest;
use sistemaVentasLinea\Articulo;
use DB;


class ArticuloController extends Controller
{
    public function __construct()
    {
        //lo utilizaremos para validar
        $this->middleware('auth');

    }
    public function index(Request $request)
    {
        //validamos:
        if($request)
        {
            //Si existe request obtengo todos los registros de la tabla categoria de la BD
            //me determina el texto de busqueda para filtrar todas las categorias
            $query=trim($request->get('searchText'));
            $articulos=DB::table('articulo as art')
            ->join ('departamento as dep','art.iddepto','=','dep.iddepto')
            ->select('art.idarticulo','art.nombarticulo','art.descriparticulo','art.precioarticulo','art.stockarticulo','art.imagenarticulo','art.detallearticulo','art.estado','dep.nomdepto as departamento')
            ->join ('categoria as cat','art.idcategoria','=','cat.idcategoria')
            ->select('art.idarticulo','art.nomarticulo','art.descriparticulo','art.precioarticulo','art.stockarticulo','art.imagenarticulo','art.detallearticulo','art.estado','cat.nomcategoria as categoria')
            ->join ('subcategoria as scat','art.idsubcategoria','=','scat.idsubcategoria')
            ->select('art.idarticulo','art.nomarticulo','art.descriparticulo','art.precioarticulo','art.stockarticulo','art.imagenarticulo','art.detallearticulo','art.estado','scat.nomsubcategoria as subcategoria')
            ->where('art.nomarticulo','LIKE','%'.$query.'%')
            ->where('art.estado','=','1')
            ->orderBy('art.idarticulo','desc')
            ->paginate(7);
            return view('tienda.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $departamentos=DB::table('departamento')->where('dep.estado','=','1')->get();
        $categorias=DB::table('categoria')->where('cat.estado','=','1')->get();
        $subcategorias=DB::table('subcategoria')->where('scat.estado','=','1')->get();
        return view("tienda.articulo.create",["departamentos"=>$departamentos,"categorias"=>$categorias,"subcategorias"=>$subcategorias]);
    }
//almacena el objeto del modelo categoria en nuestra tabla categoria de la BD
//validamos utilizando el request DepartamentoFormRequest
    public function store(ArticuloFormRequest $request)

    {
    
        $articulo=new Articulo;
        $articulo->iddepto=$request->get('iddepartamento');
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->idsubcategoria=$request->get('idsubcategoria');
        $articulo->nomarticulo=$request->get('nombre');
        $articulo->descriparticulo=$request->get('descripcion');
        $articulo->precioarticulo=$request->get('precio');
        $articulo->stockarticulo=$request->get('stock');
        $articulo->imagenarticulo=$request->get('imagen');
        $articulo->detallearticulo=$request->get('detalle');
        $articulo->estado='Activo';
        if (Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
        }
        $departamento->save();
        return Redirect::to('tienda/articulo');
    }

    public function show($id)
    {//Ver detalles del articulo
        //Boton para los detalles del articulo
        return view("tienda.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }

    public function edit($id)
    {
        //Editar a un articulo en especifico
        $articulo=Articulo::findOrFail($id);
        $departamentos=DB::table('departamento')->where('dep.estado','=','1')->get();
        $categorias=DB::table('categoria')->where('cart.estado','=','1')->get();
        $subcategorias=DB::table('subcategoria')->where('scat.estado','=','1')->get();
        return view("tienda.articulo.edit",["articulo"=>$articulo,"departamento"=>$departamento,"categoria"=>$categoria,"subcategoria"=>$subcategoria]);
    }

    public function update(ArticuloFormRequest $request,$id)
    {
        
        $articulo=Articulo::findOrFail($id);
        $articulo->iddepto=$request->get('iddepartamento');
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->idsubcategoria=$request->get('idsubcategoria');
        $articulo->nomarticulo=$request->get('nombre');
        $articulo->descriparticulo=$request->get('descripcion');
        $articulo->precioarticulo=$request->get('precio');
        $articulo->stockarticulo=$request->get('stock');
        $articulo->imagenarticulo=$request->get('imagen');
        $articulo->detallearticulo=$request->get('detalle');
        $articulo->estado='Disponible';
        if (Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
        }
        $articulo->update();
        return Redirect::to('tienda/articulo');
    }

    public function destroy($id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->estado='agotado';
        $articulo->update();
        return Redirect::to('tienda/articulo');
    }
}
