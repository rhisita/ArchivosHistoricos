<?php

namespace SisArchivos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersoneriaFormRequest extends FormRequest
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
     * Get the validation rules that apply to the request***** mimes:jpeg,png,gif,svg,pdf,docx,doc |max:10240000.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'hoja_ruta' =>'required|max:50',
          'nombre' =>'required|max:100',
          'fecha_creacion',
          'representante_legal' =>'required|max:50',
          'institucion_solicitante' =>'required|max:100',
          'domicilio' =>'required|max:50',
               
        ];
    }
}
