<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{

    protected $fillable = ['id','nombre','apellido_pate','apellido_mate','nro_celular','created_at',
    	'update_at'];
}
