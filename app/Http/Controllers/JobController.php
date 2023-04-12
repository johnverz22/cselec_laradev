<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    
    public function index(){
        
        return view('jobs.jobs',[
            'heading' => 'Latest Jobs',
            'jobs'=> Job::latest()->filter(request(['tag','search']))->paginate(5)
        ]);
    }

    
    public function show(Job $job){
        return view('jobs.job',[
            'job'=> $job
        ]);
    }

    public function create(){

        return view('jobs.create');
    }

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

}
