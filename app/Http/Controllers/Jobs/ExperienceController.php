<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceResquest;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::paginate(5);

        return view('jobs.experience.index', compact('experiences'));
    }

    public function create()
    {
        return view('jobs.experience.create');
    }

    public function store(ExperienceResquest $request)
    {
        $request['added_by'] = auth()->id();

        Experience::create($request->only(['name','status','added_by']));

        session()->flash('success', 'experiência inserido com sucesso!');

        return redirect(route('experiences'));
    }

    public function edit(Request $request, $code)
    {
        $experience = Experience::where('code', $code)->first();

        return view('jobs.experience.edit', compact('experience'));
    }

    public function update(ExperienceResquest $request, Experience $experience)
    {

        $request['updated_by'] = auth()->id();


        $experience->update($request->only(['name','status','updated_by']));

        session()->flash('success', 'experiência atualizado com sucesso!');

        return redirect()->route('experiences');
    }

    public function delete($code)
    {
        Experience::where('code',$code)->first()->delete();

        session()->flash('success', 'experiência exlcuido com successo!');

        return redirect()->route('experiences');
    }
}
