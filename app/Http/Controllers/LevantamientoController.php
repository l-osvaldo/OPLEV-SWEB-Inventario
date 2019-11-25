<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lotes;
use App\bitacoralotes;
use App\articulos;
use App\articulosecos;
use App\empleados;
use Alert;
use PDF;
use DB;

class LevantamientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = auth()->user();
        $lotes = lotes::all();

        $totalOPLE = 0;
        $totalECO = 0;

        foreach ($lotes as $lote) {
            if ($lote->numeroempleado != null){
                $empleado = empleados::where('numemple',$lote->numeroempleado)->get();
                array_add($lote,'area',$empleado[0]['nombrearea']);
                array_add($lote,'tipoLote','Especifico');
            }else {
                array_add($lote,'area',' - - ');
                array_add($lote,'tipoLote','General');
            }

            if ($lote->nombre == null){
                $empleado = empleados::where('numemple',$lote->numeroempleado)->get();
                $lote->nombre = $empleado[0]['nombre'];
            }

            $bitacoralotes = bitacoralotes::where('id_lote', $lote->Id)->get();

            if (sizeof($bitacoralotes) != 0 ){
                foreach ($bitacoralotes as $bitacora) {
                    $articulosOPLE = articulos::where('numeroinv', $bitacora->numeroinventario)->count();
                    $totalOPLE += $articulosOPLE;

                    $articulosECO = articulosecos::where('numeroinventario', $bitacora->numeroinventario)->count();
                    $totalECO += $articulosECO;
                }
                array_add($lote,'totalOPLE',$totalOPLE);
                array_add($lote,'totalECO',$totalECO);
            } else {
                array_add($lote,'totalOPLE','0');
                array_add($lote,'totalECO','0');
            }
        }

        return view('levantamientoInventario.levantamientoInventario', compact('usuario','lotes'));
    }

    public function levantamientoInventarioDetalleEsp(Request $request){
        $numeroempleado = lotes::select('numeroempleado')->where('Id', $request->id_lote)->get();

        
        return 1;
    }
}
