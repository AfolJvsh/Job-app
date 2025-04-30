<?php

namespace App\Http\Controllers;

use App\Events\RegisteredUser;
use App\Models\Certifications;
use App\Models\Experience;
use App\Models\School;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
  
    public function create()
    {
        return view('auth.register');
    }
    public function role()
    {
        return view('auth.register-role', ['user' =>Auth::user()]);
    }

    public function store(Request $request)
    {
       $userAttributes = $request->validate([
        'name'=> ['required'],
        'email' =>['required', 'email', 'unique:users,email'],
        'password' =>['required', 'confirmed', Password::min(6)],
       
       ]);
       $user = User::create(($userAttributes));
      event(new RegisteredUser( $user));
       Auth::login($user);
       return redirect('/')->with('success', 'Registration successful! Welcome to the platform.');

    }
    public function updateProfile(Request $request){
        $user = Auth::id();
        $id = User::where('id', $user)->first();
       

       $attributes = $request->validate([
            'role' =>['required'],
            'company_name' => ['nullable', 'string'],
            'logo' => ['nullable', 'mimes:png,jpg,webp'],
            'resume' => ['nullable', 'mimes:pdf,doc,docx'], 
            'phone_number' => ['nullable'],
            'location' =>["nullable"],  
            'about' =>["nullable"],  
            'skills' =>["nullable"],  
        ]);  
       $logoPath = $id->logo; // Keep existing logo if not updated
        if ($request->hasFile('logo')) {
            $logoPath= $attributes['logo']->store('logos');
        }
    
     $resumePath = $id->resume; // Keep existing resume if not updated
        if ($request->hasFile('resume')) {
            $resumePath= $attributes['resume']->store('resume');
        }

   $id->update([
            'role'=>$attributes['role'],
            'company_name' =>$attributes['company_name'],
            'logo'=>$logoPath,
            'resume'=>  $resumePath,
            'phone_number' => $attributes['phone_number'],
            'location' => $attributes['location'],
            'about'  => $attributes['about'],
            'skills' => $attributes['skills'],

        ]);
     return redirect('/')->with('success', 'Profile updated successfully.');
    }
    public function addProfile(){
        $user=Auth::user();
        $id = User::where('id', $user->id)->first();
        $experience= Experience::where('user_id', $id->id)->get();
        $certifications= Certifications::where('user_id', $id->id)->get();
        $school= School::where('user_id', $id->id)->get();
        $skill= Skills::where('user_id', $id->id)->get();
  //dd($skill);
        return view('user.add', [
            'user'=>$user,
            'experiences'=> $experience,
            'certifications'=> $certifications,
            'schools'=> $school,
            'skills'=> $skill,
    ]);
    }
    public function about(){
        $user= Auth::user();
        return view('user.about', ['user' => $user]);
    }
    public function editAbout(Request $request){
        $user = Auth::id();
        $id = User::where('id', $user)->first();
        $attributes = $request->validate([
            'about' => ['required']
        ]);
        $id -> update([
            'about'=>$attributes['about']
        ]);
        return redirect('/add-profile');
    }
    public function experience(){
        return view('user.experience');
    }
    public function addExperience(Request $request){
        $user= Auth::id();
        $id = User::where('id', $user)->first();
       $attributes = $request->validate([
        'Title' => ['required'],
        'employment_type'=>['required'],
        'company'=>['required'],
        'description'=>['required']
       ]);
        $id -> experience()->create([
    'Title' => $attributes['Title'],
    'employment_type'=>$attributes['employment_type'],
    'company'=>$attributes['company'],
    'description'=>$attributes['description'],

        ]);
       return redirect('/add-profile');
    }
    public function editExperience(Request $request, $id){
    $experienceId = Experience::where('id', $id )->first();
        $attributes = $request->validate([
            'Title' => ['required'],
            'employment_type'=>['required'],
            'company'=>['required'],
            'description'=>['required']
        ]);
        $experienceId -> update(
            $attributes
        );
        return redirect('/add-profile');
    }
    public function editExperiences($id){
        $experience= Experience::where('id', $id)->first();
        return view('user.edit-experience',[
            'experiences'=>$experience
            ] );
    }
    public function deleteExperience($id){
        $experience= Experience::where('id', $id)->first(); 
        $experience->delete();
        return redirect('/add-profile');

    }
    public function certifications(){
       
        return view('user.certifications');
    }
    public function addCertifications(Request $request){
        $user= Auth::id();
        $id = User::where('id', $user)->first();
       $attributes = $request->validate([
        'title' => ['required'],
        'organisation'=>['required'],
        'issuance'=>['required'],
       ]);
        $id -> certifications()->create([
            'title' => $attributes['title'],
        'organisation'=> $attributes['organisation'],
        'issuance'=> $attributes['issuance'],
        ]);
       return redirect('/add-profile');
    }
    public function editCertifications(Request $request, $id){
        $certificationId = Certifications::where('id', $id)->first();
        $attributes = $request->validate([
           'title' => ['required'],
        'organisation'=>['required'],
        'issuance'=>['required'],
        ]);
        $certificationId -> update(
            
            $attributes
        );
        return redirect('/add-profile');
    }
    public function editCertification($id){
        $certifications= Certifications::where('id', $id)->first();
        return view('user.edit-certifications',[
            'certifications'=>$certifications
        ]);
    }
    public function deleteCertification($id){
        $certification= Certifications::where('id', $id)->first(); 
        $certification->delete();
        return redirect('/add-profile');

    }
    public function school(){
        return view('user.school');
    }
    public function addSchool(Request $request){
        $user= Auth::id();
        $id = User::where('id', $user)->first();
       $attributes = $request->validate([
        'name' => ['required'],
        'degree' =>['required'],
        'course' =>['required'],
        'started' =>['required'],
        'ended'=>['required']
       ]);
        $id -> school()->create([
            'name' => $attributes['name'],
            'degree' => $attributes['degree'],
            'course' => $attributes['course'],
            'started' => $attributes['started'],
            'ended'=> $attributes['ended'],
        ]);
       return redirect('/add-profile');
    }
    public function editSchool(Request $request, $id){
        $schoolId = School::where('id', $id)->first();
        $attributes = $request->validate([
          'name' => ['required'],
        'degree' =>['required'],
        'course' =>['required'],
        'started' =>['required'],
        'ended'=>['required']
        ]);
        $schoolId -> update(
            $attributes
        );
        return redirect('/add-profile');
    }
    public function editSchools($id){
        $school= School::where('id', $id)->first();
        return view('user.edit-school', [
            'schools' => $school
        ]);
    }
    public function deleteSchool($id){
        $school= School::where('id', $id)->first(); 
        $school->delete();
        return redirect('/add-profile');

    }
    public function skill(){
        return view('user.skill');
    }
    public function addSkill(Request $request){
        $user= Auth::id();
        $id = User::where('id', $user)->first();
       $attributes = $request->validate([
        'skill'=>['required']
       ]);
        $id -> skill()->create($attributes);
       return redirect('/add-profile');
    }
    public function editSkill(Request $request, $id){
        $skillId = Skills::where('id', $id)->first();
        $attributes = $request->validate([
        'skill'=>['required']
        ]);
        $skillId -> update(
            $attributes
        );
        return redirect('/add-profile');
    }
    public function editSkills($id){
        $skill= Skills::where('id', $id)->first();
        return view('user.edit-skill', [
            'skills' => $skill
        ]);
    }
    public function deleteSkill($id){
        $skill= Skills::where('id', $id)->first(); 
        $skill->delete();
        return redirect('/add-profile');

    }

   }
