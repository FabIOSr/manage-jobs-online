<?php

namespace App\Http\Requests;

use App\Models\Department;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
        $depIDS = Department::all('id')->toArray();
        return [
            'reason_request' => 'required',
            'office' => 'required|exists:offices,id',
            'department' => [
                'required',
                'exists:departments,id'
            ],
            'employee_name' => '',
            'workschedule' => 'required',
            'duty' => 'required',
            'workload' => 'required',
            'scale' => 'required',
            'description_activities' => 'required',
            'knowleadge_and_skills' => 'required',
            'typeof_recruitment' => 'required'
        ];
    }

    public function messages():array
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
        ];
    }

    public function attributes() : array
    {
        return [
            'reason_request' => 'Motivo da solicitação',
            'office' => 'Cargo',
            'department' => 'Departamento',
            'employee_name' => 'Nome Funcionário',
            'workschedule' => 'Horário de trabalho',
            'duty' => 'Plantão',
            'workload' => 'Carga Horária',
            'scale' => 'Escala',
            'description_activities' => 'Descrição das atividades',
            'knowleadge_and_skills' => 'Conhecimentos e habilidades',
            'typeof_recruitment' => 'Tipo de recrutamento'
        ];
    }
}
