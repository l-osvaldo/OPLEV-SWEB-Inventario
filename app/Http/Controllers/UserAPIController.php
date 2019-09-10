<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

header('Access-Control-Allow-Origin: *');

class UserAPIController extends Controller
{

  //   public function __construct()
  // {
  //     $this->middleware('cors');
  // }


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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        die('llegue');
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
