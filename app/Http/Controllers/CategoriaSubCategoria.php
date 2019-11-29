<?php

namespace SistemaVentasLinea\Http\Controllers;
use SistemaVentasLinea\Subcategoria;
use Illuminate\Http\Request;

class CategoriaSubCategoria extends Controller
{
    public function show($id,Request $request)
    {
        $request->user()->authorizeRoles('user');
        return view("usuario.subcategoria",["subcategorias"=>Subcategoria::where('idcategoria',$id)->get()]);
    }
}
