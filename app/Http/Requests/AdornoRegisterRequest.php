<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdornoRegisterRequest extends BaseFormRequest
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
            'stock' => 'required',   
            'precio' => 'required',
            'categoria_id' => 'required',       
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre de adorno es obligatorio.'            
        ];
    }
}
