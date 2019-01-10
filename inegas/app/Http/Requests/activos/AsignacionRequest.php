<?php

namespace App\Http\Requests\activos;

use Illuminate\Foundation\Http\FormRequest;

class AsignacionRequest extends FormRequest
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
            'fecha' => 'required|date',
            'observacion' => 'required|string|max:255',
            'trabajador_id' => 'required|numeric',
            'activo_fijo_idT' => 'required|array|min:1',
            'activo_fijo_idT.*' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'activo_fijo_idT.*.*' => 'Debe asignar un activo fijo valido.'
        ];
    }
}
