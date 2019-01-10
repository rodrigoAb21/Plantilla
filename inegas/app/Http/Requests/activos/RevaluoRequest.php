<?php

namespace App\Http\Requests\activos;

use Illuminate\Foundation\Http\FormRequest;

class RevaluoRequest extends FormRequest
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
            'monto' => 'required|numeric',
            'motivo' => 'required|string|max:255',
            'activo_fijo_id' => 'required|numeric'
        ];
    }
}
