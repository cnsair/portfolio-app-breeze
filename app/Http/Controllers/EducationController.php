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

        // $education = Education::when(
        //     $course,
        //     fn($query, $course) => $query->course($course)
        // );
        // return view('uploads.show', ['education' => $education]);
        
        return view('uploads.show', [
            'education' => Education::all()]
        );

        // $education = DB::table('education')->select('status','date','course', 'activity')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('uploads.education');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EducationRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        //$request->user()->save();

        $educations = new Education();
        $educations->status = $request->input('status');
        $educations->date = $request->input('date');
        $educations->course = $request->input('course');
        $educations->school = $request->input('school');
        $educations->activity = $request->input('activity');
        $educations->save();

        //return redirect()->back()->with('success', 'Comment stored successfully!');
        // return redirect()->route('books.show', $book);
        return Redirect::route('education.store')->with('status', 'education-updated');
        
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
