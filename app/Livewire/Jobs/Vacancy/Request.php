<?php

namespace App\Livewire\Jobs\Vacancy;

use Livewire\Component;

class Request extends Component
{
    public $workschedule;
    public $reasonof_request;
    public $employee_name;
    public $vacancy_type;
    public $contract_type;
    public $typeof_recruitment;
    public $workload;
    public $duty;
    public $department;
    public $office;
    public $scale;
    public $description_activities;
    public $knowleadge_and_skills;

    public function save()
    {
        $this->validate([
            'duty' => 'required',
            'scale' => 'required',
            'workload' => 'required',
            'vacancy_type' => 'required',
            'workschedule' => 'required',
            'contract_type' => 'required',
            'reasonof_request' => 'required',
            'employee_name' => '',
            'typeof_recruitment' => 'required',
            'knowleadge_and_skills' => 'required',
            'description_activities' => 'required',
            'office' => 'required|exists:offices,id',
            'department' => ['required','exists:departments,id'],
        ],[
            'required' => 'campo obrigatório',
            'exists'=> 'Dado selecionado não existe em nossa base'
        ]);

        //dd('saved');
    }

    public function render()
    {
        return view('livewire.jobs.vacancy.request');
    }
}
