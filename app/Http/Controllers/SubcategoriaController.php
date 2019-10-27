<?php

namespace SistemaVentasLinea\Http\Controllers;

use Illuminate\Http\Request;


//Hago referencia al modelo subcategoria
//use SistemaVentasLinea\Http\Request;
use SistemaVentasLinea\Subcategoria;
//para hacer redireccion
use Illuminate\Support\Facades\Redirect;
use SistemaVentasLinea\Http\Requests\SubcategoriaFormRequest;
use DB;

class SubcategoriaController extends Controller
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
            //Si existe request obtengo todos los registros de la tabla subsubcategoria de la BD
            //me determina el texto de busqueda para filtrar todas las subsubcategorias
            $query=trim($request->get('searchText'));
            $subcategorias=DB::table('subcategoria as scat')
            ->join ('categoria as cat','scat.idcategoria','=','cat.idcategoria')
            ->select('cat.idcategoria','cat.nomcategoria','cat.descricategoria','cat.estado','dep.nomdepto as departamento')
            ->where('scat.nomsubcategoria','LIKE','%'.$query.'%')
            ->where('scat.estado','=','1')
            ->orderBy('scat.idsubsubcategoria','desc')
            ->paginate(7);
            return view('tienda.subcategoria.index',["subcategorias"=>$subcategorias,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("tienda.subcategoria.create");
    }
//almacena el objeto del modelo subsubcategoria en nuestra tabla subsubcategoria de la BD
//validamos utilizando el request subsubcategoriaFormRequest
    public function store(subcategoriaFormRequest $request)

    {
    
        $subcategoria=new subsubcategoria;
        $subcategoria->nomsubcategoria=$request->get('nombre');
        $subcategoria->descrisubcategoria=$request->get('descripcion');
        $subcategoria->estado='1';
        $subcategoria->save();
        return Redirect::to('tienda/subcategoria');
    }

    public function show($id)
    {
        return view("tienda.subcategoria.show",["subcategoria"=>subcategoria::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("tienda.subcategoria.edit",["subcategoria"=>subcategoria::findOrFail($id)]);
    }

    public function update(subcategoriaFormRequest $request,$id)
    {
        
        $subcategoria=subsubcategoria::findOrFail($id);
        $subcategoria->nomsubcategoria=$request->get('nombre');
        $subcategoria->descrisubcategoria=$request->get('descripcion');
        $subcategoria->update();
        return Redirect::to('tienda/subcategoria');
    }

    public function destroy($id)
    {
        $subcategoria=subcategoria::findOrFail($id);
        $subcategoria->estado='0';
        $subcategoria->update();
        return Redirect::to('tienda/subcategoria');
    }
}
