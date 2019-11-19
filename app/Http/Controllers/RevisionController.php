<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulos;
use App\articulosecos;
use App\cancelacionresguardos;
use App\bitacoracancelaciones;

class RevisionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $usuario = auth()->user();

        $cancelaciones = cancelacionresguardos::orderBy('nombreempleado', 'ASC')->get();

        return view('revision.revision', compact('usuario','cancelaciones'));
    }
}
