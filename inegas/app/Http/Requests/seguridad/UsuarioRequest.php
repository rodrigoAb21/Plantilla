<?php

namespace App\Http\Requests\seguridad;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
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
            'nombre' => 'required|max:255|string',
            'cargo' => 'required|max:255|string',
            'email' => 'required|string|email|max:255|unique:users',
            'area' => ['required','max:255|string', Rule::in(['Activos Fijos', 'Suministros',
                'Activos Fijos - Suministros'])],
            'password' => 'nullable|max:255|string|min:6'
        ];
    }
}
