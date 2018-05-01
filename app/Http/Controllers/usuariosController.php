<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuarios;

class usuariosController extends Controller
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
        $usuarios = Usuarios::where('estado','1')->orderBy("id_usuario","ASC")->paginate();
        return view("usuarios.index",compact("usuarios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::select('SELECT * FROM roles');
        return view("usuarios.create",compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


         $usuario = new Usuarios;
         
         $usuario->nombre = $request->nombre;
         $usuario->apellido = $request->apellido;
         $usuario->telefono_fijo = $request->telefono_fijo;
         $usuario->telefono_celular = $request->telefono_celular;
         $usuario->fecha_nacimiento = $request->fecha_nacimiento;
         $usuario->correo = $request->correo;
         $usuario->password = md5($request->password);
         $usuario->interior = $request->interior;

         $usuario->save();
         

         if (isset($request->rolAdministrador)) {
             DB::insert('INSERT INTO `roles_usuarios`( `id_usuario`, `id_rol`) VALUES (?,?)', [$usuario->id, $request->rolAdministrador]);
        }
        if (isset($request->rolPropietario)){
            DB::insert('INSERT INTO `roles_usuarios`( `id_usuario`, `id_rol`) VALUES (?,?)', [$usuario->id, $request->rolPropietario]);
        }   


        return redirect()->route('usuarios.index', ['info' => "El usuario se registro"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($valor)
    {

        $usuarios =  DB::select("SELECT * FROM `usuarios` WHERE nombre like '".$valor."%'");

        return view("formularios")->with("data",[
            "form"=>$_GET["form"],
            "usuarios"=>$usuarios
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuarios::where('id_usuario',$id)->get();
        $roles = DB::select('SELECT * FROM roles');
        $rolU = DB::select('SELECT `id_rol` FROM `roles_usuarios` WHERE id_usuario ='.$id);
        return view("usuarios.edit",compact("usuario","roles","rolU","id"));
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
                    session_start();
         if(!isset($_SESSION['usuario'][0])){
            return redirect('/ingresar');
            }
   $rows = DB::update('UPDATE `usuarios` SET `nombre`=?,`apellido`=?,`telefono_fijo`=?,`telefono_celular`=?,`fecha_nacimiento`=?,`correo`=?,`interior`=? WHERE id_usuario = ?', [$request->nombre,$request->apellido,$request->telefono_fijo,$request->telefono_celular,$request->fecha_nacimiento,$request->correo,$request->interior,$id]);

        DB::table('roles_usuarios')->where('id_usuario', $id)->delete();

        if (isset($request->rolAdministrador)) {
        DB::insert('INSERT INTO `roles_usuarios`( `id_usuario`, `id_rol`) VALUES (?,?)', [$id, $request->rolAdministrador]);
        }
        if (isset($request->rolPropietario)){
DB::insert('INSERT INTO `roles_usuarios`( `id_usuario`, `id_rol`) VALUES (?,?)', [$id, $request->rolPropietario]);
        }   
         return redirect()->route("usuarios.index");
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
            return redirect('/ingresar');
            }
       $rows = DB::update('UPDATE `usuarios` SET `estado`=0 WHERE id_usuario =?', [$id]);
        return"El usuario se elimino correctamente";
    }

    public function obtenerJsonUsuario($correo,$pass){

        $json=array();
        $select = DB::select("SELECT * FROM usuarios WHERE correo = '".$correo."' AND password = '".$pass."'");
        $json["usuario"]=$select;

        echo json_encode($json);
    }
}
