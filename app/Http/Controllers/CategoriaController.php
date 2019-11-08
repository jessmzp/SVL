<?php

namespace SistemaVentasLinea\Http\Controllers;

use Illuminate\Http\Request;

//Hago referencia al modelo categoria
//use SistemaVentasLinea\Http\Request;
use SistemaVentasLinea\Categoria;
//para hacer redireccion
use Illuminate\Support\Facades\Redirect;
use SistemaVentasLinea\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
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
            $categorias=DB::table('categoria as cat')
            ->join ('departamento as dep','cat.iddepto','=','dep.iddepto')
            ->select('cat.idcategoria','cat.nomcategoria','cat.descricategoria','cat.estado','dep.nomdepto as departamento')
            ->where('cat.nomcategoria','LIKE','%'.$query.'%')
            ->where('cat.estado','=','1')
            ->orderBy('cat.idcategoria','desc')
            ->paginate(7);
            return view('tienda.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("tienda.categoria.create");
    }
//almacena el objeto del modelo categoria en nuestra tabla categoria de la BD
//validamos utilizando el request categoriaFormRequest
    public function store(categoriaFormRequest $request)

    {
    
        $categoria=new categoria;
        $categoria->nomcategoria=$request->get('nombre');
        $categoria->descricategoria=$request->get('descripcion');
        $categoria->estado='1';
        $categoria->save();
        return Redirect::to('tienda/categoria');
    }

    public function show($id)
    {
        return view("tienda.categoria.show",["categoria"=>categoria::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("tienda.categoria.edit",["categoria"=>categoria::findOrFail($id)]);
    }

    public function update(categoriaFormRequest $request,$id)
    {
        
        $categoria=categoria::findOrFail($id);
        $categoria->nomcategoria=$request->get('nombre');
        $categoria->descricategoria=$request->get('descripcion');
        $categoria->update();
        return Redirect::to('tienda/categoria');
    }

    public function destroy($id)
    {
        $categoria=categoria::findOrFail($id);
        $categoria->estado='0';
        $categoria->update();
        return Redirect::to('tienda/categoria');
    }
}