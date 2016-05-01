<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
*	Desarrollado por Daniel Klie.
*	danielnswz@gmail.com
*/
class Cliente extends Model
{

    public $timestamps = false;
    //id,nombre,apellido,correo y edad
    protected $fillable = ['nombre', 'apellido', 'correo', 'edad'];
}
