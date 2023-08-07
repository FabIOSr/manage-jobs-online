<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
<<<<<<< HEAD
            'document' => 'required|min:14,'.request()->input('id'),
=======
            'document' => 'required|min:14|unique:companies,document,'.request()->input('code'),
>>>>>>> dcd68e7 (create company)
            'social_name' => 'required',
            'alias_name' => 'required',
            'zipcode' => 'required|min:8',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'number' => 'required',
            'complement' => 'sometimes',
            'neighborhood' => 'required',
            'email' => 'required|email',
            'due_date' => 'required',
            'check' => 'required'
        ];
    }
}
