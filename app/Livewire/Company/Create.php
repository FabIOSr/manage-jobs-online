<?php

namespace App\Livewire\Company;

use App\Services\ViacepService;
use Livewire\Component;
use PhpParser\Node\Expr\Cast\Object_;

class Create extends Component
{
    public $document;
    public $social_name;
    public $alias_name;
    public $zipcode;
    public $street;
    public $complement;
    public $neighborhood;
    public $number;
    public $city;
    public $state;
    public $email;
    public $due_date;
    public $check;


    public function store()
    {
        $validated = $this->validate([
            'document' => 'required|min:14|unique:companies,document',
        ]);

        dd('here', $this->document);
    }

    public function getZipcode()
    {
        $zipcode = str_replace(['.','-'],'', $this->zipcode);
        if(strlen($zipcode)==8){
            $service = new ViacepService($zipcode);
            $data = $service->getLocation();
            //dd($data);
            if(is_null($data) || isset($data['erro'])){
                dd('CEP não encontrado');
            }else{
                //dd($data);
                $data = (Object) $data;
                $this->street = $data->logradouro;
                $this->complement = $data->complemento;
                $this->neighborhood = $data->bairro;
                $this->city = $data->localidade;
                $this->state = $data->uf;
            }

        }
        return;
    }

    
    public function render()
    {
        return view('livewire.company.create');
    }
}
