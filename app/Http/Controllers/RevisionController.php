<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulos;
use App\articulosecos;
use App\cancelacionresguardos;
use App\bitacoracancelaciones;
use App\bitacoramovimientos;
use App\empleados;
use Alert;

/*************** Funciones para el módulo de revisión *****************************/
class RevisionController extends Controller
{
    /* **********************************************************************************
 
    Funcionalidad: Constructor  de la clase, sirve para mantener este controlador con la autentificación del logueo del usuario
    Parámetros: No recibe parámetros
    Retorna: No regresa nada

    ********************************************************************************** */
    public function __construct(){
        $this->middleware('auth');
    }

    /* **********************************************************************************
 
    Funcionalidad: obtiene todas las cancelaciones de resguardo que se tienen registradas
    Parámetros: No recibe parámetros
    Retorna: Vista principal del módulo, revision.blade.php

    ********************************************************************************** */

    public function index(){
        $usuario = auth()->user();
        $empleados = empleados::orderBy('nombre', 'ASC')->get();
        $cancelaciones = cancelacionresguardos::orderBy('nombreempleado', 'ASC')->get();

        foreach ($cancelaciones as $cancelacion) {
        	$numArticulosOPLE = bitacoracancelaciones::where([['id_cancelacion', $cancelacion->Id],['numeroinventario','like','%OPLEV%']])->orWhere('numeroinventario','like','%IEV%')->count();

        	$numArticulosECO = bitacoracancelaciones::where([['id_cancelacion', $cancelacion->Id],['numeroinventario','like','%ECO%']])->count();

        	array_add($cancelacion,'numArticulosOPLE',$numArticulosOPLE);
        	array_add($cancelacion,'numArticulosECO',$numArticulosECO);

        	$totalImporteOPLE = 0;
        	$totalImporteECO = 0;

        	if ($numArticulosOPLE > 0){
        		$articulosOPLE = bitacoracancelaciones::where([['id_cancelacion', $cancelacion->Id],['numeroinventario','like','%OPLEV%']])->orWhere('numeroinventario','like','%IEV%')->get();

        		foreach ($articulosOPLE as $articulo) {
        			$importe = articulos::select('importe')->where('numeroinv',$articulo->numeroinventario)->get();

                    if (count($importe) > 0){
                        $totalImporteOPLE += $importe[0]['importe'];
                    }
        		}
        		$totalImporteOPLE = number_format($totalImporteOPLE,2);
        	}

        	array_add($cancelacion,'totalImporteOPLE',$totalImporteOPLE);

        	if ($numArticulosECO > 0){
        		$articulosECO = bitacoracancelaciones::where([['id_cancelacion', $cancelacion->Id],['numeroinventario','like','%ECO%']])->get();

        		foreach ($articulosECO as $articuloE) {
        			$importe = articulosecos::select('importe')->where('numeroinventario',$articuloE->numeroinventario)->get();

                    if (count($importe) > 0){
                        $totalImporteECO += $importe[0]['importe'];
                    }
        		}
        		$totalImporteECO = number_format($totalImporteECO,2);

        	}

        	array_add($cancelacion,'totalImporteECO',$totalImporteECO); 
        }

        return view('revision.revision', compact('usuario','cancelaciones','empleados'));
    }

    /* **********************************************************************************
 
    Funcionalidad: obtiene todas los artículos OPLE de la cancelación para mostrar más a detalle su información
    Parámetros: id_cancelacion
    Retorna: Un JSON con la información de los articulos OPLE

    ********************************************************************************** */

    public function detalleOPLE(Request $request){
    	$articulosOPLE = bitacoracancelaciones::where([['id_cancelacion', $request->id_cancelacion],['numeroinventario','like','%OPLEV%']])->orWhere('numeroinventario','like','%IEV%')->get();

    	if (sizeof($articulosOPLE) > 0){
    		foreach ($articulosOPLE as $articuloOPLE) {
    			$articulo = articulos::select('importe','concepto','numserie','nombreemple')->where('numeroinv',$articuloOPLE->numeroinventario)->get();

                $articulo[0]['importe'] = number_format($articulo[0]['importe'],2);

    			array_add($articuloOPLE,'concepto',$articulo[0]['concepto']);
            	array_add($articuloOPLE,'importe',$articulo[0]['importe']);
            	array_add($articuloOPLE,'numserie',$articulo[0]['numserie']);
            	array_add($articuloOPLE,'nombreemple',$articulo[0]['nombreemple']);
    		}
    		return response()->json($articulosOPLE);
    	}else{
    		return 0;
    	}    	
    }

    /* **********************************************************************************
 
    Funcionalidad: obtiene todos los artículos ECO de la cancelación para mostrar más a detalle su información
    Parámetros: id_cancelacion
    Retorna: Un JSON con la información de los articulos ECO

    ********************************************************************************** */


