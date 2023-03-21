<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeterinariaFormRequest extends FormRequest
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
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|digits_between:7,8',
            'celular' => 'nullable|digits_between:7,8',
            'atencion' => 'required|in:24hrs,Normal',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
        ];
    }

}
