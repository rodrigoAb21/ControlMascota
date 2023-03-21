<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MascotaFormRequest extends FormRequest
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
            'fecha_nac' => 'nullable|date',
            'tipo' => 'required|in:Canino,Felino',
            'sexo' => 'required|in:Macho,Hembra',
            'raza' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'fecha_nac.date' => 'Ingrese una fecha de nacimiento valida.',
            'tipo.in' => 'El tipo de mascota debe ser Canino o Felino.',
            'sexo.in' => 'El sexo de la mascota debe ser Macho o Hembra.',
        ];
    }
}
