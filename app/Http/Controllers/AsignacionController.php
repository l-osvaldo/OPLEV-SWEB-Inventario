<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cancelacionresguardos;
use App\bitacoracancelaciones;
use App\articulos;
use App\articulosecos;

class AsignacionController extends Controller
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

        $cancelaciones = cancelacionresguardos::orderBy('nombreempleado', 'ASC')->get();

        return view('asignacion.asignacion', compact('usuario','cancelaciones'));
    }

    public function bienesCancelados(Request $request){
        $bienes = bitacoracancelaciones::where([['id_cancelacion', $request->idCancelacion],['asignado','']])->get();

        foreach ($bienes as $bien) {
            $infoBien = articulos::select('concepto','importe','numserie')->where('numeroinv',$bien->numeroinventario)->get();

            

            if (sizeof($infoBien) != 0 ){
                array_add($bien,'concepto',$infoBien[0]['concepto']);
                array_add($bien,'importe',$infoBien[0]['importe']);
                array_add($bien,'numserie',$infoBien[0]['numserie']);
            }else{
                $infoBien = articulosecos::select('concepto','importe','numeroserie')->where('numeroinventario',$bien->numeroinventario)->get();

                array_add($bien,'concepto',$infoBien[0]['concepto']);
                array_add($bien,'importe',$infoBien[0]['importe']);
                array_add($bien,'numserie',$infoBien[0]['numeroserie']);
            }
        }


        return view('asignacion.tableAsignacion',compact('bienes'));
    }
}
