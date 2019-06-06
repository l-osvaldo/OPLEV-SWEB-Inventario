<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index2()
    {
        $usuario = auth()->user();

        if (Auth::check()){

            return view('catalogos.bienes', compact('usuario'));   
        }
        else
        {
          return redirect()->route('auth.login');
        }
    }


    public function index(Request $request)
    {

        if($request->user()->authorizeRoles(['user', 'admin']) && Auth::check())
        {
            $usuario = auth()->user();
            //print_r ($usuario);exit();
            return view('catalogos/bienes')->with(compact('usuario')); 
        }

        return view('login');
    }

    public function calendar()
    {
        return view('calendar');
    }

    public function tables()
    {
        return view('tables');
    }

    public function charts()
    {
        return view('charts');
    }

    public function widgets()
    {
        return view('widgets');
    }

    public function generalelements()
    {
        return view('_generalelements');
    }

    public function advanced()
    {
        return view('advanced');
    }

    public function personalizado()
    {
        return view('personalizado');
    }

    public function sweetalert()
    {
        return view('sweet');
    }

    public function sweet($alertType = null){
 
        switch ($alertType) {
            case 'info':
                Alert::info('Welcome', 'Demo info alert');
                break;
 
            case 'success':
                Alert::success('Welcome', 'Demo success alert');
                break;
 
            case 'error':
                Alert::error('Welcome', 'Demo error alert');
                break;
 
            case 'warning':
                Alert::warning('Welcome', 'Demo warning alert');
                break;
 
            case 'success_autoclose':
                Alert::success('Welcome', 'Demo success alert')->autoclose(3500);
                break;
 
            case 'confirmation':
                Alert::success('Welcome', 'Demo success alert')->persistent("Ok");
                break;
            
            default:
                Alert::success('Welcome', 'Demo success alert')->persistent("Ok");
                break;
        }
        
 
        return view('sweet');

    }    

}
