<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacunacionFormRequest extends FormRequest
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
            'tipo_vacuna' => 'required|string|max:255',
            'fecha_vacunacion' => 'required|date',
            'proxima_vacunacion' => 'nullable|date',
            'nombre' => 'nullable|string|max:255',
            'costo' => 'nullable|numeric|min:0',
            'veterinaria_id' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'veterinaria_id.required' => 'Veterinaria no valida.',
            'veterinaria_id.numeric' => 'Veterinaria no valida.',
            'veterinaria_id.min' => 'Veterinaria no valida.',
        ];
    }
}
