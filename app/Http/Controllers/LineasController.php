<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\lineas;
use App\sublineas;
use App\partidas;
use Alert;

class LineasController extends Controller
{

  public function formValidationPost(Request $request)
    {
        $this->validate($request,[

            'partida'           =>  'required|numeric',
            'descpartida'       =>  'required|min:1|max:250',
            'LineaMax'             =>  'required|numeric',
            'desclinea'         =>  'required|min:1|max:250',
            'sublinea'          =>  'required|numeric',
            'descsub'           =>  'required|min:1|max:250',
            'total'             =>  'required|numeric',

            ],[
                
        'partida.required'     => 'La :attribute es obligatoria.',
        'partida.integer'      => 'La :attribute debe ser un entero.',

        'descpartida.required'   => 'La :attribute es obligatoria.',
        'descpartida.min'        => 'La :attribute debe contener mas de una letra.',
        'descpartida.max'        => 'La :attribute debe contener max 150 letras.',

        'LineaMax.required'     => 'La :attribute es obligatoria.',
        'LineaMax.integer'      => 'La :attribute debe ser un entero.',

        'desclinea.required'   => 'La :attribute es obligatoria.',
        'desclinea.min'        => 'La :attribute debe contener mas de una letra.',
        'desclinea.max'        => 'La :attribute debe contener max 150 letras.',
        
        'sublinea.required'     => 'La :attribute es obligatoria.',
        'sublinea.integer'      => 'La :attribute debe ser un entero.',

        'descsub.required'   => 'La :attribute es obligatoria.',
        'descsub.min'        => 'La :attribute debe contener mas de una letra.',
        'descsub.max'        => 'La :attribute debe contener max 150 letras.',

        'total.required'     => 'La :attribute es obligatoria.',
        'total.integer'      => 'La :attribute debe ser un entero.',
            ]);

        Alert::error('Revise sus campos', '¡Error!')->autoclose(2000);
    }
    /*
    funcion para mostrar los datos de la tabla lineas
    en la vista TablaPartida
    */
    public function index()
    {
        $linea = partidas::join('lineas', 'partidas.partida','=','lineas.partida')
          //  ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('partidas.partida','descpartida','linea','desclinea')
            ->get();
            $usuario = auth()->user();
            return view('catalogos.Tablas.Tablalineas', compact('linea','usuario'));

    }

    /*
    funcion para llamar a la venta de agregar lineas 
     */
    public function create()
    {
      
      $linea = lineas::distinct()->get(['partida', 'descpartida']);
      $usuario = auth()->user();
      return view('catalogos.Agregar.AgregaLineas', compact('linea','usuario'));
       // return view('catalogos.Partidas');
    }

    
    /*
    funcion para agregar una partida a la base de datos
    la variable partida recibe los datos y los envia al modelo 
    para despues guardarlos en la base de datos.
     */
    
    public function store(Request $request)
    {
      //Aqui busca la descripcion de la partida con el numero de partida
      $partida = $request->input('partida');      
      $querypartida = partidas::where('partida', '=', $partida)->get();      

      //var_dump($partida);
      //var_dump($querypartida[0]['descpartida']);
      //dd();
      $descpartida = $querypartida[0]['descpartida'];

      $linea = new lineas();      
      $linea->partida = $request->input('partida');
      $linea->descpartida = $descpartida;
      $linea->linea = $request->input('LineaMax');
      $linea->desclinea = $request->input('desclinea'); 
    
      $sublinea = new sublineas();
      $sublinea->partida = $request->input('partida');
      $sublinea->descpartida = $descpartida;
      $sublinea->linea = $request->input('LineaMax');
      $sublinea->desclinea = $request->input('desclinea');
      $sublinea->sublinea = $request->input('sublinea');
      $sublinea->descsub = $request->input('descsub');
      $sublinea->total = $request->input('total');

      $linea->save();
      $sublinea->save();
      Alert::success('Línea guardada', 'Registro Exitoso')->autoclose(2500);
      return redirect()->route('show-lineas');

    }
    
    public function show(Request $request)
    {
      
      $lineaT = partidas::distinct()->get(['partida', 'descpartida']);
      $lineas = partidas::distinct()->get(['partida', 'descpartida']);
      $linea8 = partidas::distinct()->get(['partida', 'descpartida']);
        $linea3 = lineas::where('partida', $request->get('Partidas'), lineas::raw('count(*) >= 1'))
          ->get();
          $usuario = auth()->user();
          // echo $lineas;exit();
          
        return view('catalogos.Tablas.TablaLineasShow',compact('linea3','linea8','lineaT','lineas','usuario')); 
    }

    public function MostrarLineas()
    { 
        $usuario = auth()->user();
        $linea = partidas::distinct()->get(['partida', 'descpartida']);
        $linea2 = partidas::distinct()->get(['partida', 'descpartida']);
        $linea8 = partidas::distinct()->get(['partida', 'descpartida']);
        $lineaT = partidas::distinct()->get(['partida', 'descpartida']);

        return view('catalogos.Lineas', compact('linea','usuario','lineaT','linea2','linea8'));
        
    }


}
