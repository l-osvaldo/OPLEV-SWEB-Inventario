<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\sublineas;
use APP\partidas;
use App\lineas;
use Alert;

class SublineasController extends Controller
  {

      public function formValidationPost(Request $request)
        {
            $this->validate($request,[

                'partidaA'           =>  'required|numeric',
                'descpartida'       =>  'required|min:1|max:250',
                'lineaA'             =>  'required|numeric',
                'LineaMax'             =>  'required|numeric',
                'desclinea'         =>  'required|min:1|max:250',
                'sublinea'          =>  'required|numeric',
                'descsub'           =>  'required|min:1|max:250',
                'total'             =>  'required|numeric',

                ],[
                    
            'partidaA.required'     => 'La :attribute es obligatoria.',
            'partidaA.integer'      => 'La :attribute debe ser un entero.',

            'descpartida.required'   => 'La :attribute es obligatoria.',
            'descpartida.min'        => 'La :attribute debe contener mas de una letra.',
            'descpartida.max'        => 'La :attribute debe contener max 30 letras.',

            'lineaA.required'     => 'La :attribute es obligatoria.',
            'lineaA.integer'      => 'La :attribute debe ser un entero.',

            'LineaMax.required'     => 'La :attribute es obligatoria.',
            'LineaMax.integer'      => 'La :attribute debe ser un entero.',

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


      public function show(Request $request)
        {          
            $partida = $request->get('Partidas');
            $linea = $request->get('Linea');
            $sublineas = sublineas::where('partida',$partida)->where('linea',$linea)->get();
            $sublineaAgt = sublineas::distinct()->get(['partida', 'descpartida']); 
            $sublineaSe = sublineas::distinct()->get(['partida', 'descpartida']);
            //mostrar partida en la vista Y linea
            $lineaL = sublineas::where('partida', $request->get('Partidas'), sublineas::raw('count(*) >= 1'))
            ->get();
            
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

        public function obtenLineas(Request $request)
        {
          $partida = $request->partida;
          $lineas = lineas::where('partida', $partida)->get();      
          return response()->json($lineas);
          }
            
            //Agregar Sublinea -- linea
        public function obtenLineasAg(Request $request)
          {
            $partida = $request->partida;
            $lineas = lineas::where('partida', $partida)->get();      
            return response()->json($lineas);
            }
            
            //Agregar Sublinea -- sublinea
        public function obtenSublineas(Request $request)
          {
            $partida = $request->partida;
            $linea = $request->linea;
            $sublineas = sublineas::where('partida', $partida)->where('linea', $linea)->orderBy('sublinea', 'DESC')->get(); 
            $numsublinea = $sublineas[0]['sublinea'] + 1;
      
            return response()->json($numsublinea);
          }
            
            //ultima linea +1
        public function obtenMaxLineas(Request $request)
          {

            $partida = $request->partida;
            $lineas = lineas::where('partida', $partida)->get(); 
            
            return response()->json($lineas);
          }



        public function ajaxRequest()
          {
            $usuario = auth()->user();
            $sublinea = sublineas::distinct()->get(['partida', 'descpartida']);				
            return view('catalogos.Sublineas', compact('sublinea','usuario'));
          }


        public function ajaxRequestPost(Request $request)
          {
            $input = $request->all();
            $sublinea = sublineas::where('partida',$request->partida)->distinct()
                ->orderBy('linea', 'ASC')
                    ->get(['linea','desclinea']);
            return response()->json($sublinea);
          }
        

        //ajax para crear lineas
        public function ajaxRequestLineas()
          {
            $sublinea = sublineas::distinct()->get(['partida', 'descpartida']);
            return view('catalogos.Agregar.AgregaLineas', compact('sublinea'));
          }

        public function ajaxRequestLineasPost(Request $request)
          {
            $input = $request->all();
            $sublinea = sublineas::where('partida',$request->partida)->distinct()
                    ->max('linea')
                    ->get(['linea']);
            return response()->json($sublinea);
          }


        //sublineas controller

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
              $sublinea->total = $request->input('total');
              $sublinea->save();

              $usuario = auth()->user();
              Alert::success('Sublínea guardada', 'Registro Exitoso')->autoclose(2500);
              return redirect()->route('show-sublineas', compact('usuario'));
            

          } 
        /*funcion para mostrar las partidas 
        tanto en agregar linea como en catalogo de linea
        */ 
        public function SublineaNueva()
          {
            $usuario = auth()->user();
            $sublinea = sublineas::distinct()->get(['partida', 'descpartida']);
            return view('catalogos.Agregar.AgregaSublineas', compact('sublinea','usuario'));

          }
        //vista de sublineas 
        public function MostrarSubLineas()
          {
            $usuario = auth()->user();
            $sublinea = sublineas::distinct()->get(['partida', 'descpartida']);
            $sublineaAg = sublineas::distinct()->get(['partida', 'descpartida']);   
            $sublineasTb = sublineas::distinct()->get(['partida', 'descpartida']);    
            return view('catalogos.Sublineas', compact('sublinea','sublineasTb','sublineaAg','usuario'));
          }
  }
