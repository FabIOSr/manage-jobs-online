<?php

namespace App\Http\Controllers\Jobs;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function index()
    {
      $data['companies'] = Company::all();
<<<<<<< HEAD
      return view('jobs/company/index', $data);
=======
      return view('jobs.company.index', $data);
>>>>>>> dcd68e7 (create company)
    }

    public function create()
    {
<<<<<<< HEAD
      return view('jobs/company/create');
=======
      return view('jobs.company.create');
>>>>>>> dcd68e7 (create company)
    }

    public function store(CompanyRequest $request)
    {
      $request['added_by'] = auth()->id();
<<<<<<< HEAD
      
      //dd($request->all());
      
=======

>>>>>>> dcd68e7 (create company)
      $company = new Company();

      $company->document = $request->document;
      $company->social_name = $request->social_name;
      $company->alias_name = $request->alias_name;
      $company->zipcode = $request->zipcode;
      $company->street = $request->street;
      $company->number = $request->number;
      $company->complement = $request->complement;
      $company->neighborhood = $request->neighborhood;
      $company->city = $request->city;
      $company->state = $request->state;
      $company->state = $request->state;
      $company->email = $request->email;
      $company->due_date = $request->due_date;
      $company->owner = Auth::user()->id;
      $company->added_by = Auth::user()->id;
      $company->save();

      session()->flash('success', 'Empresa registrada com sucesso!');

      return redirect()->route('companies');

    }

    public function edit(Request $request, $code)
    {
        $department = Company::where('code', $code)->first();

        return view('jobs.department.edit', compact('department'));
    }

    public function update(Request $request, Company $department)
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
        Company::where('code',$code)->first()->delete();

        session()->flash('success', 'departamento exlcuido com successo!');

        return redirect()->route('departments');
    }
}
