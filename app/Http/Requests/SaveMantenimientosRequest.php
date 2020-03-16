<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveMantenimientosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Metodo para colocar permitir que usuaio tiene permisos en este caso para crear equipos
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
        'id_usuario_crea' => 'required',
        'id_usuario_recibe' => 'required',
        'id_equipo' => 'required',
        'id_sede' => 'required',
        'id_empresa' => 'required',
        'ind_estado_aceptado' => 'nullable',
        'id_tipo_mantenimiento' => 'required',
        'problema'=> 'required',
        'repuesto' => 'required',
        'observacion' => 'required',
      ];

    }
  }
