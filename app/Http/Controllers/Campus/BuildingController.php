<?php

namespace App\Http\Controllers\Campus;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::all();
        return view('campus.buildings.index', compact('buildings'));
    }

    public function show(Building $building)
    {
        return view('campus.buildings.show', compact('building'));
    }

    public function create()
    {
        return view('campus.buildings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $campus = $request->user()->campus;

        if (!$campus) {
            return redirect()->route('campus.dashboard')->with('error', 'You do not have a campus assigned.');
        }

        $validated['campus_id'] = $campus->id;

        Building::create($validated);

        return redirect()->route('campus.buildings.index')->with('success', 'Building created successfully.');
    }

}
