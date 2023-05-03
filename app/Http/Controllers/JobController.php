<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class JobController extends Controller
{
    //show all jobs
    public function index(){
        
        return view('jobs.jobs',[
            'heading' => 'Latest Jobs',
            'jobs'=> Job::latest()->filter(request(['tag','search']))->paginate(5)
        ]);
    }

    //Show single job
    public function show(Job $job){
        return view('jobs.job',[
            'job'=> $job
        ]);
    }

    //Show create form
    public function create(){

        return view('jobs.create');
    }

    //Save create form
    public function store(Request $request){

        $formContents = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('jobs','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
            
        ]);

        if ($request->hasFile('logo')){
            $formContents['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Job::create($formContents);

        return redirect('/')->with('message', 'New job posted successfully!');

    }

    //show edit form
    public function edit(Job $job){
        return view('jobs.edit', ['job' => $job]);
    }


    //save update
    public function update(Request $request, Job $job){
        $formContents = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
            
        ]);

        if ($request->hasFile('logo')){
            $formContents['logo'] = $request->file('logo')->store('logos', 'public');
            if(File::exists('/storage/'.$job->logo)) {
                File::delete('/storage/'.$job->logo);
            }
        }

        $job->update($formContents);

        return redirect('/')->with('message', 'Job updated successfully!');
    }

    public function destroy(Job $job){
        $job->delete();

        return redirect('/')->with('message', 'Job deleted successfully.');
    }


}
