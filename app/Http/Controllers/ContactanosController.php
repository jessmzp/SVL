<?php

namespace SistemaVentasLinea\Http\Controllers;

use Illuminate\Http\Request;
use SistemaVentasLinea\Http\Requests\ArticuloFormRequest;
use SistemaVentasLinea\Articulo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;

class ContactanosController extends Controller
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
        $request->user()->authorizeRoles('user');
        //validamos:
        
        return view('usuario.contactanos');
    }
}
