<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class TypeVacancy extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::paginate(5);
        return view('jobs.vacancy.index', compact('vacancies'));
    }

    public function create()
    {
        return view('jobs.vacancy.create');
    }

    public function store(Request $request)
    {
        $data =  $request->validate([
            'vacancy' => 'required|unique:vacancies,vacancy',
            'status' => 'required|in:ACTIVE,INACTIVE',
            'check' => 'required',
        ]);

        $data['added_by'] = auth()->id();

        Vacancy::create($data);

        session()->flash('success','Tipo de vaga registrada com sucesso.');

        return redirect()->route('vacancies');

    }
    public function edit(Request $request, Vacancy $vacancy)
    {
        return view('jobs.vacancy.edit', compact('vacancy'));
    }

    public function update(Request $request, Vacancy $vacancy)
    {
        $data =  $request->validate([
            'vacancy' => 'required|unique:vacancies,vacancy,'.$vacancy->id,
            'status' => 'required|in:ACTIVE,INACTIVE',
            'check' => 'required',
        ]);

        $data['updated_by'] = auth()->id();

        session()->flash('success','Tipo de vaga atualizada com sucesso.');

        $vacancy->update($data);

        return redirect()->route('vacancies');
    }

    public function delete(Vacancy $vacancy)
    {
        $vacancy->delete();

        session()->flash('success', 'Tipo de vaga foi excluida com sucesso');

        return redirect()->route('vacancies');
    }
}
