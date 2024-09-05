<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumeRequest;
use App\Models\Resume;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ResumeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('uploads.resume');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResumeRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        //Checks status of file selected: Max file size is 2048mb
        if ( $request == true) { 

            $resume = new Resume();

            $resume->title = $request->input('title');
            $resume->file = $request->file('file')->store('uploads', 'public');

            $resume->save();

            return Redirect::route('resume')->with('status', 'resume-added');
        }
        else{
            return Redirect::route('resume')->with('status', 'resume-denied');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($resume): RedirectResponse
    {
        $resume = Resume::find($resume);
        $resume->delete();

        return Redirect::route('show')->with('status', 'resume-deleted');
    }
}




//=========================================
//  HIRE ROUTES
//=========================================

// //create Hire form
// Route::get('hire', [
//     HireController::class, 'create'
// ])->middleware(['guest'])->name('hire');

// //create Hire form
// Route::get('hire', [
//     HireController::class, 'store'
// ])->middleware(['guest'])->name('hire.store');

// //delete
// Route::delete('/dashboard/{hire}', [
//     HireController::class, 'destroy'
// ])->name('hire.destroy');



// //=========================================
// //  TESTIMONY ROUTES
// //=========================================

// //create Testimony form
// Route::get('testimony', [
//     TestimonyController::class, 'create'
// ])->middleware(['guest'])->name('testimony');

// //create Hire form
// Route::get('hire', [
//     TestimonyController::class, 'store'
// ])->middleware(['guest'])->name('testimony.store');

// //delete
// Route::delete('/dashboard{testimony}', [
//     TestimonyController::class, 'destroy'
// ])->name('testimony.destroy');


// //Route to toggle betweeen Approved Testimony and Unapproved Testimony
// Route::put('/dashboard/{testimony}/toggle-approved', function (Testimony $testimony){

//     $testimony->toggleApproved();
//     return redirect()->back()->with('success','done');
    
// })->name('testimony.approved');
