<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('uploads.show', [
        //     'experience' => Experience::all()]
        // );
    }

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

        return Redirect::route('experiences.store')->with('status', 'experience-updated');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
