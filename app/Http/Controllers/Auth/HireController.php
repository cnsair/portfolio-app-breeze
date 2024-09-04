<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
// use Illuminate\View\View;
// use App\Http\Requests\HireRequest;
use App\Models\Hire;
use Illuminate\Support\Facades\Redirect;



class HireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());

        // if ( $request == true) { 

        //     $hire = new Hire();
        //     $hire->name = $request->input('name');
        //     $hire->email = $request->input('email');
        //     $hire->message = $request->input('message');
        //     $hire->save();

        //     return Redirect::route('hire')->with('status', 'message-sent');
        // }
        // else{
        //     return Redirect::route('hire')->with('status', 'message-failed');
        // }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'lowercase', 'email', 'max:255', 'nullable'],
            'message' => ['required', 'max:500'],
        ]);

        if ( $request == true) { 

            $hire = Hire::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            return Redirect::route('hire')->with('status', 'Message Sent! I\'ll get back to you shortly.');
        }
        else{
            return Redirect::route('hire')->with('status', 'Something went wrong! Please try again.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($hire): RedirectResponse
    {
        $hire = Hire::find($hire);
        $hire->delete();

        return Redirect::route('dashboard')->with('status', 'hire-deleted');
    }
}
