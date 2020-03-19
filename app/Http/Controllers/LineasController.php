<?php

namespace App\Http\Controllers;

use Alert;
use App\lineas;
use App\partidas;
use App\sublineas;
use Illuminate\Http\Request;

/*************** Funciones para el módulo de líneas *****************************/
class LineasController extends Controller
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

    public function formValidationPost(Request $request)
    {
        $this->validate($request, [

            'partida'     => 'required|numeric',
            'descpartida' => 'required|min:1|max:250',
            'LineaMax'    => 'required|numeric',
            'desclinea'   => 'required|min:1|max:250',
            'sublinea'    => 'required|numeric',
            'descsub'     => 'required|min:1|max:250',
            'total'       => 'required|numeric',

        ], [

            'partida.required'     => 'La :attribute es obligatoria.',
            'partida.integer'      => 'La :attribute debe ser un entero.',

            'descpartida.required' => 'La :attribute es obligatoria.',
            'descpartida.min'      => 'La :attribute debe contener mas de una letra.',
            'descpartida.max'      => 'La :attribute debe contener max 150 letras.',

            'LineaMax.required'    => 'La :attribute es obligatoria.',
            'LineaMax.integer'     => 'La :attribute debe ser un entero.',

            'desclinea.required'   => 'La :attribute es obligatoria.',
            'desclinea.min'        => 'La :attribute debe contener mas de una letra.',
            'desclinea.max'        => 'La :attribute debe contener max 150 letras.',

            'sublinea.required'    => 'La :attribute es obligatoria.',
            'sublinea.integer'     => 'La :attribute debe ser un entero.',

            'descsub.required'     => 'La :attribute es obligatoria.',
            'descsub.min'          => 'La :attribute debe contener mas de una letra.',
            'descsub.max'          => 'La :attribute debe contener max 150 letras.',

            'total.required'       => 'La :attribute es obligatoria.',
            'total.integer'        => 'La :attribute debe ser un entero.',
        ]);

        Alert::error('Revise sus campos', '¡Error!')->autoclose(2000);
    }

    /* **********************************************************************************

    Funcionalidad: Obtiene las partidas que se tienen registradas para la vista principal de este módulo
    Parámetros: No recibe parámetros
    Retorna: Vista principal del módulo, Tablalineas.blade.php

     ********************************************************************************** */

    public function index()
    {
        $linea = partidas::join('lineas', 'partidas.partida', '=', 'lineas.partida')
            ->select('partidas.partida', 'descpartida', 'linea', 'desclinea')->orderBy('partidas.partida', 'desc')
            ->get();
        $usuario = auth()->user();
        return view('catalogos.Tablas.Tablalineas', compact('linea', 'usuario'));

    }

    /*
    funcion para llamar a la venta de agregar lineas
     */
    // public function create()
    //   {

    //     $linea = lineas::distinct()->get(['partida', 'descpartida']);
    //     $usuario = auth()->user();
    //     return view('catalogos.Agregar.AgregaLineas', compact('linea','usuario'));

    //   }

    /* **********************************************************************************

    Funcionalidad: Se crea una nueva línea dentro de una partida seleccionda y una sublínea para esta nueva línea
    Parámetros: partida
    Retorna: Un Alert con el mensaje Registro Exitoso y redirecciona a la vista principal.

     ********************************************************************************** */

    public function store(Request $request)
    {
        //Aqui busca la descripcion de la partida con el numero de partida
        $partida      = $request->input('partida');
        $querypartida = partidas::where('partida', '=', $partida)->get();

        //var_dump($partida);
        //var_dump($querypartida[0]['descpartida']);
        //dd();
        $descpartida = $querypartida[0]['descpartida'];

        $linea              = new lineas();
        $linea->partida     = $request->input('partida');
        $linea->descpartida = $descpartida;
        $linea->linea       = $request->input('LineaMax');
        $linea->desclinea   = $request->input('desclinea');

        $sublinea              = new sublineas();
        $sublinea->partida     = $request->input('partida');
        $sublinea->descpartida = $descpartida;
        $sublinea->linea       = $request->input('LineaMax');
        $sublinea->desclinea   = $request->input('desclinea');
        $sublinea->sublinea    = $request->input('sublinea');
        $sublinea->descsub     = $request->input('descsub');
        $sublinea->totalople   = $request->input('total');
        $sublinea->totaleco    = $request->input('total');

        $linea->save();
        $sublinea->save();
        Alert::success('Línea guardada', 'Registro Exitoso')->autoclose(2500);
        return redirect()->route('show-lineas');

    }

    /* **********************************************************************************

    Funcionalidad: Se crea una nueva línea dentro de una partida seleccionda y una sublínea para esta nueva línea
    Parámetros: partida
    Retorna: Un Alert con el mensaje Registro Exitoso y redirecciona a la vista principal.

     ********************************************************************************** */

    public function show(Request $request)
    {

        $lineaT = partidas::distinct()->get(['partida', 'descpartida']);
        $lineas = partidas::distinct()->orderBy('partida', 'asc')->get(['partida', 'descpartida']);
        $linea8 = partidas::distinct()->orderBy('partida', 'asc')->get(['partida', 'descpartida']);
        //mostrar partida en la vista
        $lineaL = lineas::where('partida', $request->get('Partidas'), lineas::raw('count(*) >= 1'))
            ->get();

        //el if pregunta si lineaL viene vacia
        // en caso de tener una partida mostrara el numero de partida en la vista
        $partida = isset($lineaL[0]) ? $lineaL[0] : false;
        if ($partida) {
            $partida = $lineaL[0]['partida'] . " - " . $lineaL[0]['descpartida'];
        }

        $linea3 = lineas::where('partida', $request->get('Partidas'), lineas::raw('count(*) >= 1'))
            ->get();
        $usuario = auth()->user();
        return view('catalogos.Tablas.TablaLineasShow', compact('linea3', 'lineaL', 'linea8', 'lineaT', 'lineas', 'usuario', 'partida'));
    }

    public function MostrarLineas()
    {
        $usuario = auth()->user();
        $linea   = partidas::distinct()->get(['partida', 'descpartida']);
        $linea2  = partidas::distinct()->get(['partida', 'descpartida']);
        $linea8  = partidas::distinct()->get(['partida', 'descpartida']);
        $lineaT  = partidas::distinct()->get(['partida', 'descpartida']);

        return view('catalogos.Lineas', compact('linea', 'usuario', 'lineaT', 'linea2', 'linea8'));

    }

    public function datosLinea(Request $request)
    {
        $lineas  = lineas::where('partida', $request->Partidas)->get();
        $partida = partidas::where('partida', $request->Partidas)->get();

        //print_r($lineas);

        return view('catalogos.Tablas.datatable.lineas', compact('lineas', 'partida'));
    }

}
