<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\areas;
use App\empleados;
use App\articulos;
use App\articulosecos;
//use Alert;

class AreasController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
		//
		
	public function formValidationPost(Request $request)
	{
		$this->validate($request,[

				'idarea'    =>  'required|numeric',
				'nombrearea'       =>  'required|min:1|max:250',
				

				],[
						
		'idarea.required'     => 'La :attribute es obligatoria.',
		'idarea.integer'      => 'La :attribute debe ser un entero.',

		'nombrearea.required'   => 'La :attribute es obligatoria.',
		'nombrearea.min'        => 'La :attribute debe contener mas de una letra.',
		'nombrearea.max'        => 'La :attribute debe contener max 30 letras.',
				]);

		Alert::error('Revise sus campos', '¡Error!')->autoclose(2000);
	} 

    public function index()
	{
		$usuario = auth()->user();
		$area = areas::distinct()->orderBy('idarea', 'DESC')->get(['idarea', 'nombrearea']);
		//var_dump($partida[0]);
		//dd();

		return view('catalogos.Tablas.TablaArea', compact('area','usuario'));
	}
	public function updaArea(Request $request)
	{
		$clave = $request->input('id');
		$area = $request->input('no');
		$update = areas::where('idarea',$clave)->update(array('nombrearea' => $area));			
		$update = empleados::where('idarea',$clave)->update(array('nombrearea' => $area));

		$update = articulos::where('idarea',$clave)->update(array('nombrearea' => $area));
		$update = articulosecos::where('idarea',$clave)->update(array('nombrearea' => $area));

		return response()->json(['success']);
	}
}
