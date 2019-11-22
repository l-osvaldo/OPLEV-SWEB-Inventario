<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bitacoralotes;

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
}
