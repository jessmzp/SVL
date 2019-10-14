<?php

namespace SistemaVentasLinea;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table='categoria';
    protected $primaryKey='idcategoria';

   //Cuando ha sido creado y registrado el registro
    public $timestamps=false;
    //campos que van a recibir un valor para almacenar 
    protected $fillable=[
        'nombre',
        'descripcion',
        'condicion',

    ];
}
