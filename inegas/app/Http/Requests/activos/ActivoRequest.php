<?php

namespace App\Http\Requests\activos;

use Illuminate\Foundation\Http\FormRequest;

class ActivoRequest extends FormRequest
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
            'foto' => 'nullable|image|mimes:jpg,jpeg,bmp,png',
            'serie' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'caracteristicas' => 'required|string|max:255',
        ];
    }
}
