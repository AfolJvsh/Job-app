<?php

namespace App\Http\Controllers;


use App\Events\ChangeStatus;
use App\Events\SubmittedApplication;
use App\Models\Applications;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApplicationsController extends Controller
{
    public function index(){
        {
            $applications = Applications::where('user_id', Auth::id())->get();
        
            $jobsPerApplication = [];
            $statusesPerApplication = [];
            $coverLettersPerApplication = [];
        
            foreach ($applications as $application) {
                // Since job_id, status, and cover_letter are now stored as single values, no need to decode JSON
                $job = Job::find($application->job_id);
        
                if ($job) {
                    $jobsPerApplication[$application->id] = collect([$job]); // Wrap in a collection for consistency
                } else {
                    $jobsPerApplication[$application->id] = collect(); // Empty collection if no job found
                }
        
                // Directly store status and cover letter as strings
                $statusesPerApplication[$application->id] = $application->status ?? 'pending';
                $coverLettersPerApplication[$application->id] = $application->cover_letter ?? '';
            }
        
            return view('applications.index', [
                'applications' => $applications,
                'jobsPerApplication' => $jobsPerApplication,
                'statusesPerApplication' => $statusesPerApplication,
                'coverLettersPerApplication' => $coverLettersPerApplication,
            ]);
        }
        
    }
    public function create(Job $job){
         return view('applications.create',['job'=> $job]);
    }
    public function store(Request $request, Job $job){
        {
            $attributes = $request->validate([
                'cover_letter' => ['required', 'string'],
            ]);
        
            // Create a new application record
          $application= Applications::create([
                'user_id' => Auth::id(),
                'job_id' => $job->id,
                'status' => 'pending', // Default status
                'cover_letter' => $attributes['cover_letter'],
            ]);
            event(new SubmittedApplication($application->job_id, $application));
        // Redirect to the applications page with a success message
        return redirect('/applications')->with('success', 'Application submitted successfully.');
    }
}

public function show()
{
    // Get job IDs for the authenticated employer
    $employerJobIds = Job::where('user_id', Auth::id())->pluck('id')->toArray();

    if (empty($employerJobIds)) {
        return redirect()->back()->with('error', 'No jobs found for this employer. Please post a job first.');
    }
    
    

    // Fetch applications where the job_id matches any of the employer's jobs
    $filteredApplications = Applications::whereIn('job_id', $employerJobIds)->get();

    // Fetch job details for filtered applications
    $jobs = Job::whereIn('id', $employerJobIds)->get();


       // Pass to view
        return view('applications.show', [
            'applications' => $filteredApplications,
            'jobs' => $jobs
        
        ]);
        
    }
    public function details($user){
        $application = Applications::where('id', $user)->first();
        $user_id = $application->user_id;
   $userdetails = User::where('id', $user_id)->first();
   $job_id =$application->job_id;
   $jobdetails = Job::where('id',   $job_id )->first();
       
         return view('applications.approval', 
         [
            'user' => $userdetails,
            'job' =>$jobdetails,
            'application' =>$application
        ]);
    }

    public function changeStatus(Applications $user){
      
        request()->validate([
            'status'=>['required'],
        ]);

     $user->update ([
            'status'=> request('status'),
        ]);
        event(new ChangeStatus($user));

        return redirect ('/applicants/'. $user->id)->with('success', 'Application status updated successfully!');
    }
}
