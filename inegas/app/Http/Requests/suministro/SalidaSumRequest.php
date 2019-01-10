<?php

namespace App\Http\Requests\suministro;

use Illuminate\Foundation\Http\FormRequest;

class SalidaSumRequest extends FormRequest
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
            'trabajador_id' => 'required|numeric',
            'observacion' => 'required|string|max:255',
            'sumiT' => 'required|array|min:1',
            'sumiT.*' => 'required|min:1|numeric',
            'cantT' => 'required|array|min:1',
            'cantT.*' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'sumiT.min:1' => 'Debe incluir al menos un suministro',
            'sumiT.*.*' => 'Ingrese algun suministro valido',
            'cantT.min:1' => 'Debe incluir al menos un suministro',
            'cantT.*.*' => 'Ingrese una cantidad valida',
        ];
    }
}
