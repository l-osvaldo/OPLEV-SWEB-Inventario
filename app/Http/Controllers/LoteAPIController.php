<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lotes;

//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');

class LoteAPIController extends Controller
{
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

    public function lotesCerrados(){

        $lotes = lotes::where('estado','Cerrado')->get();

        return response()->json($lotes);
    }
}
