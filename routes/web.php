<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Http\Middleware\EmployerMiddleware;
use Barryvdh\Debugbar\DataCollector\SessionCollector;
use Illuminate\Support\Facades\Route;

    Route::get('/', [JobController::class, 'index']);

    Route::middleware(['auth', EmployerMiddleware::class])->group(function () {
        Route::get('/jobs/create', [JobController::class, 'create']);
        Route::post('/jobs', [JobController::class, 'store']);
        Route::get('/applicants', [ApplicationsController::class, 'show']);
        Route::get('/applicants/{user}', [ApplicationsController::class, 'details']);
        Route::patch('/status/{user}', [ApplicationsController::class, 'changeStatus']);
    });

    Route::get('/description/create/{job}', [JobController::class, 'describe']);
    Route::patch('/description/create/{job}', [JobController::class, 'storeDescription']);
    Route::get('/description/{job}', [JobController::class, 'show']);

    Route::get('/apply/{job}', [ApplicationsController::class, 'create']);
    Route::post('/apply/{job}', [ApplicationsController::class, 'store']);
    Route::get('/applications', [ApplicationsController::class, 'index']);
   ;

    Route::delete( '/logout',[SessionController::class, 'destroy'])->middleware('auth');

    Route::patch('/update', [RegisteredUserController::class, 'updateProfile']);
    Route::get( '/update',[RegisteredUserController::class, 'role'])->middleware('auth');
    Route::get('/profile', [SessionController::class, 'view'])->middleware('auth');


    Route::get('/add-profile', [RegisteredUserController::class, 'addProfile'])->middleware('auth');
    Route::get('/about', [RegisteredUserController::class, 'about'])->middleware('auth');
    Route::patch('/about', [RegisteredUserController::class, 'editAbout'])->middleware('auth');
    Route::get('/experience', [RegisteredUserController::class, 'experience'])->middleware('auth');
    Route::post('/experience', [RegisteredUserController::class, 'addExperience'])->middleware('auth');
    Route::get('/experience/edit/{id}', [RegisteredUserController::class, 'editExperiences'])->middleware('auth');
    Route::patch('/experience/edit/{id}', [RegisteredUserController::class, 'editExperience'])->middleware('auth');
    Route::get('/skill', [RegisteredUserController::class, 'skill'])->middleware('auth');
    Route::post('/skill', [RegisteredUserController::class, 'addSkill'])->middleware('auth');
    Route::get('/skill/edit/{id}', [RegisteredUserController::class, 'editSkills'])->middleware('auth');
    Route::patch('/skill/edit/{id}', [RegisteredUserController::class, 'editSkill'])->middleware('auth');
    Route::get('/certifications', [RegisteredUserController::class, 'certifications'])->middleware('auth');
    Route::post('/certifications', [RegisteredUserController::class, 'addCertifications'])->middleware('auth');
    Route::get('/certifications/edit/{id}', [RegisteredUserController::class, 'editCertification'])->middleware('auth');
    Route::patch('/certifications/edit/{id}', [RegisteredUserController::class, 'editCertifications'])->middleware('auth');
    Route::get('/school', [RegisteredUserController::class, 'school'])->middleware('auth');
    Route::post('/school', [RegisteredUserController::class, 'addSchool'])->middleware('auth');
    Route::get('/school/edit/{id}', [RegisteredUserController::class, 'editSchools'])->middleware('auth');
    Route::patch('/school/edit/{id}', [RegisteredUserController::class, 'editSchool'])->middleware('auth');
    
    Route::delete( '/delete-experience/{id}',[RegisteredUserController::class, 'deleteExperience']);
    Route::delete( '/delete-certification/{id}',[RegisteredUserController::class, 'deleteCertification']);
    Route::delete( '/delete-education/{id}',[RegisteredUserController::class, 'deleteSchool']);
    Route::delete( '/delete-skill/{id}',[RegisteredUserController::class, 'deleteSkill']);
    
    Route::middleware('guest')->group(function()
    
{
    Route::get( '/register',[RegisteredUserController::class, 'create']);
    Route::post( '/register',[RegisteredUserController::class, 'store']);

    Route::get( '/login',[SessionController::class, 'create'])
    ->name('login')
    ;
    Route::post( '/login',[SessionController::class, 'store']);
});
Route::get('/tags/{tag:name}', TagController::class);
Route::get('/search', SearchController::class);
// Route::get('/companies', [EmployerController::class, 'show']);