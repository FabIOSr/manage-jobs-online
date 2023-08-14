<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Models\VagasSolicitada;
use Illuminate\Http\Request;

class VagasSolicitadaController extends Controller
{
    public function index()
    {
        $data['vagas_solicitadas'] = VagasSolicitada::all();
        return view('jobs.vagas_solicitadas.index', $data);
    }

    // public function create()
    // {
    //     //
    // }
    // public function edit()
    // {
    //     //
    // }
    // public function show()
    // {
    //     //
    // }
    // public function store()
    // {
    //     //
    // }
    // public function update()
    // {
    //     //
    // }
    // public function destroy()
    // {
    //     //
    // }
}
