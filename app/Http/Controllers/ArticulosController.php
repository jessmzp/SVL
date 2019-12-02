<?php

namespace SistemaVentasLinea\Http\Controllers;

use Illuminate\Http\Request;
use SistemaVentasLinea\Http\Requests\ArticuloFormRequest;
use SistemaVentasLinea\Articulo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;

class ArticulosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //permiso
        // $request->user()->authorizeRoles('user');
        $isAdmin = $request->user()->hasRole('admin');
        //validamos:
        // if($request)
        // {
            //Si existe request obtengo todos los registros de la tabla categoria de la BD
            //me determina el texto de busqueda para filtrar todas las categorias
        $query=trim($request->get('searchText'));
        $articulos=DB::table('articulo as art')
        ->join ('departamento as dep','art.iddepto','=','dep.iddepto')
        ->join ('categoria as cat','art.idcategoria','=','cat.idcategoria')
        ->join ('subcategoria as scat','art.idsubcategoria','=','scat.idsubcategoria')
        ->select('art.idarticulo','art.nomarticulo','art.descriparticulo','art.precioarticulo','art.stockarticulo',
            'art.imagenarticulo','art.detallearticulo','art.estado','scat.nomsubcategoria as subcategoria',
            'cat.nomcategoria as categoria','dep.nomdepto as departamento','dep.iddepto','cat.idcategoria',
            'scat.idsubcategoria')
        ->where('art.nomarticulo','LIKE','%'.$query.'%')
        ->where('art.estado','=','Disponible')
        ->where('dep.estado','=','1')
        ->where('cat.estado','=','1')
        ->where('scat.estado','=','1')
        ->orderBy('art.idarticulo','desc')
        ->paginate(7);
        if($isAdmin)
        {
            return view('tienda.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
        }
        else
        {
            return view('tienda.articulos',["articulos"=>$articulos,"searchText"=>$query]);
        }
        // }
    }
    public function show($detallearticulo)
    {
        $articulo =Articulo::where ('detallearticulo',$detallearticulo)->first();
        //primero que encuentre
        //dd($articulo);
        return view('usuario.show',["articulo"=>$articulo]);
    
    
    }
}
