<?php

namespace SistemaVentasLinea\Http\Controllers;
use SistemaVentasLinea\Articulo;
use Illuminate\Http\Request;

class SubCategoriaArticulo extends Controller
{
    public function show($id,Request $request)
    {
        $request->user()->hasRole('user');
        // $request->user()->authorizeRoles('user');
        return view("usuario.articuloU",["articulos"=>Articulo::where('idsubcategoria',$id)->get()]);
    }
}
