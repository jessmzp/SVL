<?php

namespace SistemaVentasLinea;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
  
    protected $table='articulo';
    protected $primaryKey='idarticulo';

   //Cuando ha sido creado y registrado el registro
    public $timestamps=false;
    //campos que van a recibir un valor para almacenar 
    protected $fillable=[
        'iddepto',
        'idcategoria',
        'idsubcategoria',
        'nomarticulo',
        'descriparticulo',
        'precioarticulo',
        'stockarticulo',
        'imagenarticulo',
        'detallearticulo',
        'estado',

    ];

}
