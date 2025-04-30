<?php

namespace App\Http\Controllers;


use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $jobs= Job::latest()->with([ 'tags'])->get()->groupBy('featured');
        if($user === null){

            return view ('auth.login');
        }
        
        if($user-> role === null){
            return view('jobs.index2', ['user'=>$user]);
        }


        else{
            return view ('jobs.index',
      [
          'jobs'=> $jobs[0],
            'featuredJobs'=> $jobs[1],
            'tags' => Tag::all(),
            'user'=>$user
            ] );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Job $job)
    {
        $user= Auth::id();
        $id = User::where('id', $user)->first();
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['part Time', 'Full Time'])],
            'tags' => ['nullable'],
        ]);
        $attributes['featured'] = $request->has('featured');
        $job = $id->jobs()->create(array_merge(
            Arr::except($attributes, 'tags'),
        [
            'job_overview'=>'to be updated',
            'responsibilities' => 'to be updated',
            'qualifications' =>'to be updated',
            'compensations' =>'to be updated',
            'how_to_apply' => 'to be updated']
    ));

        
        if($attributes['tags'] ?? false){
            foreach(explode(',', $attributes['tags']) as $tag){
                $job->tag($tag);
            }
        }
        return redirect('/description/create/'. $job->id)->with('success', 'Job description created successfully!');
    }
    public function show(Job $job){
        return view('description.index', ['job'=>$job]);
    }

    public function describe(Job $job){
        return view('description.create', ['job'=>$job]);
    }
    public function storeDescription(Job $job){
        request()->validate([
            'job_overview'=>['required'],
            'responsibilities' => ['required'],
            'qualifications' => ['required'],
            'compensations' => ['required'],
            'how_to_apply' =>['required']
        ]);

        $job->update ([
            'job_overview'=> request('job_overview'),
            'responsibilities' => request('responsibilities'),
            'qualifications' => request('qualifications'),
            'compensations' => request('compensations'),
            'how_to_apply' =>request('how_to_apply')
        ]);
        return redirect ('/description/'. $job->id)->with('success', 'Job description updated successfully!');
    }
}
