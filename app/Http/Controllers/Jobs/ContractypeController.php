<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Models\ContractType;
use Illuminate\Http\Request;

class ContractypeController extends Controller
{
    public function index()
    {
        $contractTypes = ContractType::paginate(5);

        return view('jobs.contract-type.index', compact('contractTypes'));
    }

    public function create()
    {
        return view('jobs.contract-type.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:2|unique:contract_types,name',
            'status' => 'required|in:ACTIVE,INACTIVE',
            'check'=> 'required'
        ]);

        $data['added_by'] = auth()->id();

        ContractType::create($data);

        session()->flash('success', 'tipo de contrato inserido com sucesso!');

        return redirect(route('contract-types'));
    }

    public function edit(Request $request, $code)
    {
        $contractType = ContractType::where('code', $code)->first();

        return view('jobs.contract-type.edit', compact('contractType'));
    }

    public function update(Request $request, ContractType $contractType)
    {
        $data = $request->validate([
            'name' => 'required|min:2|unique:contract_types,name,'.$contractType->id,
            'status' => 'required|in:ACTIVE,INACTIVE',
            'check'=> 'required'
        ]);

        $data['updated_by'] = auth()->id();


        $contractType->update($data);

        session()->flash('success', 'departamento atualizado com sucesso!');

        return redirect()->route('contract-types');
    }

    public function delete($code)
    {
        ContractType::where('code',$code)->first()->delete();

        session()->flash('success', 'departamento exlcuido com successo!');

        return redirect()->route('contract-types');
    }
}
