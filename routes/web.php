<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // $jobs = Job::all();
    // dd($jobs);
    return view('home');
});

Route::get('/jobs', function () {
    // $jobs = Job::all();
    // $jobs = Job::with('employer')->get(); // eager loading to prevent n+1 problem
    $jobs = Job::with('employer')->latest()-> simplePaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});


//Create
Route::get('/jobs/create', function (){
    return view('jobs.create');
    
});

// Show
Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

// Store
Route::post('/jobs',function(){
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
});

// edit
Route::get('/jobs/{id}/edit', function ($id) {

    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}',function($id){
    // validate
    request()->validate([
        'title' => ['required','min:3'] ,
        'salary' => ['required'],
    ]);
    // authorize (on hold .....)

    // update the job
    $job = Job::findOrfail($id);

    $job->update([
        'title'=>request('title'),
        'salary'=>request('salary')
    ]);
    
    // redirect
    return redirect('/jobs/'.$job->id);
});

// Delete
Route::delete('/jobs/{id}',function($id){
    $job= Job::findOrfail($id);
    $job->delete();
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
