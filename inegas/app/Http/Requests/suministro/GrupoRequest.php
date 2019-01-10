<?php

namespace App\Http\Requests\suministro;

use Illuminate\Foundation\Http\FormRequest;

class GrupoRequest extends FormRequest
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
            'nombreGrupo' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'nombreGrupo.*' => 'Ingrese un nombre.'
        ];
    }
}
