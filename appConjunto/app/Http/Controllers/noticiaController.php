<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Noticias;

class noticiaController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
         if(!isset($_SESSION['usuario'][0])){
            return redirect('/ingresar');
            }
            
        $noticia = Noticias::where('estado','1')->orderBy("id_noticia","DESC")->paginate();

        return view("noticias",compact("noticia"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         session_start();
         if(!isset($_SESSION['usuario'][0])){
            return redirect('/');
            }
        $noticia = new Noticias;
        $ruta = "";

        if ($request->hasFile('imagen')) {

            $nombre_imagen = "-".$request["titulo"]."jpg";
            $path = Storage::disk('public')->put("noticias",$request->file('imagen'));

           //$ruta = "http://localhost:81/appConjunto/storage/app/noticias/".$path;
        
        }
        
        $noticia->titulo = $request->titulo;
        $noticia->cuerpo_noticia = $request->cuerpo;
        $noticia->imagen =$path;
        $noticia->punto = $request->punto;
        $noticia->id_tipo_noticia= $request->tipoNoticia;

        $noticia->save();

        return redirect()->route("noticias.index")->with("info","La noticia se registro correctamente");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticias::where('id_noticia',$id)->get();
        return view("showNoticia",compact("noticia"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        session_start();
         if(!isset($_SESSION['usuario'][0])){
            return redirect('/');
            }
       $rows = DB::update('UPDATE `noticias` SET `estado`= 0 WHERE `id_noticia` = ?', [$id]);
        return "La noticia se elimino correctamente ";
    }

    public function obtenerFormulario()
    {
         session_start();
         if(!isset($_SESSION['usuario'][0])){
   return redirect('/');
}
        $tipos_noticia = DB::table('tipo_noticia')->get();
        return view("formularios")->with("data",[
            "form"=>$_POST["form"],
            "tipos"=>$tipos_noticia
        ]);
    }
        public function obtenerFormNotificacion()
    {

                $interiores = array(23=>'interior23', 
                                    25=>'interior25', 
                                    26=>'interior26',
                                    27=>'interior27',
                                    28=>'interior28',
                                    29=>'interior29');

        return view("formularios")->with("data",[
            "form"=>$_POST["form"],
            "ints"=>$interiores
        ]);/*
*/
    }
function obtenerJsonNoticias($interior){
$json=array();
        $select = DB::select("SELECT * FROM `noticias` WHERE estado = 1 AND (notificacion = 'allInts' OR notificacion ='".$interior."')");
       $json["noticias"]=$select;

        echo json_encode($json);

}

    function enviarNotificacion(){
 
        session_start();
         if(!isset($_SESSION['usuario'][0])){
            return redirect('/ingresar');
            }
        $noticia = Noticias::where('id_noticia',$_POST["id_noticia"])->get();
             
             DB::table('noticias')
            ->where('id_noticia', $_POST["id_noticia"])
            ->update(['notificacion' => $_POST["topic"]]);

        foreach ($noticia as $key => $value) {
$data = array
(
   'id_noticia'=>$value->id_noticia,
    'titulo' => $value->titulo,
    "foto"=>  $value->imagen,
    "cuerpo_noticia"=>$value->cuerpo_noticia,
    "fecha"=>$value->fecha,
    "punto"=> $value->punto,
    "tipo_noticia"=>$value->id_tipo_noticia

);
}
$url = 'https://fcm.googleapis.com/fcm/send';
$fields = array(
    "to" => "/topics/".$_POST["topic"],
    'data' => $data
);

$headers = array('Content-Type: application/json',
    'Authorization:key=AIzaSyBrqSF0oPhUsdQg6DUBcHfawLabudyLblo'
);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$result = curl_exec($ch);
if ($result == FALSE)
    die('Curl failed: ' . curl_error($ch));
curl_close($ch);

        return "Notificacion enviada";
    }
}
