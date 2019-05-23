<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sublineas;
use APP\partidas;
use App\lineas;
use Alert;

class validarController extends Controller
{
    //
    public function formValidationPost(Request $request)
    {
        $this->validate($request,[
        'partida.required'     => 'La :attribute es obligatoria.',
        'partida.integer'      => 'La :attribute debe ser un entero.',
        'partida.unique'       => 'La :attribute ya existe.',

        'descpartida.required'   => 'La :attribute es obligatoria.',
        'descpartida.min'        => 'La :attribute debe contener mas de una letra.',
        'descpartida.max'        => 'La :attribute debe contener max 30 letras.',

        'linea.required'     => 'La :attribute es obligatoria.',
        'linea.integer'      => 'La :attribute debe ser un entero.',

        'desclinea.required'   => 'La :attribute es obligatoria.',
        'desclinea.min'        => 'La :attribute debe contener mas de una letra.',
        'desclinea.max'        => 'La :attribute debe contener max 30 letras.',
        
        'sublinea.required'     => 'La :attribute es obligatoria.',
        'sublinea.integer'      => 'La :attribute debe ser un entero.',

        'descsub.required'   => 'La :attribute es obligatoria.',
        'descsub.min'        => 'La :attribute debe contener mas de una letra.',
        'descsub.max'        => 'La :attribute debe contener max 30 letras.',

        'total.required'     => 'La :attribute es obligatoria.',
        'total.integer'      => 'La :attribute debe ser un entero.',
            ]);

        Alert::error('Revise sus campos', '¡Error!')->autoclose(2000);
    }

    public function store(Request $request)
    {

        $status = 1;
        $roles = Role::all();
        $usuario = new User([
            'nombre'    =>  $request->get('nombreA'),
            'apePat'     =>  $request->get('apePatA'),
            'apeMat'     =>  $request->get('apeMatA'),
            'username'     =>  $request->get('usuarioA'),
            'status'     =>  $status,
            'cargo'     =>   $request->input('selectcargoA'),
            'id_area'     =>  $request->get('idOrgA'),
            'area'     =>   $request->get('nameOrgA'),
            'tipo'     =>  $request->get('typeA'),
            'email'     =>  $request->get('correoA'),
            'pass'     =>  $request->get('contPassA'),
            'password'     =>  Hash::make($request->get('contPassA'))
        ]);
        $usuario->save();
        Alert::success('Usuario/a guardado', 'Registro Exitoso')->autoclose(2500);
        $usuario->roles()->attach($request->input('selectrolA'));
        return redirect()->route('usuarios');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
