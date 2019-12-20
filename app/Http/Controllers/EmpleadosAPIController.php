<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\empleados;

/*************** Funciones para los web service de la aplicación  *****************************/
class EmpleadosAPIController extends Controller
{

    /* **********************************************************************************
    Funcionalidad: todos los empleados registrados en el sistema
    Parámetros: No recibe parámetros
    Retorna: regresa un JSON con todos los empleados del sistema: numemple, nombreemple, idarea, nombrearea

    ********************************************************************************** */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = empleados::all();

        return response()->json($empleados);
    }


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
    Funcionalidad: Obtiene un empleado en especial
    Parámetros: numemple
    Retorna: regresa un JSON con el empleado seleccionado: numemple, nombreemple, idarea, nombrearea

    ********************************************************************************** */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = empleados::where('numemple',$id)->get();

        return response()->json($empleado);
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
