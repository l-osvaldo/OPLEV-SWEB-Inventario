<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\User;
use Alert;

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
    	return view('usuarios.gestionUsuarios', compact('usuario','listaUsuarios'));
    }

    public function email(Request $request)
    {
      $email = $request->input('email');

      if (User::where('email', '=', $email)->count() > 0){          
        $popo='1';
      } else {
        $popo='0';  
      }
      return response()->json(['success'=>compact('popo')]);
    }

    /*************************************************************
    Funcionalidad: Valida que el nombre de usuario esté disponible
    Parámetros: nombre de usuario.
    Respuesta: Retorna un json con la variable user.
    **************************************************************/
    public function username(Request $request)
    {
      $username = $request->input('usuario');

      if (User::where('username', '=', $username)->count() > 0){          
        $popo='1';
      } else {
        $popo='0';  
      }
      return response()->json(['success'=>compact('popo')]);
    }

    public function registroUsuario(Request $request)
    {
      $status = 1;
      $encrypted =Crypt::encryptString($request->get('contPass'));
      $usuario = new User([
        'nombre'    =>  $request->get('nombre'),
        'apePat'     =>  $request->get('apePat'),
        'apeMat'     =>  $request->get('apeMat'),
        'username'     =>  $request->get('usuario'),
        'status'     =>  $status,
        'cargo'     =>   $request->input('cargoO'),
        'id_area'     =>  $request->get('idOrgO'),
        'area'     =>   $request->get('nameOrgO'),
        'tipo'     =>  'OPLE',
        'email'     =>  $request->get('correo'),
        'password'     =>  $encrypted
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
}
