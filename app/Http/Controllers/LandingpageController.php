<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Models\Testimony;
use Illuminate\Http\Request;

class landingpageController extends Controller
{
    //Controller that renders Testimonies & Hire
    public function showInLandingpage(){
        
        $hire_section = Hire::all();
        $testimony_section = Testimony::all();

        return view('dashboard')
            ->with('hire_section', $hire_section)
            ->with('testimony_section', $testimony_section);

    }
}
