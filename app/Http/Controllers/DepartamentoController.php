<?php

namespace SistemaVentasLinea\Http\Controllers;

use Illuminate\Http\Request;
//Hago referencia al modelo departamento
//use SistemaVentasLinea\Http\Request;
use SistemaVentasLinea\Departamento;
//para hacer redireccion
use Illuminate\Support\Facades\Redirect;
use SistemaVentasLinea\Http\Requests\DepartamentoFormRequest;
use DB;

class DepartamentoController extends Controller
{
    public function __construct()
    {
        //lo utilizaremos para validar

    }
    public function index(Request $request)
    {
        //validamos:
        if($request)
        {
            //Si existe request obtengo todos los registros de la tabla categoria de la BD
            //me determina el texto de busqueda para filtrar todas las categorias
            $query=trim($request->get('searchText'));
            $departamentos=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orderBy('idcategoria','desc')
            ->paginate(7);
            return view('tienda.departamento.index',["departamentos"=>$departamentos,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("tienda.departamento.create");
    }
//almacena el objeto del modelo categoria en nuestra tabla categoria de la BD
//validamos utilizando el request DepartamentoFormRequest
    public function store(DepartamentoFormRequest $request)

    {
    
        $departamento=new Departamento;
        $departamento->nombre=$request->get('nombre');
        $departamento->descripcion=$request->get('descripcion');
        $departamento->condicion='1';
        $departamento->save();
        return Redirect::to('tienda/departamento');
    }

    public function show($id)
    {
        return view("tienda.departamento.show",["departamento"=>Departamento::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("tienda.departamento.edit",["departamento"=>Departamento::findOrFail($id)]);
    }

    public function update(DepartamentoFormRequest $request,$id)
    {
        
        $departamento=Departamento::findOrFail($id);
        $departamento->nombre=$request->get('nombre');
        $departamento->descripcion=$request->get('descripcion');
        $departamento->update();
        return Redirect::to('tienda/departamento');
    }

    public function destroy($id)
    {
        $departamento=Departamento::findOrFail($id);
        $departamento->condicion='0';
        $departamento->update();
        return Redirect::to('tienda/departamento');
    }
}