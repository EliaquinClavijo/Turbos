<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reclamo extends Model
{
    //
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = ['id','text','fecha_reclamo','estado'];
}
