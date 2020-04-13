<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lotes;

//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');

/*************** Funciones para los web service de la aplicación  *****************************/
class LoteAPIController extends Controller
{

    /* **********************************************************************************
    Funcionalidad: Obtiene todos los lotes que tengan estado abierto
    Parámetros: No recibe parámetros
    Retorna: regresa un json con todos los lotes que estan registrados.

    ********************************************************************************** */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotes = lotes::whereNotIn('estado',['Cancelado','Cerrado'])->orderBy('created_at','desc')->get();

        return response()->json($lotes);
    }


    /* **********************************************************************************
    Funcionalidad: Crea un nuevo registro en el sistema
    Parámetros: nombre, numeroempleado, descripcion y estado
    Retorna: regresa un json del lote registrado

    ********************************************************************************** */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lote = new lotes();

        $lote->nombre = $request->nombre;
        $lote->numeroempleado = $request->numeroempleado;
        $lote->descripcion = $request->descripcion;
        $lote->estado = $request->estado;
        $lote->save();

        return response()->json($lote);
    }

    /* **********************************************************************************
    Funcionalidad: Obtiene la información de un lote en especifico
    Parámetros: Id
    Retorna: regresa un json del lote solicitado

    ********************************************************************************** */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lote = lotes::where('Id',$id)->get();

        return response()->json($lote);
    }

    /* **********************************************************************************
    Funcionalidad: Actualiza el estado de un lote en especifico
    Parámetros: Id, estado
    Retorna: regresa un json del lote actualizado

    ********************************************************************************** */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lote = lotes::where('id',$id)->update(['estado' => $request->estado]);
        $lote = lotes::find($id);

        return response()->json($lote);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /* **********************************************************************************
    Funcionalidad: obtiene los lotes con estado cerrado y de un empleado en especifico
    Parámetros: No recibe parámetros
    Retorna: regresa un json de lotes

    ********************************************************************************** */

    public function lotesCerradosEmpleado(){

        $lotes = lotes::where([['estado','Cerrado'],['descripcion', null]])->get();

        return response()->json($lotes);
    }

    /* **********************************************************************************
    Funcionalidad: obtiene los lotes con estado cerrado y de un lote general
    Parámetros: No recibe parámetros
    Retorna: regresa un json de lotes

    ********************************************************************************** */

    public function lotesCerradosGral(){

        $lotes = lotes::where([['estado','Cerrado'],['numeroempleado', null]])->get();

        return response()->json($lotes);
    }

    public function lotesAbiertosEmpleado(){
        $lotes = lotes::where([['estado','Abierto'],['descripcion', null]])->get();

        return response()->json($lotes);

    }

    public function lotesAbiertosGral(){

        $lotes = lotes::where([['estado','Abierto'],['numeroempleado', null]])->get();

        return response()->json($lotes);
    }
}
