<?php

namespace App\Http\Controllers\Campus;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuildingController extends Controller
{
    public function index(Request $request)
    {
        $buildings = $request->user()->campus->buildings;
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
        $createdBuilding = Building::create($validated);

        // Step 6: Create rooms based on the number_of_rooms field
        if (isset($validated['number_of_rooms']) && $validated['number_of_rooms'] > 0) {
            for ($i = 1; $i <= $validated['number_of_rooms']; $i++) {
                $createdBuilding->rooms()->create([
                    'building_id' => $createdBuilding->id,
                    'name' => "Room $i",
                    'description' => "Description for Room $i",
                ]);
            }
        }

        return redirect()->route('campus.buildings.index')->with('success', 'Building created successfully.');
    }

    public function edit(Building $building)
    {
        return view('campus.buildings.edit', compact('building'));
    }

    public function update(Request $request, Building $building)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'floor_area' => 'nullable|numeric',
            'type' => 'nullable|string',
            'number_of_floors' => 'nullable|integer',
            'number_of_rooms' => 'nullable|integer',
            'number_of_CRs' => 'nullable|integer',
            'college_office_assigned' => 'nullable|string',
            'completed_at' => 'nullable|date',

            'CSU_cert' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'FIRE_cert' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'OCCUPANCY_cert' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'LGU_cert' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        foreach (['CSU_cert', 'FIRE_cert', 'OCCUPANCY_cert', 'LGU_cert'] as $cert) {
            if ($request->hasFile($cert)) {
                if ($building->$cert && Storage::disk('public')->exists($building->$cert)) {
                    Storage::disk('public')->delete($building->$cert);
                }

                $validated[$cert] = $request->file($cert)->store('certs', 'public');
            }
        }

        $building->update($validated);

        return redirect()->route('campus.buildings.index')->with('success', 'Building updated successfully.');
    }

}
