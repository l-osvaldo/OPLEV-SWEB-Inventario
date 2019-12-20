<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\empleados;
use App\articulos;
use App\articulosecos;
use App\cancelacionresguardos;
use App\bitacoracancelaciones;
use PDF;

/*************** Funciones para el módulo de Cancelación de resguardo *****************************/
class CancelacionResguardoController extends Controller
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


    /* **********************************************************************************
 
    Funcionalidad: Obtiene el nombre de todos los empleados.
    Parámetros: No recibe parámetros
    Retorna: Vista principal del módulo de cancelación de resguardo, cancelacionResguardo.blade.php

    ********************************************************************************** */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = auth()->user();
        $empleados = empleados::orderBy('nombre', 'ASC')->get();


        return view('cancelacion.cancelacionResguardo', compact('usuario','empleados'));
    }

    /* **********************************************************************************
 
    Funcionalidad: Obtiene todos los artículos que esten al resguardo de un empleado en especial, de las tablas articulos y articulosecos
    Parámetros: numEmpleado
    Retorna: Vista de los articulos de un empleado, tableBienesEmpleado.blade.php

    ********************************************************************************** */

    public function bienesDelEmpleado(Request $request){
        $bienesOPLE = articulos::where('numemple',$request->numEmpleado)->get();
        $bienesECO = articulosecos::where('numeroempleado',$request->numEmpleado)->get();

        $validarBtnCancelacion = 0;

        if (sizeof($bienesOPLE) != 0 || sizeof($bienesECO) != 0){
            $validarBtnCancelacion = 1;
        }

        return view('cancelacion.tableBienesEmpleado', compact('bienesOPLE','bienesECO','validarBtnCancelacion'));
    }

    /* **********************************************************************************
 
    Funcionalidad: Cambia los registros de numemple, nombreemple, idarea, nombrearea de las tablas articulos y articulosecos a BODEGA 
    Parámetros: numEmpleado
    Retorna: Regresa el id de la cancelación

    ********************************************************************************** */

    public function cancelacionResguardoconfirmado(Request $request){
        $bienesOPLE = articulos::where('numemple',$request->numEmpleado)->get();
        $bienesECO = articulosecos::where('numeroempleado',$request->numEmpleado)->get();
        $datosEmpleado = empleados::where('numemple',$request->numEmpleado)->get();

        $cancelacion = new cancelacionresguardos();

        $cancelacion->numempleado       = $datosEmpleado[0]['numemple'];
        $cancelacion->nombreempleado    = $datosEmpleado[0]['nombre'];
        $cancelacion->idarea            = $datosEmpleado[0]['idarea'];
        $cancelacion->nombrearea        = $datosEmpleado[0]['nombrearea'];
        $cancelacion->save();

        if (sizeof($bienesOPLE) != 0){
            foreach ($bienesOPLE as $bien) {
                $bitacora = new bitacoracancelaciones();

                $bitacora->id_cancelacion = $cancelacion->id;
                $bitacora->numeroinventario = $bien->numeroinv;
                $bitacora->asignado = '';
                $bitacora->save();
            }

            $articulo = articulos::where('numemple',$request->numEmpleado)
                ->update([
                    'numemple'      => '999', 
                    'nombreemple'   => 'BODEGA',
                    'idarea'        => '15',
                    'nombrearea'    => 'BODEGA',
                ]);
        }

        if (sizeof($bienesECO) != 0){
            foreach ($bienesECO as $bienE) {
                $bitacora = new bitacoracancelaciones();

                $bitacora->id_cancelacion = $cancelacion->id;
                $bitacora->numeroinventario = $bienE->numeroinventario;
                $bitacora->asignado = '';
                $bitacora->save();
            }

            $articuloE = articulosecos::where('numeroempleado',$request->numEmpleado)
                ->update([
                    'numeroempleado'    => '999', 
                    'nombreempleado'    => 'BODEGA',
                    'idarea'            => '15',
                    'nombrearea'        => 'BODEGA',
                ]);
        }

        return $cancelacion->id;
    }

    /* **********************************************************************************
 
    Funcionalidad: Genera el reporte en pdf de los articulos que fueron asignados a BODEGA despúes de la cancelación del resguardo
    Parámetros: id_cancelacion
    Retorna: Regresa un pdf, CancelacionDeResguardo.pdf

    ********************************************************************************** */
    public function cancelacionResguardoPDF(Request $request){

        $articulosOPLE = bitacoracancelaciones::where([['id_cancelacion', $request->id_cancelacion],['numeroinventario','like','%OPLEV%']])->orWhere('numeroinventario','like','%IEV%')->get();

        $articulosECO = bitacoracancelaciones::where([['id_cancelacion', $request->id_cancelacion],['numeroinventario','like','%ECO%']])->get();

        $totalImporteOPLE = 0;
        $totalImporteECO = 0;

        foreach ($articulosOPLE as $ople) {
            $bienOPlE = articulos::select('concepto','importe','numserie')->where('numeroinv',$ople->numeroinventario)->get();

            $totalImporteOPLE += $bienOPlE[0]['importe'];

            array_add($ople,'concepto',$bienOPlE[0]['concepto']);
            array_add($ople,'importe',$bienOPlE[0]['importe']);
            array_add($ople,'numserie',$bienOPlE[0]['numserie']);
        }

        foreach ($articulosECO as $eco) {
            $bienECO = articulosecos::select('concepto','importe','numeroserie')->where('numeroinventario',$eco->numeroinventario)->get();

            $totalImporteECO += $bienECO[0]['importe'];

            array_add($eco,'concepto',$bienECO[0]['concepto']);
            array_add($eco,'importe',$bienECO[0]['importe']);
            array_add($eco,'numserie',$bienECO[0]['numeroserie']);
        }

        $datosEmpleado = cancelacionresguardos::where('id', $request->id_cancelacion)->get();

        $numArticulosOPLE = bitacoracancelaciones::where([['id_cancelacion', $request->id_cancelacion],['numeroinventario','like','%OPLEV%']])->orWhere('numeroinventario','like','%IEV%')->count();

        $numArticulosECO = bitacoracancelaciones::where([['id_cancelacion', $request->id_cancelacion],['numeroinventario','like','%ECO%']])->count();

        $hoy = getdate();
        $fecha = $hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year'];

        $pdf = PDF::loadView('cancelacion.pdf.CancelacionDelResguardoPDF', compact('articulosOPLE','articulosECO','datosEmpleado','fecha','numArticulosOPLE','numArticulosECO','totalImporteOPLE','totalImporteECO'))->setPaper('letter', 'landscape');

        return $pdf->inline('CancelacionDeResguardo-'.$datosEmpleado[0]['nombreempleado'].'.pdf');
    }

    
}
