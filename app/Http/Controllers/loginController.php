<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\usuarios;

class loginController extends Controller
{
    
     public function logueo(Request $request)
    {

session_start();
	if (isset($request)) {
		$results = DB::select('SELECT * FROM `usuarios` WHERE correo =:correo AND password = :pass ', ['correo' => $request->correo,
				"pass"=>md5($request->pass)]);

		if ($results != null) {
            
			$_SESSION['usuario'] = $results;
		}   		
	}

    if(!isset($_SESSION['usuario'][0])){  
	return view("login");
	}
   
    return redirect("noticias");
    }

    public function logOut()
    {
        session_start();
    	$_SESSION['usuario']=null;
    	session_destroy();

    	return redirect("/ingresar");
    }
}
