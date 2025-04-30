<?php

namespace App\Http\Controllers;

use App\Models\Certifications;
use App\Models\Experience;
use App\Models\School;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
       }
    public function store(){
        $attributes = request()->validate([
            'email' => ['required', 'email'],
        'password' => ['required']
        ]);

       if(! Auth::attempt($attributes)){
        
        throw ValidationException::withMessages([
            'email' => 'sorry, those credentials do not match'
        ]);
       };
       
        request()->session()->regenerate();

        return redirect('/')->with('success', 'You have successfully logged in.');
       }
    public function destroy(){
        if (Auth::check()) {
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }

        return redirect('/')->with('success', 'You have logged out.');
       }
    public function view(){
        $user=Auth::user();
        $id = User::where('id', $user->id)->first();
        $experience= Experience::where('user_id', $id->id)->get();
        $certifications= Certifications::where('user_id', $id->id)->get();
        $school= School::where('user_id', $id->id)->get();
        $skill= Skills::where('user_id', $id->id)->get();
      
        return view('user.view', [
            'user'=>$user,
            'experiences'=> $experience,
            'certifications'=> $certifications,
            'schools'=> $school,
            'skills'=> $skill,]);
    }
}
