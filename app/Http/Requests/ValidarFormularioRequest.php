<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarFormularioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'partida'           =>  'required|numeric',
            'descpartida'       =>  'required|min:1|max:250',
            'linea'             =>  'required|numeric',
            'desclinea'         =>  'required|min:1|max:250',
            'sublinea'          =>  'required|numeric',
            'descsub'           =>  'required|min:1|max:250',
            'total'             =>  'required|numeric',
        ];
    }

    public function messages()
    {
        return [
        'partida.required'     => 'La :attribute es obligatoria.',
        'partida.integer'      => 'La :attribute debe ser un entero.',

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

        ];
    }
public function attributes()
    {
        return [
            'partida'           =>  'partida',
            'descpartida'       =>  'descripción de la partida',
            'linea'             =>  'línea',
            'desclinea'         =>  'descripción de la línea',
            'sublinea'          =>  'sublinea',
            'descsub'           =>  'descripción de la sublinea',
            'total'             =>  'total',
           
        ];
    }

}
