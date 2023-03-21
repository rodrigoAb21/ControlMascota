<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaFormRequest extends FormRequest
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
            'fecha_consulta' => 'required|date',
            'motivo' => 'required|string|max:255',
            'diagnostico' => 'nullable|string|max:255',
            'fecha_control' => 'nullable|date',
            'costo' => 'nullable|numeric|min:0',
            'mascota_id' => 'required|numeric|min:1',
            'veterinaria_id' => 'required|numeric|min:1',
            'medicamentoT' => 'nullable|array|min:1',
            'medicamentoT.*' => 'nullable|string|max:255',
            'dosisT' => 'nullable|array|min:1',
            'dosisT.*' => 'nullable|string|max:255',
            'cantidad_diasT' => 'nullable|array|min:1',
            'cantidad_diasT.*' => 'nullable|numeric|min:0',
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
            'medicamentoT.min' => 'Debe ingresar al menos un medicamento.',
            'medicamentoT.*.max' => 'El medicamento no debe tener más de 255 caracteres.',
            'dosisT.min' => 'Debe ingresar una dosis por cada medicamento ingresado.',
            'dosisT.*.max' => 'La dosis no debe tener más de 255 caracteres.',
            'cantidad_diasT.min' => 'Debe ingresar una cantidad de días de la dosis del medicamento.',
            'cantidad_diasT.*.numeric' => 'La cantidad de días debe ser un número válido > 0.',
        ];
    }
}
