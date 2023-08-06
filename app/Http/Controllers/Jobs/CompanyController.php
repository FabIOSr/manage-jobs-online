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
      return view('jobs/index', $data);
    }

    public function getAllCompany(){

      return response(Company::latest()->get());
  }

    public function create()
    {
      return view('jobs/create');
    }

    public function store(CompanyRequest $request)
    {
      $request['added_by'] = auth()->id();
      //dd($request->all());
      $company = Company::where('document', $request->document)->first();

      if(empty($company)){
        $company = new Company();
      }

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

      // return response()->json([
      //   'redirect'=> route('companies')
      // ]);

    }

    public function view(Request $request, Company $comany)
    {
      return view('jobs/view', compact('company'));
    }

    public function update()
    {
      return view('jobs/update');
    }

    public function delete()
    {
      //delete
    }
}
