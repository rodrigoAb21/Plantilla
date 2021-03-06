<?php

namespace App\Http\Requests\suministro;

use Illuminate\Foundation\Http\FormRequest;

class IngresoSumRequest extends FormRequest
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
            'nro_factura' => 'required|max:255|string',
            'foto_factura' => 'required|image|mimes:jpg,jpeg,bmp,png',
            'sumiT' => 'required|array|min:1',
            'sumiT.*' => 'required|min:1|numeric',
            'cantT' => 'required|array|min:1',
            'cantT.*' => 'required|numeric',
            'precioT' => 'required|array|min:1',
            'precioT.*' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'sumiT.min:1' => 'Debe incluir al menos un suministro',
            'cantT.min:1' => 'Debe incluir al menos un suministro',
            'precioT.min:1' => 'Debe incluir al menos un suministro',
            'precioT.*.*' => 'Ingrese un precio valido',
            'cantT.*.*' => 'Ingrese una cantidad valida',
            'sumiT.*.*' => 'Ingrese algun suministro valido',
        ];
    }
}
