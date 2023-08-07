<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::paginate(5);

        return view('jobs.office.index', compact('offices'));
    }

    public function create()
    {
        return view('jobs.office.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:2|unique:offices,name',
            'status' => 'required|in:ACTIVE,INACTIVE',
            'check'=> 'required'
        ]);

        $data['added_by'] = auth()->id();

        Office::create($data);

        session()->flash('success', 'cargo inserido com sucesso!');

        return redirect(route('offices'));
    }

    public function edit(Request $request, $code)
    {
        $office = Office::where('code', $code)->first();

        return view('jobs.office.edit', compact('office'));
    }

    public function update(Request $request, Office $office)
    {
        $data = $request->validate([
            'name' => 'required|min:2|unique:offices,name,'.$office->id,
            'status' => 'required|in:ACTIVE,INACTIVE',
            'check'=> 'required'
        ]);

        $data['updated_by'] = auth()->id();


        $office->update($data);

        session()->flash('success', 'cargo atualizado com sucesso!');

        return redirect()->route('offices');
    }

    public function delete($code)
    {
        Office::where('code',$code)->first()->delete();

        session()->flash('success', 'cargo exlcuido com successo!');

        return redirect()->route('offices');
    }
}
