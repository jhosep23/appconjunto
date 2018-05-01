<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    	public $timestamps = false;
	
     protected $fillable = [
       'id_usuario', 'nombre', 'apellido', 'telefono_fijo', 'telefono_celular', 'citofono', 'fecha_nacimiento', 'correo', 'password', 'interior','estado',
    ];

}
