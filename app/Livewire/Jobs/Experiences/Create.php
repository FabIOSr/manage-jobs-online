<?php

namespace App\Livewire\Jobs\Experiences;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.jobs.experiences.create');
    }
}
