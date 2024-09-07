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
     * Show the form for editing the specified resource.
     */
    public function edit(Resume $resume)
    {
        return view('uploads.edit-resume', [
            'resume' => $resume 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResumeRequest $request, $resume): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ( $request == true) {

            $resume = Resume::find($resume);

            $resume->title = $request->input('title');
            $resume->file = $request->file('file')->store('uploads', 'public');
            
            $selected_file = $request->file('file');
            if ( !empty($selected_file) ) {
                $resume->file = $request->file('file')->store('uploads', 'public');
            }

            $resume->update();

            return Redirect::route('show')->with('status', 'resume-updated');
        }
        else{
            return Redirect::route('show')->with('status', 'resume-denied');
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