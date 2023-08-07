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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:2|unique:experiences,name',
            'status' => 'required|in:ACTIVE,INACTIVE',
            'check'=> 'required'
        ]);

        $data['added_by'] = auth()->id();

        Experience::create($data);

        session()->flash('success', 'experiência inserido com sucesso!');

        return redirect(route('experiences'));
    }

    public function edit(Request $request, $code)
    {
        $experience = Experience::where('code', $code)->first();

        return view('jobs.experience.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $data = $request->validate([
            'name' => 'required|min:2|unique:experiences,name,'.$experience->id,
            'status' => 'required|in:ACTIVE,INACTIVE',
            'check'=> 'required'
        ]);

        $data['updated_by'] = auth()->id();


        $experience->update($data);

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
