<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
	protected $table = 'noticias';
	public $timestamps = false;
	
     protected $fillable = [
        'id_noticia', 'titulo', 'cuerpo_noticia', 'imagen', 'punto','fecha','estado','notificacion','id_tipo_noticia',
    ];

}
