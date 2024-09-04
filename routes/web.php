<?php

use App\Http\Controllers\Auth\HireController;
use App\Http\Controllers\Auth\TestimonyController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\landingpageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\SummaryController;
use App\Models\Education;
//use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Resume;
use App\Models\Summary;
use App\Models\Testimony;
use Illuminate\Support\Facades\Redirect;
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
//Show in Dashboard Route
//=======================================
Route::get('/uploads/show', [
    ShowController::class, 'showInDashboard'
])->middleware(['auth', 'verified'])->name('show');



//=======================================
//Summary Routes
//=======================================

//Create page
Route::get('/uploads/summary', function (Summary $summary) {
    return view('uploads.summary', [
        'summaries' => $summary ]);
})->middleware(['auth', 'verified'])->name('summary');

//Store
Route::post('/uploads/summary', [
        SummaryController::class, 'store'
    ])->name('summaries.store');

//Edit page
Route::get('/uploads/edit-summary/{summary}', function (Summary $summary) {
    return view('uploads.edit-summary', [
        'summaries' => $summary ]);
})->middleware(['auth', 'verified'])->name('summary.edit');

//Update
Route::patch('/uploads/edit-summary/{summary}', [
    SummaryController::class, 'update'
])->name('summary.update');

//delete
Route::delete('/uploads/show/{summary}', [
    SummaryController::class, 'destroy'
])->name('summary.destroy');



//=======================================
//Education Routes
//=======================================

//Create page
Route::get('/uploads/education', function (Education $education) {
    return view('uploads.education', [
        'educations' => $education ]);
})->middleware(['auth', 'verified'])->name('education');

//Store
Route::post('/uploads/education', [
        EducationController::class, 'store'
    ])->name('education.store');

//Edit page
Route::get('/uploads/edit-education/{education}', function (Education $education) {
    return view('uploads.edit-education', [
        'education' => $education ]);
})->middleware(['auth', 'verified'])->name('education.edit');

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
Route::get('/uploads/experience', function () {
    return view('uploads.experience');
})->middleware(['auth', 'verified'])->name('experience');

//Store
Route::post('/uploads/experience', [
    ExperienceController::class, 'store'
])->name('experiences.store');

//Edit page
Route::get('/uploads/edit-experience/{experience}', function (Experience $experience) {
    return view('uploads.edit-experience', [
        'experience' => $experience ]);
})->middleware(['auth', 'verified'])->name('experience.edit');

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

// Store page
Route::get('/uploads/portfolio', function () {
    return view('uploads.portfolio');
})->middleware(['auth', 'verified'])->name('portfolio');

//Edit page
Route::get('/uploads/edit-portfolio/{portfolio}', function (Portfolio $portfolio) {
    return view('uploads.edit-portfolio', [
        'portfolio' => $portfolio ]);
})->middleware(['auth', 'verified'])->name('portfolio.edit');

Route::controller(PortfolioController::class)->group(function () {

    //Stores value
    Route::post('/uploads/portfolio', 'store')
        ->name('portfolio.store');

    //Update
    Route::patch('/uploads/edit-portfolio/{portfolio}', 'update')
        ->name('portfolio.update');

    //delete
    Route::delete('/uploads/show/{portfolio}', 'destroy')
        ->name('portfolio.destroy');

});



//=======================================
//Resume Routes
//=======================================

//Create page
Route::get('/uploads/resume', function (Resume $resume) {
    return view('uploads.resume', [
        'resume' => $resume ]);
})->middleware(['auth', 'verified'])->name('resume');

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
