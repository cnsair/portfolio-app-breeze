<?php

namespace App\Http\Controllers;

use App\Http\Requests\SummaryRequest;
use App\Models\Summary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SummaryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('uploads.summary');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SummaryRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $summaries = new Summary();
        $summaries->myname = $request->input('myname');
        $summaries->biography = $request->input('biography');
        $summaries->address = $request->input('address');
        $summaries->phone = $request->input('phone');
        $summaries->email = $request->input('email');
        $summaries->save();

        return Redirect::route('summaries.store')->with('status', 'summary-added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Summary $summary)
    {
        return view('uploads.edit-summary', [
            'summaries' => $summary 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SummaryRequest $request, $summaries): RedirectResponse
    {
        $request->user()->fill($request->validated());

        //dd($request->input('myname'), $request->input('biography'));
        //$request->update([
            //$summaries = new Summary();
            $summaries = Summary::find($summaries);
            $summaries->myname = $request->input('myname');
            $summaries->biography = $request->input('biography');
            $summaries->address = $request->input('address');
            $summaries->phone = $request->input('phone');
            $summaries->email = $request->input('email');
            $summaries->update();
        //]);

        return Redirect::route('show')->with('status', 'summary-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($summaries): RedirectResponse
    {
        $summaries = Summary::find($summaries);
        //dd($summaries);
        $summaries->delete();

        return Redirect::route('show')->with('status', 'summary-deleted');
    }
}
