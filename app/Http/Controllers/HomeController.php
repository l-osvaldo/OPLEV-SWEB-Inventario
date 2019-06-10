<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulos;
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

            $articulos = articulos::orderBy('iev', 'DESC')->get();
            //print_r ($usuario);exit();
            return view('catalogos/bienes')->with(compact('articulos','usuario')); 
        }

        return view('login');
    }

    
}
