<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Models\Education;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     
        // $course = $request->input('course');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('uploads.education');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EducationRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $educations = new Education();
        $educations->status = $request->input('status');
        $educations->date = $request->input('date');
        $educations->course = $request->input('course');
        $educations->school = $request->input('school');
        $educations->activity = $request->input('activity');
        $educations->save();

        //return redirect()->back()->with('success', 'Comment stored successfully!');
        // return redirect()->route('books.show', $book);
        return Redirect::route('education.store')->with('status', 'education-added');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EducationRequest $request, $education): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $education = Education::find($education);
        $education->status = $request->input('status');
        $education->date = $request->input('date');
        $education->course = $request->input('course');
        $education->school = $request->input('school');
        $education->activity = $request->input('activity');
        $education->update();

        return Redirect::route('show')->with('status', 'education-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($education): RedirectResponse
    {
        $education = Education::find($education);
        $education->delete();

        return Redirect::route('show')->with('status', 'education-deleted');
    }
}
