<?php

namespace App\Http\Requests\activos;

use Illuminate\Foundation\Http\FormRequest;

class IngresoRequest extends FormRequest
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
            'fecha_ingreso' => 'required|date',
            'fecha_factura' => 'required|date',
            'proveedor' => 'required|string|max:255',
            'nro_factura' => 'required|numeric',
            'foto_factura' => 'required|image|mimes:jpg,jpeg,bmp,png',

            'grupo_a_idT' => 'required|array|min:1',
            'grupo_a_idT.*' => 'required|numeric',

            'costoT' => 'required|array|min:1',
            'costoT.*' => 'required|min:1',

            'marcaT' => 'required|array|min:1',
            'marcaT.*' => 'required|min:1',

            'serieT' => 'required|array|min:1',
            'serieT.*' => 'required|min:1',

            'modeloT' => 'required|array|min:1',
            'modeloT.*' => 'required|min:1',

            'colorT' => 'required|array|min:1',
            'colorT.*' => 'required|min:1',

            'fotoT' =>  'required|array|min:1',
            'fotoT.*' => 'required|image|mimes:jpg,jpeg,bmp,png',


        ];
    }

}
