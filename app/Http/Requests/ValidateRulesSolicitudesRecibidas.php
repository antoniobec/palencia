<?php namespace Palencia\Http\Requests;

use Palencia\Http\Requests\Request;

class ValidateRulesComunidades extends Request {

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
            "comunidad_id"    =>    "required",
            "cursillo_id"    =>    "required",
            "fecha_recibida"    =>    "required|date_format:d/m/Y|regex:/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/",
            "fecha_respondida"    =>    "required|date_format:d/m/Y|regex:/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/",
            "solicitante"    =>    "required|min:2|max:100",
            "receptor"    =>    "required|min:2|max:100",
            "aceptada"    =>    "boolean",
            "observaciones" => "required|min:20",
            "activo"    =>    "boolean"
        ];
    }
    public function messages()
    {
        return [//Asignamos un texto por cada regla sobre cada campo
            'comunidad_id.required' => 'La comunidad es obligatoria.',
            'cursillo_id.required' => ' El cursillo es obligatorio.',
            'fecha_recibida.required' => 'La fecha de recepción es obligatoria!',
            'fecha_recibida.date_format' => 'La fecha de recepción debe ser una fecha del tipo día/mes/año',
            'fecha_respondida.required' => 'La fecha de respuesta es obligatoria!',
            'fecha_respondida.date_format' => 'La fecha de respuesta debe ser una fecha del tipo día/mes/año',
            'solicitante.required' => 'El solicitante es obligatorio.',
            'solicitante.min' => 'Longitud mínima del solicitante :min caracteres.',
            'solicitante.max' => 'Longitud máxima del solicitante :max caracteres.',
            'receptor.required' => 'El receptor es obligatorio.',
            'receptor.min' => 'Longitud mínima del receptor :min caracteres.',
            'receptor.max' => 'Longitud máxima del receptor :max caracteres.',
            'aceptada.boolean' => 'El valor del campo aceptada debe ser No o Si',
            'observaciones.required' => 'El campo observaciones es obligatorio.',
            'observaciones.min' => 'Longitud mínima del campo observaciones :min caracteres.',
            'activo.required' => 'El campo activo es obligatorio!',
            'activo.boolean' => 'El valor del campo activo debe ser No o Si'
        ];
    }

}