<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Resume;
use App\Models\Summary;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    //Controller that renders posted items
    public function showInDashboard(){
        
        $summary_section = Summary::query()->orderBy('id', 'asc')->get();
        $education_section = Education::query()->orderBy('id', 'desc')->get();
        $experience_section = Experience::query()->orderBy('id', 'desc')->get();
        $portfolio_section = Portfolio::query()->orderBy('id', 'desc')->get();
        $resume_section = Resume::query()->orderBy('id', 'desc')->get();

        return view('uploads.show')
            ->with('summary_section', $summary_section)
            ->with('education_section', $education_section)
            ->with('experience_section', $experience_section)
            ->with('portfolio_section', $portfolio_section)
            ->with('resume_section', $resume_section);

        // $dash["summary_section"] = $summary_section;
        // $dash["education_section"] = $education_section;
        // $dash["experience_section"] = $experience_section;

        // return view('uploads/show', $dash)

    }
}
