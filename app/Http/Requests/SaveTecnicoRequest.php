<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveTecnicoRequest extends FormRequest
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
          'nombre_1' =>  'required',
          'nombre_2' => 'nullable',
          'apellido_1' => 'required',
          'apellido_2' =>  'required',
          'tipo_documento' => 'required',
          'numero_documento' => 'required',
          'sexo'=> 'required',
          'telefono' =>'nullable',
          'direccion'  =>'nullable',
          'nombre_login' => 'required',
          'contrasena' => 'required',
          'profesion'  =>'nullable',
          'cargo'  =>'nullable',
        ];

    }
}
