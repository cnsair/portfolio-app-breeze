<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class TestimonyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'comp_position' => ['required', 'string', 'max:255', 'min:5'],
            'email' => ['string', 'lowercase', 'email', 'max:255', 'min:5', 'nullable'],
            'message' => ['required', 'max:500', 'min:10'],
        ]);

        if ( $request == true) { 

            $testimony = Testimony::create([
                'name' => $request->name,
                'comp_position' => $request->comp_position,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            return Redirect::route('testimony')->with('status', 'Thank you. Your testimony will show after my approval');
        }
        else{
            return Redirect::route('testimony')->with('status', 'Something went wrong! Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($testimony): RedirectResponse
    {
        $testimony = Testimony::find($testimony);
        $testimony->delete();

        return Redirect::route('dashboard')->with('status', 'testimony-deleted');
    }
}
