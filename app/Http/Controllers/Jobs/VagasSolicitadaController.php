<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Department;
use App\Models\Office;
use App\Models\VagasSolicitada;
use Illuminate\Http\Request;

class VagasSolicitadaController extends Controller
{
    public function index()
    {
        $data['vagas_solicitadas'] = VagasSolicitada::all();
        return view('jobs.vagas_solicitadas.index', $data);
    }

    public function create()
    {
        $data['departments'] = Department::orderBy('name')->get(['name','id']);
        $data['offices'] = Office::orderBy('name')->get(['name','id']);
        return view('jobs.vagas_solicitadas.create', $data);
    }
    // public function edit()
    // {
    //     //
    // }
    // public function show()
    // {
    //     //
    // }
    public function store(JobRequest $request)
    {
        dd($request->all());
    }
    // public function update()
    // {
    //     //
    // }
    // public function destroy()
    // {
    //     //
    // }
}
