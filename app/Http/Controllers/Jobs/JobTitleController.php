<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    public function listJobTitle()
    {
        $data['jobTitles'] = JobTitle::paginate(5);
        return view('jobs.jobTitle.index', $data);
    }

    public function createView()
    {
        return view('jobs.jobTitle.create');
    }

    public function saveJob(Request $request)
    {
        $data = $request->validate([
            'jobTitle' => 'required|min:2|unique:job_titles,jobTitle',
            'status' => 'required|in:ACTIVE,INACTIVE',
            'check'=> 'required'
        ]);

        $data['createdBy'] = auth()->id();

        JobTitle::create($data);

        session()->flash('success', 'registro foi salvo!');

        return redirect(route('job.titles'));
    }

    public function editJob(Request $request, $code)
    {
        $jobTitle = jobTitle::where('code', $code)->first();

        return view('jobs.jobTitle.edit', compact('jobTitle'));
    }

    public function update(Request $request, JobTitle $jobTitle)
    {
        $data = $request->validate([
            'jobTitle' => 'required|min:2|unique:job_titles,jobTitle',
            'status' => 'required|in:ACTIVE,INACTIVE',
            'check'=> 'required'
        ]);

        $data['createdBy'] = auth()->id();

        JobTitle::create($data);

        session()->flash('success', 'registro foi salvo!');

        return redirect(route('job.titles'));
    }
}
