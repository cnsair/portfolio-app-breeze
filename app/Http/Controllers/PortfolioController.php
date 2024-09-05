<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PortfolioController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('uploads.portfolio');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        //Checks status of file selected: Max file size is 2048mb
        if ( $request == true) { 

            $portfolio = new Portfolio();

            $portfolio->name = $request->input('name');
            $portfolio->project = $request->input('project');
            $portfolio->web_address = $request->input('web_address');
            $portfolio->description = $request->input('description');
            $portfolio->file = $request->file('file')->store('uploads', 'public');

            $portfolio->save();

            return Redirect::route('portfolio')->with('status', 'portfolio-added');
        }
        else{
            return Redirect::route('portfolio')->with('status', 'portfolio-denied');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('uploads.edit-portfolio', [
            'portfolio' => $portfolio ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest $request, $portfolio): RedirectResponse
    {
        $request->user()->fill($request->validated());

          if ( $request == true) {

            $portfolio = Portfolio::find($portfolio);

            $portfolio->name = $request->input('name');
            $portfolio->project = $request->input('project');
            $portfolio->web_address = $request->input('web_address');
            $portfolio->description = $request->input('description');
            
            $selected_file = $request->file('file');
            if ( !empty($selected_file) ) {
                $portfolio->file = $request->file('file')->store('uploads', 'public');
            }

            $portfolio->update();

            return Redirect::route('show')->with('status', 'portfolio-updated');
        }
        else{
            return Redirect::route('show')->with('status', 'portfolio-denied');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($portfolio): RedirectResponse
    {
        $portfolio = Portfolio::find($portfolio);
        $portfolio->delete();

        return Redirect::route('show')->with('status', 'portfolio-deleted');
    }
}
