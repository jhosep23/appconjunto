<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticias;

class inicioController extends Controller
{
    function index(){
    	return view("inicioConjunto");
    }

    function verNoticias(){

             	 $noticia = Noticias::where('estado','1')->orderBy("id_noticia","DESC")->paginate();

    	return view("noticiasHome",compact("noticia"));

    }
}
