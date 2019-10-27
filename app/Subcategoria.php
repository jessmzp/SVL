<?php

namespace SistemaVentasLinea;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $table='subcategoria';
    protected $primaryKey='idsubcategoria';

   //Cuando ha sido creado y registrado el registro
    public $timestamps=false;
    //campos que van a recibir un valor para almacenar 
    protected $fillable=[
        'idcategoria',
        'nomsubcategoria',
        'descrisubcategoria',
        'estado',

    ];
}

