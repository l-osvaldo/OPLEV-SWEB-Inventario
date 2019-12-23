<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\sublineas;
use APP\partidas;
use App\lineas;
use Alert;

/*************** Funciones para el módulo de sublíneas *****************************/
class SublineasController extends Controller
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

  // public function formValidationPost(Request $request)
  // {
  //   $this->validate($request,[

  //       'partidaA'           =>  'required|numeric',
  //       'descpartida'       =>  'required|min:1|max:250',
  //       'lineaA'             =>  'required|numeric',
  //       'LineaMax'             =>  'required|numeric',
  //       'desclinea'         =>  'required|min:1|max:250',
  //       'sublinea'          =>  'required|numeric',
  //       'descsub'           =>  'required|min:1|max:250',
  //       'total'             =>  'required|numeric',

  //       ],[
            
  //   'partidaA.required'     => 'La :attribute es obligatoria.',
  //   'partidaA.integer'      => 'La :attribute debe ser un entero.',

  //   'descpartida.required'   => 'La :attribute es obligatoria.',
  //   'descpartida.min'        => 'La :attribute debe contener mas de una letra.',
  //   'descpartida.max'        => 'La :attribute debe contener max 30 letras.',

  //   'lineaA.required'     => 'La :attribute es obligatoria.',
  //   'lineaA.integer'      => 'La :attribute debe ser un entero.',

  //   'LineaMax.required'     => 'La :attribute es obligatoria.',
  //   'LineaMax.integer'      => 'La :attribute debe ser un entero.',

  //   'desclinea.required'   => 'La :attribute es obligatoria.',
  //   'desclinea.min'        => 'La :attribute debe contener mas de una letra.',
  //   'desclinea.max'        => 'La :attribute debe contener max 30 letras.',
    
  //   'sublinea.required'     => 'La :attribute es obligatoria.',
  //   'sublinea.integer'      => 'La :attribute debe ser un entero.',

  //   'descsub.required'   => 'La :attribute es obligatoria.',
  //   'descsub.min'        => 'La :attribute debe contener mas de una letra.',
  //   'descsub.max'        => 'La :attribute debe contener max 30 letras.',

  //   'total.required'     => 'La :attribute es obligatoria.',
  //   'total.integer'      => 'La :attribute debe ser un entero.',
  //       ]);

  //   Alert::error('Revise sus campos', '¡Error!')->autoclose(2000);
  // }


  /* **********************************************************************************
 
    Funcionalidad: Obtiene las sublíneas de una partida y una línea en especifico
    Parámetros: partida, línea
    Retorna: Vista de sublíneas, TablaSublinea.blade.php

  ********************************************************************************** */


  public function show(Request $request)
  {          
    $partida = $request->get('Partidas');
    $linea = $request->get('Linea');
    $sublineas = sublineas::where('partida',$partida)->where('linea',$linea)->get();
    $sublineaAgt = sublineas::distinct()->get(['partida', 'descpartida']); 
    $sublineaSe = sublineas::distinct()->get(['partida', 'descpartida']);
    //mostrar partida en la vista 
    $lineaL = sublineas::where('partida', $request->get('Partidas'), sublineas::raw('count(*) >= 1'))
    ->get();
    //busca la linea y la muestra en la vista
    $lineaL = sublineas::where('linea', $request->get('Linea'), sublineas::raw('count(*) >= 1'))
    ->get();

    //el if pregunta si lineaL viene vacia 
    // en caso de tener una partida y una linea mostrara el numero de partida y linea en la vista
    $partida = isset($lineaL[0]) ? $lineaL[0] : false;
    if ($partida){
    $partida = $lineaL[0]['partida'] . " - " . $lineaL[0]['descpartida'];
    $linea = $lineaL[0]['linea']. " - " . $lineaL[0]['desclinea'];
    }

    $usuario = auth()->user(); 
    return view('catalogos.Tablas.TablaSublinea', compact('sublineas','lineaL','sublineaSe','sublineaAgt','linea','partida','usuario'));
    
  }

  /* **********************************************************************************
 
    Funcionalidad: Obtiene todas las líneas de la partida seleccionada
    Parámetros: partida
    Retorna: Un JSON con todas las líneas de la partida solicitada

  ********************************************************************************** */

  public function obtenLineas(Request $request)
  {
    $partida = $request->partida;
    $lineas = lineas::where('partida', $partida)->get();      
    return response()->json($lineas);
  }
      
  /* **********************************************************************************
 
    Funcionalidad: Obtiene todas las líneas de la partida seleccionada
    Parámetros: partida
    Retorna: Un JSON con todas las líneas de la partida solicitada

  ********************************************************************************** */
  public function obtenLineasAg(Request $request)
  {
    $partida = $request->partida;
    $lineas = lineas::where('partida', $partida)->get();      
    return response()->json($lineas);
  }
      
  /* **********************************************************************************
 
    Funcionalidad: Obtiene el número maximo de las sublineas de una partida y una línea y suma uno para proporcionarlo a la nueva sublinea
    Parámetros: partida
    Retorna: Un JSON con todas las líneas de la partida solicitada

  ********************************************************************************** */
  public function obtenSublineas(Request $request)
  {
    $partida = $request->partida;
    $linea = $request->linea;
    $sublineas = sublineas::where('partida', $partida)->where('linea', $linea)->orderBy('sublinea', 'DESC')->get(); 
    $numsublinea = $sublineas[0]['sublinea'] + 1;

    if ($numsublinea < 10 ){
      $numsublinea = '0'.$numsublinea; 
    }

    return response()->json($numsublinea);
  }

  /* **********************************************************************************
 
    Funcionalidad: Obtiene todas las sublíneas de una partida y una línea en especifico
    Parámetros: partida y línea
    Retorna: Un JSON con todas las sublíneas de la partida y línea solicitada

  ********************************************************************************** */
  public function obtenSublineas2(Request $request)
  {
    $partida = $request->partida;
    $linea = $request->linea;
    $sublineas = sublineas::where('partida', $partida)->where('linea', $linea)->orderBy('sublinea', 'DESC')->get(); 

    return response()->json($sublineas);
  }
      
  /* **********************************************************************************
 
    Funcionalidad: Obtiene todas las líneas de una partida en especifico
    Parámetros: partida
    Retorna: Un JSON con todas las líneas de la partida solicitada

  ********************************************************************************** */
  public function obtenMaxLineas(Request $request)
  {

    $partida = $request->partida;
    $lineas = lineas::where('partida', $partida)->get(); 
    
    return response()->json($lineas);
  }


  // public function ajaxRequest()
  // {
  //   $usuario = auth()->user();
  //   $sublinea = sublineas::distinct()->get(['partida', 'descpartida']);				
  //   return view('catalogos.Sublineas', compact('sublinea','usuario'));
  // }


  // public function ajaxRequestPost(Request $request)
  // {
  //   $input = $request->all();
  //   $sublinea = sublineas::where('partida',$request->partida)->distinct()
  //       ->orderBy('linea', 'ASC')
  //           ->get(['linea','desclinea']);
  //   return response()->json($sublinea);
  // }
  

  //ajax para crear lineas
  // public function ajaxRequestLineas()
  // {
  //   $sublinea = sublineas::distinct()->get(['partida', 'descpartida']);
  //   return view('catalogos.Agregar.AgregaLineas', compact('sublinea'));
  // }

  // public function ajaxRequestLineasPost(Request $request)
  // {
  //   $input = $request->all();
  //   $sublinea = sublineas::where('partida',$request->partida)->distinct()
  //           ->max('linea')
  //           ->get(['linea']);
  //   return response()->json($sublinea);
  // }

  //sublineas controller

  /* **********************************************************************************
 
    Funcionalidad: Crea una nueva sublínea en una partida y línea seleccionada
    Parámetros: partida y línea
    Retorna: Alerta de registro exitoso y redirección a la vista de sublíneas

  ********************************************************************************** */

  public function Agregasublineastore(Request $request)
  {

    $partida = $request->input('partidaA');      
      $querypartida = sublineas::where('partida', '=', $partida)->get();  

      //Aqui busca la descripcion de la linea con el numero de partida
      $linea = $request->input('lineaA');      
      $querylinea = sublineas::where('partida', '=', $partida)
      ->where('linea', '=', $linea)->get(); 

      //var_dump($linea);
      //var_dump($querylinea[0]['desclinea']);
      // dd();
      $descpartida = $querypartida[0]['descpartida'];
      $desclinea = $querylinea[0]['desclinea'];
      $sublinea = new sublineas();
      $sublinea->partida = $request->input('partidaA');
      $sublinea->descpartida = $descpartida;
      $sublinea->desclinea = $desclinea;
      $sublinea->linea = $request->input('lineaA');
      $sublinea->sublinea = $request->input('sublinea');
      $sublinea->descsub = $request->input('descsub');
      $sublinea->totalople = $request->input('total');
      $sublinea->totaleco = $request->input('total');
      $sublinea->save();

      $usuario = auth()->user();
      Alert::success('Sublínea guardada', 'Registro Exitoso')->autoclose(2500);
      return redirect()->route('show-sublineas', compact('usuario'));
    

  } 
  /*funcion para mostrar las partidas 
  tanto en agregar linea como en catalogo de linea
  */ 
  // public function SublineaNueva()
  // {
  //   $usuario = auth()->user();
  //   $sublinea = sublineas::distinct()->get(['partida', 'descpartida']);
  //   return view('catalogos.Agregar.AgregaSublineas', compact('sublinea','usuario'));

  }
  //vista de sublineas 
  // public function MostrarSubLineas()
  // {
  //   $usuario = auth()->user();
  //   $sublinea = sublineas::distinct()->get(['partida', 'descpartida']);
  //   $sublineaAg = sublineas::distinct()->get(['partida', 'descpartida']);   
  //   $sublineasTb = sublineas::distinct()->get(['partida', 'descpartida']);    
  //   return view('catalogos.Sublineas', compact('sublinea','sublineasTb','sublineaAg','usuario'));
  // }


  /* **********************************************************************************
 
    Funcionalidad: Obtiene todas las sublíneas de una partida y una línea seleccionada
    Parámetros: partida y línea
    Retorna: Vista de todas las sublíneas de una partida y línea en especial

  ********************************************************************************** */

  public function datosSublinea (Request $request){
    $partida = $request->get('Partida');
    $linea = $request->get('Linea');
    $sublineas = sublineas::where('partida',$partida)->where('linea',$linea)->get();

    return view('catalogos.Tablas.datatable.sublineas', compact('partida', 'linea', 'sublineas'));


  }
}
