<?php

namespace App\Http\Requests\suministro;

use Illuminate\Foundation\Http\FormRequest;

class SuministroRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'grupo_s_id' => 'required|numeric',
            'unidad_medida_id' => 'required|numeric',
            'stock_minimo' => 'required|numeric',
            'stock_maximo' => 'required|numeric',

        ];
    }
}
