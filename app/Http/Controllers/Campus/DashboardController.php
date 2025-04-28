<?php

namespace App\Http\Controllers\Campus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Step 1: Check if the user has a campus
        if (!$request->user()->campus) {
            return redirect()->route('campus.dashboard')->with('error', 'You do not have a campus assigned.');
        }


        // Step 2: Get the buildings associated with the user's campus
        $buildings = $request->user()->campus->buildings;

        return view('campus.dashboard.index', [
            'buildings' => $buildings,
        ]);

    }
}
