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
        // Step 1: Validate the input fields and files
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string',
            'address' => 'string',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
            'floor_area' => 'string',
            'type' => 'string',
            'number_of_floors' => 'integer',
            'number_of_rooms' => 'integer',
            'number_of_CRs' => 'integer',
            'college_office_assigned' => 'string',
            'completed_at' => 'date',
            'CSU_cert' => 'file|mimes:pdf,jpeg,png,jpg|max:2048',
            'FIRE_cert' => 'file|mimes:pdf,jpeg,png,jpg|max:2048',
            'OCCUPANCY_cert' => 'file|mimes:pdf,jpeg,png,jpg|max:2048',
            'LGU_cert' => 'file|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        // Step 2: Get the campus of the authenticated user
        $campus = $request->user()->campus;

        if (!$campus) {
            return redirect()->route('campus.dashboard')->with('error', 'You do not have a campus assigned.');
        }

        // Step 3: Add campus_id to validated data
        $validated['campus_id'] = $campus->id;

        // Step 4: Handle file uploads and store them
        if ($request->hasFile('CSU_cert')) {
            $validated['CSU_cert'] = $request->file('CSU_cert')->store('certificates');
        }

        if ($request->hasFile('FIRE_cert')) {
            $validated['FIRE_cert'] = $request->file('FIRE_cert')->store('certificates');
        }

        if ($request->hasFile('OCCUPANCY_cert')) {
            $validated['OCCUPANCY_cert'] = $request->file('OCCUPANCY_cert')->store('certificates');
        }

        if ($request->hasFile('LGU_cert')) {
            $validated['LGU_cert'] = $request->file('LGU_cert')->store('certificates');
        }

        // Step 5: Create the Building record in the database
        Building::create($validated);

        return redirect()->route('campus.buildings.index')->with('success', 'Building created successfully.');
    }


}
