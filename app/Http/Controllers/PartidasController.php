<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\partidas;
use App\lineas;
use App\sublineas;
use View;
use App\Http\Requests\ValidarFormularioRequest;
use Alert;
//use Illuminate\Database\Eloquent\Model\partidas;

class PartidasController extends Controller
{

    public function formValidationPost(Request $request)
			{
					$this->validate($request,[

							'partida'           =>  'required|unique|numeric',
							'descpartida'       =>  'required|min:1|max:250',
							'linea'             =>  'required|numeric',
							'desclinea'         =>  'required|min:1|max:250',
							'sublinea'          =>  'required|numeric',
							'descsub'           =>  'required|min:1|max:250',
							'total'             =>  'required|numeric',

							],[
									
					'partida.required'     => 'La :attribute es obligatoria.',
					'partida.integer'      => 'La :attribute debe ser un entero.',

					'descpartida.required'   => 'La :attribute es obligatoria.',
					'descpartida.min'        => 'La :attribute debe contener mas de una letra.',
					'descpartida.max'        => 'La :attribute debe contener max 30 letras.',

					'linea.required'     => 'La :attribute es obligatoria.',
					'linea.integer'      => 'La :attribute debe ser un entero.',

					'desclinea.required'   => 'La :attribute es obligatoria.',
					'desclinea.min'        => 'La :attribute debe contener mas de una letra.',
					'desclinea.max'        => 'La :attribute debe contener max 30 letras.',
					
					'sublinea.required'     => 'La :attribute es obligatoria.',
					'sublinea.integer'      => 'La :attribute debe ser un entero.',

					'descsub.required'   => 'La :attribute es obligatoria.',
					'descsub.min'        => 'La :attribute debe contener mas de una letra.',
					'descsub.max'        => 'La :attribute debe contener max 30 letras.',

					'total.required'     => 'La :attribute es obligatoria.',
					'total.integer'      => 'La :attribute debe ser un entero.',
							]);

					Alert::error('Revise sus campos', '¡Error!')->autoclose(2000);
			}

    /*
    funcion para mostrar los datos de la tabla partida
    en la vista TablaPartida
    */
    public function index()
			{
					$usuario = auth()->user();
					$partida = partidas::distinct()->orderBy('partida', 'DESC')->get(['partida', 'descpartida']);
					//var_dump($partida[0]);
					//dd();

					return view('catalogos.Tablas.TablaPartida', compact('partida', 'usuario'));

			}

    /*
    funcion para llamar a la venta de agregar partida

     */
    public function create()
			{
					$usuario = auth()->user();
					return view('catalogos.Partidas', compact('usuario'));
			}

    
    /*
    funcion para agregar una partida a la base de datos
    la variable partida recibe los datos y los envia al modelo 
    para despues guardarlos en la base de datos.
     */
    public function store(Request $request)
	{
		$partida = new partidas();
		$linea = new lineas();
		$sublinea = new sublineas();

		$partida->partida = $request->input('partidaI');
		$partida->descpartida = $request->input('descpartida');
		$linea->partida = $request->input('partida');
		$linea->descpartida = $request->input('descpartida');
		$linea->linea = $request->input('linea');
		$linea->desclinea = $request->input('desclinea');
		$sublinea->partida = $request->input('partida');
		$sublinea->descpartida = $request->input('descpartida');
		$sublinea->linea = $request->input('linea');
		$sublinea->desclinea = $request->input('desclinea');
		$sublinea->sublinea = $request->input('sublinea');
		$sublinea->descsub = $request->input('descsub');
		$sublinea->total = $request->input('total');
		$partida->save();
		$linea->save();
		$sublinea->save();
		Alert::success('Partida guardada', 'Registro Exitoso')->autoclose(2500);
		return redirect()->route('Tabla-Partida');

	}
    
    
    public function show( $partida)
	{
		$partidas2 = partidas::where('partida',$partida)->get();
		return view('catalogos.TablaPartidaShow',compact('partidas2'));
	}

	public function validarPartida(Request $request){
		$existe = partidas::select('partida')->where('partida',$request->partida)->get();
		return $existe;		
	}

}
