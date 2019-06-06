<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulos;

class ArticulosController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    //
}
