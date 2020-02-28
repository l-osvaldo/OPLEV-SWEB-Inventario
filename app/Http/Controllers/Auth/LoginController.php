<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Session;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/catalogos/bienes';


    public function logout(Request $request) {
      Auth::logout();
      Session::flush();
      return redirect('login');
    }

    /**************************************************************
    Funcionalidad: Encripta el password ingresado y lo compara en la base de datos.
    Parámetros: Usuario y password.
    Respuesta: Retorna un true si hay coincidencias en la base de datos y false sino lo encuentra.
    ***************************************************************/
    public function login(Request $request)
    {
      $decrypted = $request->input('password'); 
      $user      = User::where('username', $request->input('username'))
      ->first();
      if(!empty($user)){
        $status = $user->status;
        if($status == 1){
          if ($user) {
            if (Crypt::decryptString($user->password) == $decrypted) {
              Auth::login($user);

              return $this->sendLoginResponse($request);
            }
          }
          return $this->sendFailedLoginResponse($request);
        }else{
          $aviso = 'Su cuenta esta desactivada, contacte al administrador del sistema.';
          return view('auth.login',compact('aviso'));
          Session::flush();
        }
      }else{
        $aviso = 'Esta cuenta no existe en nuestros registros.';
          return view('auth.login',compact('aviso'));
          Session::flush();
      } 
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }
}
