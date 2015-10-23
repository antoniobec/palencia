<?php namespace Palencia\Http\Requests;

class ValidateRulesTiposCursillos extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //Cambiarlo a true para cualquier usuario o invitado sólo para autentificados false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "tipo_cursillo"    =>    "required|min:2|max:50",
        ];
    }
    public function messages()
    {
        return [//Asignamos un texto por cada regla sobre cada campo
            'tipo_cursillo.required' => 'El tipo de cursillo es obligatorio!',
            'tipo_cursillo.min' => 'Longitud mínima del tipo de cursillo :min caracteres.',
            'tipo_cursillo.max' => 'Longitud máxima del tipo de cursillo :max caracteres.'
        ];
    }

}