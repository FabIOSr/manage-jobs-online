<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceResquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|min:2|unique:experiences,name,' .request()->input('id'),
            'status' => 'required|in:ACTIVE,INACTIVE',
            'check'=> 'required'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'experiência',
            'check' => 'termo de confirmação'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Campo :attribute é obrigatório',
            'in' => 'Valor de :attribute é inválido',
            'unique' => 'Este registro de :attribute já existe'
        ];
    }
}
