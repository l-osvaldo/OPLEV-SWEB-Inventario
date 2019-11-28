<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lotes;
use App\bitacoralotes;
use App\bitacoramovimientos;
use App\articulos;
use App\articulosecos;
use App\empleados;
use Alert;
use PDF;
use DB;
use DateTime;

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
        $lotes = lotes::whereNotIn('estado', ['Cancelado'])->get();

        //print_r($lotes);

        $totalOPLE = 0;
        $totalECO = 0;

        if (sizeof($lotes) > 0){
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
                }else {
                    $lote->nombre = $lote->nombre.' - '.$lote->descripcion;
                }

                $newfecha = date("d/m/Y", strtotime($lote->created_at));

                array_add($lote,'fecha',$newfecha);

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

                $totalOPLE = 0;
                $totalECO = 0;
            }
        }        

        return view('levantamientoInventario.levantamientoInventario', compact('usuario','lotes'));
    }

    public function levantamientoInventarioDetalleEsp(Request $request){
        $numeroempleado = lotes::select('numeroempleado')->where('Id', $request->id_lote)->first();

        // echo $numeroempleado->numeroempleado;

        $empleado = empleados::where('numemple', $numeroempleado)->get();

        $bitacoralotes = bitacoralotes::where('id_lote',$request->id_lote)->get();

        foreach ($bitacoralotes as $bl) {
            $anterior = DB::table('bitacoramovimientos')->select('anterior', DB::raw('MAX(created_at)'))->where('numeroinventario',$bl->numeroinventario)->groupBy('anterior')->get();

            array_add($bl,'anterior',$anterior);

            //$anteriorNombre = empleados::


            if (strpos($bl->numeroinventario,'PLE') != false || strpos($bl->numeroinventario,'EV') != false){
                array_add($bl,'tipo','OPLE');
                $articuloOPLE = articulos::select('concepto','numemple','nombreemple')->where('numeroinv', $bl->numeroinventario)->get();

                if (sizeof($articuloOPLE) != 0){
                    if ($numeroempleado->numeroempleado === $articuloOPLE[0]['numemple']){
                        array_add($bl,'semaforo','si');
                        array_add($bl,'nombreemple','');
                    }else{
                        array_add($bl,'semaforo','no');
                        array_add($bl,'nombreemple',$articuloOPLE[0]['nombreemple']);
                    }
                    array_add($bl,'concepto',$articuloOPLE[0]['concepto']);
                    
                }else{
                    array_add($bl,'semaforo','?');
                    array_add($bl,'concepto','No esta registrado');
                    array_add($bl,'nombreemple','No esta registrado');
                }
            }
            if (strpos($bl->numeroinventario, 'CO') != false){
                array_add($bl,'tipo','ECO');
                $articuloECO = articulosecos::select('concepto','numeroempleado','nombreempleado')->where('numeroinventario', $bl->numeroinventario)->get();

                if (sizeof($articuloECO) != 0){
                    if ($numeroempleado->numeroempleado == $articuloECO[0]['numeroempleado']){
                        array_add($bl,'semaforo','si');
                        array_add($bl,'nombreemple','');
                    }else{
                        array_add($bl,'semaforo','no');
                        array_add($bl,'nombreemple',$articuloECO[0]['nombreempleado']);
                    }
                    array_add($bl,'concepto',$articuloECO[0]['concepto']);
                }else{
                    array_add($bl,'semaforo','?');
                    array_add($bl,'concepto','No esta registrado');
                    array_add($bl,'nombreemple','No esta registrado');
                }
            }
            $fecha = date("d/m/Y", strtotime($bl->created_at));

            array_add($bl,'fecha',$fecha);
            array_add($bl,'numeroEmpleado',$numeroempleado->numeroempleado);

        }

        return response()->json($bitacoralotes);
    }

    public function levantamientoInventarioDetalleGral(Request $request){
        $numeroempleado = lotes::select('numeroempleado')->where('Id', $request->id_lote)->first();

        $empleado = empleados::where('numemple', $numeroempleado)->get();

        $bitacoralotes = bitacoralotes::where('id_lote',$request->id_lote)->get();

        foreach ($bitacoralotes as $bl) {
            if (strpos($bl->numeroinventario,'PLE') != false || strpos($bl->numeroinventario,'EV') != false){
                array_add($bl,'tipo','OPLE');
                $articuloOPLE = articulos::select('concepto','numemple','nombreemple')->where('numeroinv', $bl->numeroinventario)->get();

                if (sizeof($articuloOPLE) != 0){
                    if ($numeroempleado->numeroempleado == $articuloOPLE[0]['numemple']){

                    }else{
                    }
                    array_add($bl,'concepto',$articuloOPLE[0]['concepto']);
                    array_add($bl,'nombreemple',$articuloOPLE[0]['nombreemple']);
                }else{
                    array_add($bl,'concepto','No esta registrado');
                    array_add($bl,'nombreemple','No esta registrado');
                }
            }
            if (strpos($bl->numeroinventario, 'CO') != false){
                array_add($bl,'tipo','ECO');
                $articuloECO = articulosecos::select('concepto','numeroempleado','nombreempleado')->where('numeroinventario', $bl->numeroinventario)->get();

                if (sizeof($articuloECO) != 0){
                    if ($numeroempleado->numeroempleado == $articuloECO[0]['numeroempleado']){
                        array_add($bl,'semaforo','si');
                    }else{
                        array_add($bl,'semaforo','no');
                    }
                    array_add($bl,'concepto',$articuloECO[0]['concepto']);
                    array_add($bl,'nombreemple',$articuloECO[0]['nombreempleado']);
                }else{
                    array_add($bl,'semaforo','?');
                    array_add($bl,'concepto','No esta registrado');
                    array_add($bl,'nombreemple','No esta registrado');
                }
            }

            $fecha = date("d/m/Y", strtotime($bl->created_at));

            array_add($bl,'fecha',$fecha);
        }

        return response()->json($bitacoralotes);
    }

    public function levantamientoInventarioDetallePDF(Request $request){
        $numeroempleado = lotes::select('numeroempleado')->where('Id', $request->id_lote)->get();

        $empleado = empleados::where('numemple', $numeroempleado[0]->numeroempleado)->get();

        $bitacoralotes = bitacoralotes::where('id_lote',$request->id_lote)->get();

        $numeroArticulos =  bitacoralotes::where('id_lote',$request->id_lote)->count();

        $totalImporte = 0;

        foreach ($bitacoralotes as $bl) {
            if (strpos($bl->numeroinventario,'PLE') != false || strpos($bl->numeroinventario,'EV') != false){
                array_add($bl,'tipo','OPLE');
                $articuloOPLE = articulos::select('concepto','numemple','nombreemple','importe')->where('numeroinv', $bl->numeroinventario)->get();

                if (sizeof($articuloOPLE) != 0){
                    if ($numeroempleado == $articuloOPLE[0]['numemple']){
                        array_add($bl,'semaforo','si');
                    }else{
                        array_add($bl,'semaforo','no');
                    }
                    array_add($bl,'concepto',$articuloOPLE[0]['concepto']);
                    array_add($bl,'nombreemple',$articuloOPLE[0]['nombreemple']);
                    array_add($bl,'importe',$articuloOPLE[0]['importe']);
                    $totalImporte += $articuloOPLE[0]['importe'];
                }else{
                    array_add($bl,'semaforo','?');
                    array_add($bl,'concepto','No esta registrado');
                    array_add($bl,'nombreemple','No esta registrado');
                    array_add($bl,'importe',' -- ');
                }
            }
            if (strpos($bl->numeroinventario, 'CO') != false){
                array_add($bl,'tipo','ECO');
                $articuloECO = articulosecos::select('concepto','numeroempleado','nombreempleado','importe')->where('numeroinventario', $bl->numeroinventario)->get();

                if (sizeof($articuloECO) != 0){
                    if ($numeroempleado == $articuloECO[0]['numeroempleado']){
                        array_add($bl,'semaforo','si');
                    }else{
                        array_add($bl,'semaforo','no');
                    }
                    array_add($bl,'concepto',$articuloECO[0]['concepto']);
                    array_add($bl,'nombreemple',$articuloECO[0]['nombreempleado']);
                    array_add($bl,'importe',$articuloECO[0]['importe']);
                    $totalImporte += $articuloECO[0]['importe'];
                }else{
                    array_add($bl,'semaforo','?');
                    array_add($bl,'concepto','No esta registrado');
                    array_add($bl,'nombreemple','No esta registrado');
                    array_add($bl,'importe',' -- ');
                }
            }
        }

        $hoy = getdate();

        $fecha = $hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year'];

        //echo $empleado[0]['nombre'];

        if ($request->tipo == 'Especifico'){
            $pdf = PDF::loadView('levantamientoInventario.pdf.detalleEspecificoPDF', compact('bitacoralotes','empleado','numeroArticulos','fecha','totalImporte'))->setPaper('letter', 'landscape');
            return $pdf->inline('DetalleEspecificoPDF'. $empleado[0]['nombre'].'.pdf');
        }else{
            $lote = lotes::where('Id', $request->id_lote )->get();
            $pdf = PDF::loadView('levantamientoInventario.pdf.detalleGeneralPDF', compact('bitacoralotes','lote','numeroArticulos','fecha','totalImporte'))->setPaper('letter', 'landscape');
            return $pdf->inline('DetalleGeneralPDF'.$lote[0]['nombre'] .'.pdf');
        }
    }

    public function actualizar()
    {
        $lotes = lotes::whereNotIn('estado', ['Cancelado'])->get();

        //print_r($lotes);

        $totalOPLE = 0;
        $totalECO = 0;

        if (sizeof($lotes) > 0){
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
                }else {
                    $lote->nombre = $lote->nombre.' - '.$lote->descripcion;
                }

                $newfecha = date("d/m/Y", strtotime($lote->created_at));

                array_add($lote,'fecha',$newfecha);

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

                $totalOPLE = 0;
                $totalECO = 0;
            }
        }        
        //print_r($lotes);
        return view('levantamientoInventario.actualizarTabla', compact('lotes'));
    }

    public function confirmacionAsignacionL(Request $request){
        $empleado = empleados::where('numemple', $request->hiddenNumeroEmpleado)->get();

        $input = $request->all();

        //print_r($input['articuloSeleccionadoLOPLE']);

        if (array_key_exists('articuloSeleccionadoLOPLE', $input)) {
            $OPLE = $input['articuloSeleccionadoLOPLE'];

            for ($i=0; $i < sizeof($OPLE) ; $i++) {
                $numeroempleadoAnterior = articulos::select('numemple')->where('numeroinv',$OPLE[$i])->first();

                $articulo = articulos::where('numeroinv', $OPLE[$i])->update([
                    'numemple'      => $empleado[0]['numemple'], 
                    'nombreemple'   => $empleado[0]['nombre'],
                    'idarea'        => $empleado[0]['idarea'],
                    'nombrearea'    => $empleado[0]['nombrearea'],
                ]);

                $bitacoramovimientos = new bitacoramovimientos();

                $bitacoramovimientos->numeroinventario = $OPLE[$i];
                $bitacoramovimientos->numeroempleado = $empleado[0]['numemple'];
                $bitacoramovimientos->nombreempleado = $empleado[0]['nombre'];
                $bitacoramovimientos->idarea = $empleado[0]['idarea'];
                $bitacoramovimientos->nombrearea = $empleado[0]['nombrearea'];
                $bitacoramovimientos->anterior = $numeroempleadoAnterior->numemple;
                $bitacoramovimientos->save();

                // echo $bitacoramovimientos;

                $bitacoralote = bitacoralotes::where('numeroinventario', $OPLE[$i])->update([
                    'estatus' => 'AsignadoDesdeLevantamientoInventario'
                ]);
            }


            
        }

        if (array_key_exists('articuloSeleccionadoLECO', $input)) {
            $ECO = $input['articuloSeleccionadoLECO'];

            for ($i=0; $i < sizeof($ECO) ; $i++) {
                $numeroempleadoAnterior = articulosecos::select('numeroempleado')->where('numeroinventario',$ECO[$i])->first();

                $articulo = articulosecos::where('numeroinventario', $ECO[$i])->update([
                    'numeroempleado'      => $empleado[0]['numemple'], 
                    'nombreempleado'   => $empleado[0]['nombre'],
                    'idarea'        => $empleado[0]['idarea'],
                    'nombrearea'    => $empleado[0]['nombrearea'],
                ]);

                $bitacoramovimientos = new bitacoramovimientos();

                $bitacoramovimientos->numeroinventario = $ECO[$i];
                $bitacoramovimientos->numeroempleado = $empleado[0]['numemple'];
                $bitacoramovimientos->nombreempleado = $empleado[0]['nombre'];
                $bitacoramovimientos->idarea = $empleado[0]['idarea'];
                $bitacoramovimientos->nombrearea = $empleado[0]['nombrearea'];
                $bitacoramovimientos->anterior = $numeroempleadoAnterior->numeroempleado;
                $bitacoramovimientos->save();

                $bitacoralote = bitacoralotes::where('numeroinventario', $ECO[$i])->update([
                    'estatus' => 'AsignadoDesdeLevantamientoInventario'
                ]);
            }
        }

        Alert::success('Artículo(s) asignados a '.$empleado[0]['nombre'], 'Asignación Exitosa')->autoclose(2500);
        return redirect()->route('levantamientoInventario');

    }

    public function eliminarArticuloLevantamiento(Request $request){
        $numeroinventario = $request->numeroinventario;

        $bitacoralote = bitacoralotes::where('numeroinventario',$numeroinventario)->delete();
        return 1;
    }
}
