<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\SummaryController;
use App\Models\Education;
//use Illuminate\Http\Request;
use App\Models\Summary;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('home');
});



//==========================================
//  CUSTOM ROUTES
//==========================================


Route::get('/', function () {
    return view('home');
})->name('homepage');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




//=======================================
//Show Routes
//=======================================
Route::get('/uploads/show', [
    ShowController::class, 'showInDashboard'
])->middleware(['auth', 'verified'])->name('show');



//=======================================
//Summary Routes
//=======================================

Route::get('/uploads/summary', function (Summary $summary) {
    return view('uploads.summary', [
        'summaries' => $summary ]);
})->middleware(['auth', 'verified'])->name('summary');

// Route::get("/uploads/summary", function () {
//     return "It came here";
// })->name("summary.store");

Route::post('/uploads/summary', [
        SummaryController::class, 'store'
    ])->name('summaries.store');

Route::put('/uploads/edit-summary', [
        SummaryController::class, 'update'
    ])->name('summaries.update');

//Route to Delete an item form the database
// Route::delete('/tasks/{task}', function (Task $task) {

//     $task->delete();
//     return redirect()->route('tasks.index')
//     ->with('success','task successfully deleted');

// })->name('tasks.destroy');

//=======================================
//Education Routes
//=======================================

Route::get('/uploads/education', function (Education $education) {
    return view('uploads.education', [
        'educations' => $education ]);
})->middleware(['auth', 'verified'])->name('education');

//Route::resource('education', EducationController::class);
    //->only(['index', 'store']);

Route::post('/uploads/education', [
        EducationController::class, 'store'
    ])->name('education.store');


//=======================================
//Experience Routes
//=======================================
Route::get('/uploads/experience', function () {
    return view('uploads.experience');
})->middleware(['auth', 'verified'])->name('experience');


Route::post('/uploads/experience', [
    ExperienceController::class, 'store'
])->name('experiences.store');



//=======================================
//Portfolio Routes
//=======================================
Route::get('/uploads/portfolio', function () {
    return view('uploads.portfolio');
})->middleware(['auth', 'verified'])->name('portfolio');



//=========================================
//  CUSTOM ROUTES
//=========================================

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
