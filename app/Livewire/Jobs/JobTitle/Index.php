<?php

namespace App\Livewire\Jobs\JobTitle;

use App\Models\JobTitle;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $jobTitle;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.jobs.job-title.index', [
            'jobTitles' => JobTitle::paginate(5)
        ]);
    }
}
