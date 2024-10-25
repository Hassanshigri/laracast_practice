<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index(){
        // dd('hello'); 
        $jobs = Job::with('employer')->latest()-> simplePaginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create(){
        return view('jobs.create');
    }

    public function show(Job $job){
        return view('jobs.show', ['job' => $job]);
    }

    public function store(){
        request()->validate([
            'title' => ['required','min:3'] ,
            'salary' => ['required'],
        ]);
        // dd(request()->all());
        Job::create([
            'title' => request('title') ,
            'salary'=> request('salary'),
            'employer_id' => 1,
    
        ]);
        return redirect('/jobs');
    }

    public function edit(Job $job){
      
       
        Gate::authorize('edit-job',$job);

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job){
          // validate
    request()->validate([
        'title' => ['required','min:3'] ,
        'salary' => ['required'],
    ]);
    // authorize (on hold .....)

    // update the job
    // $job = Job::findOrfail($id);

    $job->update([
        'title'=>request('title'),
        'salary'=>request('salary')
    ]);
    

    return redirect('/jobs/'.$job->id);
    }

    public function destroy(Job $job){
        $job->delete();
        return redirect('/jobs');
    }
}
