<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::paginate(5);

        return view('jobs.department.index', compact('departments'));
    }

    public function create()
    {
        return view('jobs.department.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:2|unique:departments,name',
            'status' => 'required|in:ACTIVE,INACTIVE',
            'check'=> 'required'
        ]);

        $data['added_by'] = auth()->id();

        Department::create($data);

        session()->flash('success', 'departamento inserido com sucesso!');

        return redirect(route('departments'));
    }

    public function edit(Request $request, $code)
    {
        $department = Department::where('code', $code)->first();

        return view('jobs.department.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $data = $request->validate([
            'name' => 'required|min:2|unique:departments,name,'.$department->id,
            'status' => 'required|in:ACTIVE,INACTIVE',
            'check'=> 'required'
        ]);

        $data['updated_by'] = auth()->id();


        $department->update($data);

        session()->flash('success', 'departamento atualizado com sucesso!');

        return redirect()->route('departments');
    }

    public function delete($code)
    {
        Department::where('code',$code)->first()->delete();

        session()->flash('success', 'departamento exlcuido com successo!');

        return redirect()->route('departments');
    }
}
