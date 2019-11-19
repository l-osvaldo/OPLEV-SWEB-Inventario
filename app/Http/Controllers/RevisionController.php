<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulos;
use App\articulosecos;
use App\cancelacionresguardos;
use App\bitacoracancelaciones;

class RevisionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $usuario = auth()->user();

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

        			$totalImporteOPLE += $importe[0]['importe'];
        		}
        		$totalImporteOPLE = number_format($totalImporteOPLE,2);
        	}

        	array_add($cancelacion,'totalImporteOPLE',$totalImporteOPLE);

        	if ($numArticulosECO > 0){
        		$articulosECO = bitacoracancelaciones::where([['id_cancelacion', $cancelacion->Id],['numeroinventario','like','%ECO%']])->get();

        		foreach ($articulosECO as $articuloE) {
        			$importe = articulosecos::select('importe')->where('numeroinventario',$articuloE->numeroinventario)->get();

        			$totalImporteECO += $importe[0]['importe'];
        		}
        		$totalImporteECO = number_format($totalImporteECO,2);

        	}

        	array_add($cancelacion,'totalImporteECO',$totalImporteECO); 
        }

        return view('revision.revision', compact('usuario','cancelaciones'));
    }

    public function detalleOPLE(Request $request){
    	$articulosOPLE = bitacoracancelaciones::where([['id_cancelacion', $request->id_cancelacion],['numeroinventario','like','%OPLEV%']])->orWhere('numeroinventario','like','%IEV%')->get();

    	if (sizeof($articulosOPLE) > 0){
    		foreach ($articulosOPLE as $articuloOPLE) {
    			$articulo = articulos::select('importe','concepto','numserie','nombreemple')->where('numeroinv',$articuloOPLE->numeroinventario)->get();

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


    public function detalleECO(Request $request){
    	$articulosECO = bitacoracancelaciones::where([['id_cancelacion', $request->id_cancelacion],['numeroinventario','like','%ECO%']])->get();

    	if (sizeof($articulosECO) > 0){
    		foreach ($articulosECO as $articuloECO) {
    			$articulo = articulosecos::select('importe','concepto','numeroserie','nombreempleado')->where('numeroinventario',$articuloECO->numeroinventario)->get();

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

}
