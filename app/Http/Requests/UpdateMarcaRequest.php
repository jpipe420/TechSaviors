<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // No olvides importar Rule si lo usas

class UpdateMarcaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // O la lógica de autorización que tengas
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $marcaId = $this->route('marca')->caracteristica->id; // Obtén el ID de la característica de la marca actual

        return [
            'nombre' => [
                'required',
                'min:3',
                'max:60',
                Rule::unique('caracteristicas')->ignore($marcaId, 'id') // Asegura que el nombre sea único, ignorando la característica actual
            ],
            'descripcion' => 'nullable|string|max:255',
            // Agrega aquí otras reglas de validación si tienes más campos
        ];
    }
}