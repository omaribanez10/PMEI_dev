<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEquipoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Metodo para colocar permitir que usuario tiene permisos en este caso para crear equipos
        //$this->user()->isAdmin();
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
            'id_usuario_crea'  => 'required',
            'consecutivo'      => 'required',
            'nombre_equipo'    => 'required',
            'serie'            => 'nullable',
            'descripcion'      => 'nullable',
            'marca'            => 'required',
            'modelo'           => 'nullable',
            'id_empresa'       => 'required',
            'id_sede'          => 'required',
            'id_ubicacion'     => 'required',
            'id_tipo_equipo'   => 'required',
            'id_proveedor'     => 'required',
            'id_estado_equipo' => 'required',
            'registro_invima'  => 'nullable',
            'foto'             => 'nullable',
            'id_riesgo'        => 'required',

        ];
    }
}