    public function detalleECO(Request $request){
    	$articulosECO = bitacoracancelaciones::where([['id_cancelacion', $request->id_cancelacion],['numeroinventario','like','%ECO%']])->get();

    	if (sizeof($articulosECO) > 0){
    		foreach ($articulosECO as $articuloECO) {
    			$articulo = articulosecos::select('importe','concepto','numeroserie','nombreempleado')->where('numeroinventario',$articuloECO->numeroinventario)->get();

                $articulo[0]['importe'] = number_format($articulo[0]['importe'],2);

    			array_add($articuloECO,'concepto',$articulo[0]['concepto']);
            	array_add($articuloECO,'importe',$articulo[0]['importe']);
            	array_add($articuloECO,'numserie',$articulo[0]['numeroserie']);
            	array_add($articuloECO,'nombreemple',$articulo[0]['nombreempleado']);
    		}
    		return response()->json($articulosECO);
    	}else{
    		return 0;
    	}    	
    }

    /* **********************************************************************************
 
    Funcionalidad: obtiene todos los artículos ECO y OPLE de la cancelación para asignarlos a un empleado
    Parámetros: id_cancelacion
    Retorna: Un JSON con todos los artículos asignables

    ********************************************************************************** */

    public function articulosAsignables(Request $request){
        $articulos = bitacoracancelaciones::where([['id_cancelacion',$request->id_cancelacion],['asignado','']])->get();

        if (sizeof($articulos) > 0){
            foreach ($articulos as $articulo) {
                $info = articulos::select('importe','concepto','numserie')->where('numeroinv',$articulo->numeroinventario)->get();

                if (sizeof($info) > 0 ){
                    $info[0]['importe'] = number_format($info[0]['importe'],2);

                    array_add($articulo,'concepto',$info[0]['concepto']);
                    array_add($articulo,'importe',$info[0]['importe']);
                    array_add($articulo,'numserie',$info[0]['numserie']);
                }else{
                    $info = articulosecos::select('importe','concepto','numeroserie')->where('numeroinventario',$articulo->numeroinventario)->get();

                    $info[0]['importe'] = number_format($info[0]['importe'],2);

                    array_add($articulo,'concepto',$info[0]['concepto']);
                    array_add($articulo,'importe',$info[0]['importe']);
                    array_add($articulo,'numserie',$info[0]['numeroserie']);
                }
            }
            return response()->json($articulos);
        }else{
            return 0; 
        }
    }

    /* **********************************************************************************
 
    Funcionalidad: Asigna uno o varios artículos a un empleado seleccionado
    Parámetros: numemple, numeroinv[]
    Retorna: Un Alert con un mensaje de Registro Exitoso y redirecciona a la pagina principal del módulo

    ********************************************************************************** */

    public function confirmacionAsignacion(Request $request){
        $datosEmpleado	= explode("*", $request->empleadosAsignacion);

        $empleado = empleados::where('numemple', $datosEmpleado[0])->get();

        $arregloNumeroInventario = $request->articuloSeleccionado;

        for ($i=0; $i < sizeof($arregloNumeroInventario) ; $i++) { 
        	

        	// actualizar tabla bitacora cancelaciones

        	$bitacoracancelaciones = bitacoracancelaciones::where('numeroinventario',$arregloNumeroInventario[$i])
                ->update([
                    'asignado'    => $datosEmpleado[1]
                ]);

            // actualizar tabla articulos 
            if (strpos($bitacoracancelaciones, 'OPLEV') || strpos($bitacoracancelaciones, 'IEV')){
            	$actualizarArticulo = articulos::where('numeroinv',$arregloNumeroInventario[$i])->update([
                    'numemple'      => $datosEmpleado[0], 
                    'nombreemple'   => $datosEmpleado[1],
                    'idarea'        => $empleado[0]['idarea'],
                    'nombrearea'    => $empleado[0]['nombrearea'],
                ]);
            }else{
            	$actualizarArticulo = articulosecos::where('numeroinventario',$arregloNumeroInventario[$i])
                ->update([
                    'numeroempleado'    => $datosEmpleado[0],  
                    'nombreempleado'    => $datosEmpleado[1],
                    'idarea'            => $empleado[0]['idarea'],
                    'nombrearea'        => $empleado[0]['nombrearea'],
                ]);
            }

            // actualizar bitacora movimientos
            $bitacoramovimientos = new bitacoramovimientos();

            $bitacoramovimientos->numeroinventario = $arregloNumeroInventario[$i];
            $bitacoramovimientos->numeroempleado = $datosEmpleado[0];
            $bitacoramovimientos->nombreempleado = $datosEmpleado[1];
            $bitacoramovimientos->idarea = $empleado[0]['idarea'];
            $bitacoramovimientos->nombrearea = $empleado[0]['nombrearea'];
            $bitacoramovimientos->save();
            
        }

        Alert::success('Artículo(s) asignados', 'Registro Exitoso')->autoclose(2500);
        return redirect()->route('revision');

    }

}
