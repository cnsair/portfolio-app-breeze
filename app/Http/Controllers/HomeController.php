<?php

namespace App\Http\Controllers;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Resume;
use App\Models\Summary;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Controller that renders posted items
    public function showInHome(){
        
        $summary_section = Summary::all();
        $education_section = Education::all();
        $experience_section = Experience::all();
        $portfolio_section = Portfolio::all();
        $resume_section = Resume::all();

        return view('home')
            ->with('summary_section', $summary_section)
            ->with('education_section', $education_section)
            ->with('experience_section', $experience_section)
            ->with('portfolio_section', $portfolio_section)
            ->with('resume_section', $resume_section);

    }
}
