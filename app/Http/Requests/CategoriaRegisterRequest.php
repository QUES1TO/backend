<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRegisterRequest extends BaseFormRequest
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
            'nombre' => 'required',     
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4048',       
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre de categoria es obligatorio.'            
        ];
    }
}