<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Summary;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    //Controller that renders posted items
    public function showInDashboard(){
        
        $summary_section = Summary::all();
        $education_section = Education::all();
        $experience_section = Experience::all();

        return view('uploads/show')
            ->with('summary_section', $summary_section)
            ->with('education_section', $education_section)
            ->with('experience_section', $experience_section);

        // $dash["summary_section"] = $summary_section;
        // $dash["education_section"] = $education_section;
        // $dash["experience_section"] = $experience_section;

        // return view('uploads/show', $dash)

    }
}
