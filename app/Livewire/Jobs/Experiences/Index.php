<?php

namespace App\Livewire\Jobs\Experiences;

use App\Models\Experience;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $experience;
    public $status;
    public $search;
    public $selected_id;
    public $per_page=5;
    public $check_terms=false;
    public $experienciaDeleteText;

    public function save()
    {
        $data = $this->validate([
            'experience'=>'required|min:2|unique:experiences,experience,'.$this->selected_id,
            'status'=> 'required|in:ACTIVE,INACTIVE',
            'check_terms' => 'required|boolean'
        ]);

        if($this->selected_id){
            
            $data['updated_by'] = auth()->id();

            Experience::findOrfail($this->selected_id)->update($data);

            session()->flash('success','Experiencia atualizada com sucesso');

        }else{

            $data['added_by'] = auth()->id();

            Experience::create($data);

            session()->flash('success','Experiencia inserida com sucesso');

        }      

        

        $this->resetValidation();
        $this->reset();
        $this->dispatch('closeModal');
    }

    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        $this->selected_id = $experience->id;
        $this->experience = $experience->experience;
        $this->status = $experience->status;
    }

    public function update()
    {
        $experience = Experience::findOrFail($this->selected_id);

        $data = $this->validate([
            'experience'=> [
                'required',
                'min:2',
                'unique:experiences,experience,'.$this->selected_id
            ],
            'status'=> 'required|in:ACTIVE,INACTIVE',
            'check_terms' => 'required|boolean'
        ]);

        $data['updated_by'] = auth()->id();


        $experience->update($data);

        session()->flash('success','Experiência atualizada');

        $this->reset();
        $this->resetValidation();
        $this->dispatch('closeModal');
    }

    public function delete()
    {
        Experience::findOrfail($this->selected_id)->delete();

        $this->reset();
        $this->resetPage();

        $this->dispatch('closeModal');
    }

    public function close()
    {
        $this->resetValidation();
        $this->reset();
    }

    // public function paginationView()
    // {
    //     return 'vendor.livewire.bootstrap';
    // }

    #[Layout('layouts.app')]
    public function render()
    {
        $experiences = Experience::paginate($this->per_page);
        return view('livewire.jobs.experiences.index', compact('experiences'));
    }
}
