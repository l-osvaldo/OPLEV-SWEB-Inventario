<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulosecos;

class ArtECOsAPIController extends Controller
{
    /* **********************************************************************************
    Funcionalidad: Obtiene todos los artículos OPLE de la base de datos
    Parámetros: No recibe parámetros
    Retorna: regresa un json con todos los artículos OPLE de la tabla de articulos y todos sus columnas:
                partida, descpartida, linea, desclinea, sublinea, descsublinea, consecutivo, numeroinv,
                concepto, marca, importe, colores, fechacomp, idarea, nombrearea, numemple, nombreemple,
                numserie, medidas, modelo, material, clvestado, estado, factura

    ********************************************************************************** */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulosECO = articulosecos::all();

        return response()->json($articulosECO);
    }


    // Función para los web service de la aplicación
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /* **********************************************************************************

    Función para los web service de la aplicación 
    Funcionalidad: Obtiene un artículo en especial de artículos ECO de la base de datos de acuerdo al numero de inventario que recibe
    Parámetros: Recibe como parámetro un id, en este caso es el numero de inventario a buscar
    Retorna: Regresa un json con todos los datos del artículo o null si no lo encuentra o no existe

    ********************************************************************************** */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = articulosecos::where('numeroinventario',$id)->get();

        return response()->json($articulo);
    }

    // Función para los web service de la aplicación
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

    // Función para los web service de la aplicación
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
