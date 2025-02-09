<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Tag;
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
        $jobs= Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');
        return view ('jobs.index',
  [
      'jobs'=> $jobs[0],
        'featuredJobs'=> $jobs[1],
        'tags' => Tag::all()
        ]
    );
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
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['part Time', 'Full Time'])],
            // 'url' => ['required', 'active_url'],
            'tags' => ['nullable'],
        ]);
        $attributes['featured'] = $request->has('featured');
        $job = Auth::user()->employer->jobs()->create(array_merge(
            Arr::except($attributes, 'tags'),
        [
            'job_overview'=>'to be updated',
            'responsibilities' => 'to be updated',
            'qualifications' =>'to be updated',
            'how_to_apply' => 'to be updated']
    ));

        
        if($attributes['tags'] ?? false){
            foreach(explode(',', $attributes['tags']) as $tag){
                $job->tag($tag);
            }
        }
        return redirect('/description/create/'. $job->id);
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
            'how_to_apply' =>['required']
        ]);

        $job->update ([
            'job_overview'=> request('job_overview'),
            'responsibilities' => request('responsibilities'),
            'qualifications' => request('qualifications'),
            'how_to_apply' =>request('how_to_apply')
        ]);
        return redirect ('/description/index/'. $job->id);
    }
}
