<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ExperienceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('uploads.experience');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExperienceRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $experiences = new Experience();
        $experiences->role = $request->input('role');
        $experiences->date = $request->input('date');
        $experiences->location = $request->input('location');
        $experiences->activity = $request->input('activity');
        $experiences->save();

        return Redirect::route('experiences.store')->with('status', 'experience-added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('uploads.edit-experience', [
            'experience' => $experience 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExperienceRequest $request, $experience): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $experience = Experience::find($experience);
        $experience->role = $request->input('role');
        $experience->date = $request->input('date');
        $experience->location = $request->input('location');
        $experience->activity = $request->input('activity');
        $experience->update();

        return Redirect::route('show')->with('status', 'experience-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($experience): RedirectResponse
    {
        $experience = Experience::find($experience);
        $experience->delete();

        return Redirect::route('show')->with('status', 'experience-deleted');
    }
}
