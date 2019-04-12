<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    //
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = ['id','dni','nombre','apellido_pate','apellido_mate','nro_celular','fecha','turbo','oemi','motor','placa','descripcion','adelanto','costo_total','cliente_id','created_at',
    	'update_at'];
 
}
