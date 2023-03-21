<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperacionFormRequest extends FormRequest
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
            'descripcion' => 'required|string|max:255',
            'fecha' => 'required|date',
            'costo' => 'nullable|numeric|min:0',
            'mascota_id' => 'required|numeric|min:1',
            'veterinaria_id' => 'required|numeric|min:1',
        ];
    }
    
    public function messages()
    {
        return [
            'mascota_id.required' => 'Mascota no valida.',
            'mascota_id.numeric' => 'Mascota no valida.',
            'mascota_id.min' => 'Mascota no valida.',
            'veterinaria_id.required' => 'Veterinaria no valida.',
            'veterinaria_id.numeric' => 'Veterinaria no valida.',
            'veterinaria_id.min' => 'Veterinaria no valida.',
        ];
    }
}
