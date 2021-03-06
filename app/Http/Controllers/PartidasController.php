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

/*************** Funciones para el módulo de partidas *****************************/
class PartidasController extends Controller
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
	
   //  public function formValidationPost(Request $request)
			// {
			// 		$this->validate($request,[

			// 				'partida'           =>  'required|unique|numeric',
			// 				'descpartida'       =>  'required|min:1|max:250',
			// 				'linea'             =>  'required|numeric',
			// 				'desclinea'         =>  'required|min:1|max:250',
			// 				'sublinea'          =>  'required|numeric',
			// 				'descsub'           =>  'required|min:1|max:250',
			// 				'total'             =>  'required|numeric',

			// 				],[
									
			// 		'partida.required'     => 'La :attribute es obligatoria.',
			// 		'partida.integer'      => 'La :attribute debe ser un entero.',

			// 		'descpartida.required'   => 'La :attribute es obligatoria.',
			// 		'descpartida.min'        => 'La :attribute debe contener mas de una letra.',
			// 		'descpartida.max'        => 'La :attribute debe contener max 30 letras.',

			// 		'linea.required'     => 'La :attribute es obligatoria.',
			// 		'linea.integer'      => 'La :attribute debe ser un entero.',

			// 		'desclinea.required'   => 'La :attribute es obligatoria.',
			// 		'desclinea.min'        => 'La :attribute debe contener mas de una letra.',
			// 		'desclinea.max'        => 'La :attribute debe contener max 30 letras.',
					
			// 		'sublinea.required'     => 'La :attribute es obligatoria.',
			// 		'sublinea.integer'      => 'La :attribute debe ser un entero.',

			// 		'descsub.required'   => 'La :attribute es obligatoria.',
			// 		'descsub.min'        => 'La :attribute debe contener mas de una letra.',
			// 		'descsub.max'        => 'La :attribute debe contener max 30 letras.',

			// 		'total.required'     => 'La :attribute es obligatoria.',
			// 		'total.integer'      => 'La :attribute debe ser un entero.',
			// 				]);

			// 		Alert::error('Revise sus campos', '¡Error!')->autoclose(2000);
			// }

    /* **********************************************************************************
 
    Funcionalidad: Obtiene todas las partidas que se tienen registradas
    Parámetros: No recibe parámetros
    Retorna: Vista principal del módulo, TablaPartida.blade.php

    ********************************************************************************** */
    public function index()
	{
		$usuario = auth()->user();
		$partida = partidas::distinct()->orderBy('partida', 'DESC')->get(['partida', 'descpartida','aniosvida','porcentajeDepreciacion']);
		

		foreach ($partida as $value) {
			if ($value->aniosvida == null){
				$value->aniosvida = 'No se Desprecia esta partida';
			}
			if ($value->porcentajeDepreciacion == null){
				$value->porcentajeDepreciacion = 'No se Desprecia esta partida';
			}else{
				$value->porcentajeDepreciacion = $value->porcentajeDepreciacion.' %';
			}
		}

		return view('catalogos.Tablas.TablaPartida', compact('partida', 'usuario'));

	}

    /*
    funcion para llamar a la venta de agregar partida

     */

    /* **********************************************************************************
 
    Funcionalidad: 
    Parámetros: 
    Retorna: 

    ********************************************************************************** */
    public function create()
			{
					$usuario = auth()->user();
					return view('catalogos.Partidas', compact('usuario'));
			}


    /* **********************************************************************************
 
    Funcionalidad: Agrega una nueva partida al sistema, con su linea y sublinea 
    Parámetros: partida, descpartida, linea, desclinea, sublinea, desclinea, aniosvida, porcentajeDepreciacion
    Retorna: Un alerte con el mensaje de Registro exitoso y retorna a la vista principal de partidas

    ********************************************************************************** */
    public function store(Request $request)
	{
		$partida = new partidas();
		$linea = new lineas();
		$sublinea = new sublineas();

		if ($request->input('hiddendepreciacion') !== 'false'){
			$partida->aniosvida = $request->input('aniosVida');
			$partida->porcentajeDepreciacion = $request->input('porcentajeDepreciacion');
		}else{
			$partida->aniosvida = null;
			$partida->porcentajeDepreciacion = null;
		}

		$partida->partida = $request->input('partidaI');
		$partida->descpartida = $request->input('descpartida');
		$linea->partida = $request->input('partidaI');
		$linea->descpartida = $request->input('descpartida');
		$linea->linea = $request->input('linea');
		$linea->desclinea = $request->input('desclinea');
		$sublinea->partida = $request->input('partidaI');
		$sublinea->descpartida = $request->input('descpartida');
		$sublinea->linea = $request->input('linea');
		$sublinea->desclinea = $request->input('desclinea');
		$sublinea->sublinea = $request->input('sublinea');
		$sublinea->descsub = $request->input('descsub');
		$sublinea->totalople = $request->input('total');
		$sublinea->totaleco = $request->input('total');
		$partida->save();
		$linea->save();
		$sublinea->save();
		Alert::success('Partida guardada', 'Registro Exitoso')->autoclose(2500);
		return redirect()->route('Tabla-Partida');

	}

	/* **********************************************************************************
 
    Funcionalidad:  
    Parámetros: 
    Retorna: 

    ********************************************************************************** */
    
    
    public function show( $partida)
	{
		$partidas2 = partidas::where('partida',$partida)->get();
		return view('catalogos.TablaPartidaShow',compact('partidas2'));
	}

	/* **********************************************************************************
 
    Funcionalidad: Valida que el número de partida no exista en el sistema
    Parámetros: partida
    Retorna: boleano, 1 o 0 si es que existe el numero de partida

    ********************************************************************************** */

	public function validarPartida(Request $request){
		$existe = partidas::select('partida')->where('partida',$request->partida)->get();
		return $existe;		
	}

}
