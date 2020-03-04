<?php

namespace App\Http\Controllers;

use Alert;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UsuariosController extends Controller
{
    /* **********************************************************************************

    Funcionalidad: Constructor  de la clase, sirve para mantener este controlador con la autentificación del logueo del usuario
    Parámetros: No recibe parámetros
    Retorna: No regresa nada

     ********************************************************************************** */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function usuarios()
    {

        $listaUsuarios = User::all();

        $usuario = auth()->user();
        return view('usuarios.gestionUsuarios', compact('usuario', 'listaUsuarios'));
    }

    public function email(Request $request)
    {
        $email = $request->input('email');

        if (User::where('email', '=', $email)->count() > 0) {
            $popo = '1';
        } else {
            $popo = '0';
        }
        return response()->json(['success' => compact('popo')]);
    }

    /*************************************************************
    Funcionalidad: Valida que el nombre de usuario esté disponible
    Parámetros: nombre de usuario.
    Respuesta: Retorna un json con la variable user.
     **************************************************************/
    public function username(Request $request)
    {
        $username = $request->input('usuario');

        if (User::where('username', '=', $username)->count() > 0) {
            $popo = '1';
        } else {
            $popo = '0';
        }
        return response()->json(['success' => compact('popo')]);
    }

    public function registroUsuario(Request $request)
    {

        // $areaEmpleado = empleados::select('idarea', 'nombrearea')
        //               ->where([['nombre','like','%'.$request->get('nombre').'%'],
        //                        ['nombre','like','%'.$request->get('apePat').'%'],
        //                        ['nombre','like','%'.$request->get('apeMat').'%']])->get();

        // print_r($areaEmpleado[0]->nombrearea);exit;

        $status    = 1;
        $encrypted = Crypt::encryptString($request->get('contPass'));
        $usuario   = new User([
            'nombre'   => $request->get('nombre'),
            'apePat'   => $request->get('apePat'),
            'apeMat'   => $request->get('apeMat'),
            'username' => $request->get('usuario'),
            'status'   => $status,
            'cargo'    => $request->input('cargoO'),
            'id_area'  => $request->get('idOrgO'),
            'area'     => $request->get('nameOrgO'),
            'tipo'     => 'OPLE',
            'email'    => $request->get('correo'),
            'password' => $encrypted,
        ]);
        $usuario->save();

        /*****************************************************
        Registra la alta de usuario en la bitácora de eventos.
         ******************************************************/

        // $nombre_evento = 'Alta de Usuario/a';
        // $tipo = 'OPLE';
        // $user_id = Auth::id();
        // $user = User::find($user_id);
        // $evento = new Event([
        //   'id_user'    =>  $user_id,
        //   'ape'    =>  $user->id_area,
        //   'event'     =>  $nombre_evento,
        //   'nombre'    =>  $request->get('nombre'),
        //   'apePat'     =>  $request->get('apePat'),
        //   'apeMat'     =>  $request->get('apeMat'),
        //   'tipo'     =>  $tipo
        // ]);

        // $evento->save();
        Alert::success('Usuario/a guardado', 'Registro Exitoso')->autoclose(2500);
        return redirect()->route('usuarios');
    }

    /**********************************************************+**********
    Funcionalidad: Activa o desactiva al usuario seleccionado según corresponda.
    Parámetros: estatus del usuario.
    Respuesta: Estatus del usuario actualizado en la base de datos.
     *********************************************************************/
    public function estatususer(Request $request)
    {
        $id   = $request->input('id');
        $data = $request->input('data');

        $data === '1' ? $newstatus = 0 : $newstatus = 1;

        $update         = User::find($id);
        $update->status = $newstatus;

        // $user = User::find($id);
        // $tipo_nuevo = $user->tipo;
        // $nom = $user->nombre;
        // $apeP = $user->apePat;
        // $apeM = $user->apeMat;
        // $nombre_evento = 'Actualización de Status';
        // $user_id = Auth::id();
        // $evento = new Event([
        //   'id_user'    =>  $user_id,
        //   'ape'    =>  $user->id_area,
        //   'event'     =>  $nombre_evento,
        //   'nombre'    =>  $nom,
        //   'apePat'     =>  $apeP,
        //   'apeMat'     =>  $apeM,
        //   'tipo'     =>  $tipo_nuevo
        // ]);

        // $evento->save();

        $update->save();
        return response()->json(['success']);
    }

    /*******************************************************************
    Funcionalidad: Actualiza al usuario APES
    Parámetros: id, nombre, apellido paterno, apellido materno, email.
    Respuesta: Cambios registrados en la base de datos users.
     *******************************************************************/
    public function updateUsuario(Request $request)
    {
        $id             = $request->input('id');
        $nombre         = $request->input('nombre');
        $apePat         = $request->input('apePat');
        $apeMat         = $request->input('apeMat');
        $email          = $request->input('email');
        $update         = User::find($id);
        $update->nombre = $nombre;
        $update->apePat = $apePat;
        $update->apeMat = $apeMat;
        $update->email  = $email;

        /*******************************
        Registra el evento en la tabla de events.
         ********************************/

        // $user = User::find($id);
        // $tipo_nuevo = $user->tipo;
        // $nombre_evento = 'Edición de Usuario/a';
        // $user_id = Auth::id();
        // $evento = new Event([
        //   'id_user'    =>  $user_id,
        //   'event'     =>  $nombre_evento,
        //   'nombre'    =>  $nombre,
        //   'apePat'     =>  $apePat,
        //   'apeMat'     =>  $apeMat,
        //   'tipo'     =>  $tipo_nuevo
        // ]);

        // $evento->save();

        $update->save();
        return response()->json(['success']);
    }

    /************************************************************+********
    Funcionalidad: Actualiza la contraseña del usuario seleccionado.
    Parámetros: id del usuario a editar, nueva contraseña.
    Respuesta: Contraseña del usuario actualizada en la base de datos.
     *********************************************************************/
    public function updatePassword(Request $request)
    {
        $id   = $request->input('id');
        $data = $request->input('data');

        $update           = User::find($id);
        $update->password = Crypt::encryptString($data);

        // $user          = User::find($id);
        // $tipo_nuevo    = $user->tipo;
        // $nom           = $user->nombre;
        // $apeP          = $user->apePat;
        // $apeM          = $user->apeMat;
        // $nombre_evento = 'Cambio de Contraseña';
        // $user_id       = Auth::id();
        // $evento        = new Event([
        //     'id_user' => $user_id,
        //     'ape'     => $user->id_area,
        //     'event'   => $nombre_evento,
        //     'nombre'  => $nom,
        //     'apePat'  => $apeP,
        //     'apeMat'  => $apeM,
        //     'tipo'    => $tipo_nuevo,
        // ]);

        // $evento->save();

        $update->save();
        return response()->json(['success']);
    }

    /**********************************************************+**********
    Funcionalidad: Elimina al usuario seleccionado.
    Parámetros: id del usuario seleccionado.
    Respuesta: Usuario eliminado de la base de datos.
     *********************************************************************/
    public function deleteuser(Request $request)
    {
        $id = $request->input('id');
        //echo $id ; exit();

        /*****************************************************************
        Registra en la bitácora de eventos que se ha eliminado un usuario.
         *****************************************************************/
        // $user          = User::find($id);
        // $tipo_nuevo    = $user->tipo;
        // $nom           = $user->nombre;
        // $apeP          = $user->apePat;
        // $apeM          = $user->apeMat;
        // $nombre_evento = 'Eliminación de Usuario/a';
        // $user_id       = Auth::id();
        // $evento        = new Event([
        //     'id_user' => $user_id,
        //     'ape'     => $user->id_area,
        //     'event'   => $nombre_evento,
        //     'nombre'  => $nom,
        //     'apePat'  => $apeP,
        //     'apeMat'  => $apeM,
        //     'tipo'    => $tipo_nuevo,
        // ]);

        // $evento->save();
        $user = User::destroy($id);
        //$userRol = Role_User::where('user_id', '=', $id)->delete();
        return response()->json(['success']);
    }
}
