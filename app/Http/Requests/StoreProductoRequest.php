<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'codigo_pro' => 'required|unique:productos,codigo_pro|max:50',
        'nombre_pro' => 'required|unique:productos,nombre_pro|max:80',
        'descripcion' => 'nullable|max:255',
        'imagen_path' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        'marca_id' => 'required|integer|exists:marcas,id',
        'presentacione_id' => 'required|integer|exists:presentaciones,id',
        'categorias' => 'required'

        ];
    }

    public function attributes(){
        return[
            
            'marca_id' => 'marca',
            'presentacione_id' => 'presentacion'


        ];
    }

    public function messages(){
        return[
            'codigo_pro.required' => 'Se necesita el codigo'

        ];
    }
}
