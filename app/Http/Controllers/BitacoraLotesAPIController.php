<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bitacoralotes;

/*************** Funciones para los web service de la aplicación  *****************************/
class BitacoraLotesAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /* **********************************************************************************

    Funcionalidad: Crea el registro de una bitacora de un lote 
    Parámetros: id_lote y numeroinventario
    Retorna: Un JSON con la información de una bitacoralotes: idlote ,numeroinventario

    ********************************************************************************** */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $bitacoralote =  new bitacoralotes();

        $bitacoralote->id_lote = $request->id_lote;
        $bitacoralote->numeroinventario = $request->numeroinventario;
        $bitacoralote->save();

        return response()->json($bitacoralote);
    }


    /* **********************************************************************************

    Funcionalidad: Obtiene la información de una bitacora de acuerdo al id enviado 
    Parámetros: numeroinventario
    Retorna: Un JSON con la información de una bitacoralotes: idlote ,numeroinventario

    ********************************************************************************** */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bitacoralote = bitacoralotes::where('numeroinventario',$id)->get();

        return response()->json($bitacoralote);
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
        //
    }

    /* **********************************************************************************

    Funcionalidad: Elimina un registro de la tabla bitacoralotes 
    Parámetros: numeroinventario
    Retorna: Un JSON con la información de una bitacoralotes: idlote ,numeroinventario

    ********************************************************************************** */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bitacoralote = bitacoralotes::where('numeroinventario',$id)->delete();

        //return response()->json($bitacoralote);
        //$bitacoralote->destroy();

        return response()->json($bitacoralote);;
    }

    /* **********************************************************************************

    Funcionalidad: obtiene todos los registros de un id_lote en especial
    Parámetros: id_lote
    Retorna: Un JSON con la información de una bitacoralotes: idlote ,numeroinventario

    ********************************************************************************** */

    public function allBitacorasId(Request $request){
        $bitacoralote = bitacoralotes::where('id_lote',$request->id)->get();

        return response()->json($bitacoralote);
    }

    public function getArticuloBitacoraLote(Request $request){
        $existe = bitacoralotes::where([['id_lote',$request->id_lote],['numeroinventario', $request->numeroinventario]])->first();
        if ($existe !== null ){
            return 1;
        }else{
            return 0;
        }
    }
}
