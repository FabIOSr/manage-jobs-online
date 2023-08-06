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
        $experiences = Experience::all();
        if(request()->ajax()){
            return $experiences;
        }
        return view('experience.index');
    }
    public function store(ExperienceResquest $request)
    {
        $request['added_by'] = auth()->id();

        Experience::create($request->only('experience','status','added_by'));

        return response()->json([
            'message' => 'Experiência foi inserida com sucesso',
            'flag' => 'inserted'
        ]);
    }
}
