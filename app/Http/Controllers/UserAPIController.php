<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\User;

header('Access-Control-Allow-Origin: *');

/*************** Funciones para los web service de la aplicación  *****************************/
class UserAPIController extends Controller
{

    /* **********************************************************************************
    Funcionalidad: Obtiene todos los usuarios del sistema
    Parámetros: No recibe parámetros
    Retorna: regresa un json con todos los usuarios del sistema

    ********************************************************************************** */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();

        return response()->json($usuarios);
    }

    /* **********************************************************************************
    Funcionalidad: Login de la aplicación, verifica si existe el usuario y su password
    Parámetros: usuario y pass
    Retorna: regresa un json con la respuesta

    ********************************************************************************** */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        //die('llegue');
        Log::notice("ValidaC");
        $usuario = User::where([['username', $request->usuario],['pass', $request->pass]])->get();

        $prueba = json_decode($usuario, true);

        //return $usuario;

        if (empty($prueba)){
            $res = [ "res" => 'usuario no encontrado' ];
            return response()->json($res);
        }else{
            $res = [ "res" => 'usuario encontrado' ];
            return response()->json($res);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
