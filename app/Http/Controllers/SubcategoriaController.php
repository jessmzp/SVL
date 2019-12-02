<?php

namespace SistemaVentasLinea\Http\Controllers;

use Illuminate\Http\Request;

//Hago referencia al modelo Subcategoria
//use SistemaVentasLinea\Http\Request;
use SistemaVentasLinea\Subcategoria;
use SistemaVentasLinea\Articulo;
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
        //permiso
        // $request->user()->authorizeRoles('admin');
        $isAdmin = $request->user()->hasRole('admin');
        //validamos:
        $query=trim($request->get('searchText'));
        $subcategorias=DB::table('subcategoria as scat')
        ->join ('categoria as cat','scat.idcategoria','=','cat.idcategoria')
        ->select('scat.idsubcategoria','scat.nomsubcategoria','scat.descrisubcategoria','scat.estado','cat.nomcategoria as categoria')
        ->where('scat.nomsubcategoria','LIKE','%'.$query.'%')
        ->where('scat.estado','=','1')
        ->orderBy('scat.idsubcategoria','desc')
        ->paginate(7);
        if($isAdmin)
        {
            //Si existe request obtengo todos los registros de la tabla Subcategoria de la BD
            //me determina el texto de busqueda para filtrar todas las Subcategorias
            return view('tienda.subcategoria.index',["subcategorias"=>$subcategorias,"searchText"=>$query]);
        }
        else
        {
            return view('usuario.subcategoria',["subcategorias"=>$subcategorias,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $categorias=DB::table('categoria as cat')->where('cat.estado','=','1')->get();
        return view("tienda.subcategoria.create",["categorias"=>$categorias]);
    }
//almacena el objeto del modelo Subcategoria en nuestra tabla Subcategoria de la BD
//validamos utilizando el request SubcategoriaFormRequest
    public function store(SubcategoriaFormRequest $request)

    {
    
        $subcategoria=new Subcategoria;
        $subcategoria->idcategoria=$request->get('idcategoria');
        $subcategoria->nomsubcategoria=$request->get('nombre');
        $subcategoria->descrisubcategoria=$request->get('descripcion');
        $subcategoria->estado='1';
        $subcategoria->save();
        return Redirect::to('tienda/subcategoria');
    }

   // public function show($id)
    //{
      //  return view("tienda.subcategoria.show",["subcategoria"=>subcategoria::findOrFail($id)]);
   // }
   public function show($id, Request $request)
   {
    //    $id =$request->id;
       $request->user()->hasRole('user');
       // $request->user()->authorizeRoles('user');
       return view("tienda.articulo",["articulos"=>Articulo::where('idsubcategoria',$id)->get()]);
   }

    public function edit($id)
    {
        $subcategoria=Subcategoria::findOrFail($id);
        $categorias=DB::table('categoria as cat')->where('cat.estado','=','1')->get();
        return view("tienda.subcategoria.edit",["subcategoria"=>$subcategoria,"categorias"=>$categorias]);
    }

    public function update(SubcategoriaFormRequest $request,$id)
    {
        
        $subcategoria=subcategoria::findOrFail($id);
        $subcategoria->idcategoria=$request->get('idcategoria');
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
