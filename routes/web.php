<?php

use App\Http\Controllers\Auth\HireController;
use App\Http\Controllers\Auth\TestimonyController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\SummaryController;
use App\Models\Testimony;
use Illuminate\Support\Facades\Route;



//===================================================================
//                            CUSTOM ROUTES
//=================================================================
//=======================================
//Show in Dashboard Route
//=======================================

Route::get('/dashboard', [
    LandingpageController::class, 'showInLandingpage'
])->middleware(['auth', 'verified'])->name('dashboard');



//=======================================
//Show in Show Route
//=======================================
Route::get('/uploads/show', [
    ShowController::class, 'showInDashboard'
])->middleware(['auth', 'verified'])->name('show');



//=======================================
//Summary Routes
//=======================================

//Create page
Route::get('/uploads/summary', [
    SummaryController::class, 'create'
])->middleware(['auth', 'verified'])->name('summary');

//Store
Route::post('/uploads/summary', [
    SummaryController::class, 'store'
])->name('summaries.store');

//Edit page
Route::get('/uploads/edit-summary/{summary}', [
    SummaryController::class, 'edit'
])->middleware(['auth', 'verified'])->name('summary.edit');

//Update
Route::patch('/uploads/edit-summary/{summary}', [
    SummaryController::class, 'update'
])->name('summary.update');

//delete
Route::delete('/uploads/edit-summary/{summary}', [
    SummaryController::class, 'destroy'
])->name('summary.destroy');



//=======================================
//Education Routes
//=======================================

//Create page
Route::get('/uploads/education', [
    EducationController::class, 'create'
])->name('education');

//Store
Route::post('/uploads/education', [
    EducationController::class, 'store'
])->name('education.store');

//Edit page
Route::get('/uploads/edit-education/{education}', [
    EducationController::class, 'edit'
])->name('education.edit');

//Update
Route::patch('/uploads/edit-education/{education}', [
    EducationController::class, 'update'
])->name('education.update');

//delete
Route::delete('/uploads/show{education}', [
    EducationController::class, 'destroy'
])->name('education.destroy');




//=======================================
//Experience Routes
//=======================================

//Create Page
Route::get('/uploads/experience', [
    ExperienceController::class, 'create'
])->name('experience');

//Store
Route::post('/uploads/experience', [
    ExperienceController::class, 'store'
])->name('experiences.store');

//Edit page
Route::get('/uploads/edit-experience/{experience}', [
    ExperienceController::class, 'edit'
])->name('experience.edit');

//Update
Route::patch('/uploads/edit-experience/{experience}', [
    ExperienceController::class, 'update'
])->name('experience.update');

//delete
Route::delete('/uploads/show/{experience}', [
    ExperienceController::class, 'destroy'
])->name('experience.destroy');



//=======================================
//Portfolio Routes
//=======================================



Route::controller(PortfolioController::class)->group(function () {

    // create page
    Route::get('/uploads/portfolio', 'create')
        ->name('portfolio');

    //Stores value
    Route::post('/uploads/portfolio', 'store')
        ->name('portfolio.store');

    //Edit page
    Route::get('/uploads/edit-portfolio/{portfolio}', 'edit')
        ->name('portfolio.edit');

    //Update
    Route::patch('/uploads/edit-portfolio/{portfolio}', 'update')
        ->name('portfolio.update');

    //delete
    Route::delete('/uploads/edit-portfolio/{portfolio}', 'destroy')
        ->name('portfolio.destroy');

});



//=======================================
//Resume Routes
//=======================================

//Create page
Route::get('/uploads/resume', [
    ResumeController::class, 'create'
])->name('resume');

//Store
Route::post('/uploads/resume', [
    ResumeController::class, 'store'
])->name('resume.store');

//delete
Route::delete('/uploads/show/{resume}', [
    ResumeController::class, 'destroy'
])->name('resume.destroy');

//=========================================
//  CUSTOM ROUTES ENDS
//=========================================



//=========================================
//  HIRE ROUTES
//=========================================

//create Hire form
Route::get('hire', function () {
    return view('auth.hire');
})->middleware(['guest'])->name('hire');

//delete
Route::delete('/dashboard/{hire}', [
    HireController::class, 'destroy'
])->name('hire.destroy');



//=========================================
//  TESTIMONY ROUTES
//=========================================

//create Testimony form
Route::get('testimony', function () {
    return view('auth.testimony');
})->middleware(['guest'])->name('testimony');

//delete
Route::delete('/dashboard{testimony}', [
    TestimonyController::class, 'destroy'
])->name('testimony.destroy');


//Route to toggle betweeen Completed Task and Uncompleted Task
Route::put('/dashboard/{testimony}/toggle-approved', function (Testimony $testimony){

    $testimony->toggleApproved();
    return redirect()->back()->with('success','done');
    
})->name('testimony.approved');


//=========================================
//  PROFILE ROUTES
//=========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
