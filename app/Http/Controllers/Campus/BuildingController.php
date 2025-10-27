<?php

namespace App\Http\Controllers\Campus;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuildingController extends Controller
{
    public function index(Request $request)
    {
        $buildings = $request->user()->campus->buildings()->withCount(['rooms', 'items'])->get();

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
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'floor_area' => 'nullable|string',
            'type' => 'nullable|string',
            'number_of_floors' => 'nullable|integer',
            'number_of_rooms' => 'nullable|integer',
            'number_of_CRs' => 'nullable|integer',
            'college_office_assigned' => 'nullable|string',
            'completed_at' => 'nullable|date',
            'CSU_cert' => 'file|mimes:pdf,jpeg,png,jpg|max:2048',
            'FIRE_cert' => 'file|mimes:pdf,jpeg,png,jpg|max:2048',
            'OCCUPANCY_cert' => 'file|mimes:pdf,jpeg,png,jpg|max:2048',
            'LGU_cert' => 'file|mimes:pdf,jpeg,png,jpg|max:2048',
            // Basic Information
            'department_agency' => 'nullable|string|max:255',
            'complete_agency_address' => 'nullable|string|max:255',
            // Description of Building
            'registered_name' => 'nullable|string|max:255',
            'location_street' => 'nullable|string|max:255',
            'location_brgy' => 'nullable|string|max:255',
            'location_municipality' => 'nullable|string|max:255',
            'location_province' => 'nullable|string|max:255',
            'classification' => 'nullable|string|max:255',
            'physical_condition' => 'nullable|string|max:255',
            'condition_description' => 'nullable|string',
            'acquisition_date' => 'nullable|date',
            'acquisition_mode' => 'nullable|string|max:255',
            'improvements' => 'nullable|array',
            'existing_utilities' => 'nullable|array',
            'land_ownership_status' => 'nullable|string|max:255',
            'estimated_occupants' => 'nullable|integer',
            'estimated_fund' => 'nullable|numeric',
            // Utilization Data
            'specific_use' => 'nullable|string|max:255',
            // Document Information
            'prepared_by' => 'nullable|string|max:255',
            'preparer_position' => 'nullable|string|max:255',
            'certified_by' => 'nullable|string|max:255',
            'certifier_position' => 'nullable|string|max:255',
        ]);

        // Step 2: Get the campus of the authenticated user
        $campus = $request->user()->campus;

        if (! $campus) {
            return redirect()->route('campus.dashboard')->with('error', 'You do not have a campus assigned.');
        }

        // Step 3: Add campus_id to validated data
        $validated['campus_id'] = $campus->id;

        // Process array fields
        if ($request->has('improvements')) {
            $validated['improvements'] = is_array($request->improvements)
                ? $request->improvements
                : explode(',', $request->improvements);
        }

        if ($request->has('existing_utilities')) {
            $validated['existing_utilities'] = is_array($request->existing_utilities)
                ? $request->existing_utilities
                : explode(',', $request->existing_utilities);
        }

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
        try {
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
                // Basic Information
                'department_agency' => 'nullable|string|max:255',
                'complete_agency_address' => 'nullable|string|max:255',
                // Description of Building
                'registered_name' => 'nullable|string|max:255',
                'location_street' => 'nullable|string|max:255',
                'location_brgy' => 'nullable|string|max:255',
                'location_municipality' => 'nullable|string|max:255',
                'location_province' => 'nullable|string|max:255',
                'classification' => 'nullable|string|max:255',
                'physical_condition' => 'nullable|string|max:255',
                'condition_description' => 'nullable|string',
                'acquisition_date' => 'nullable|date',
                'acquisition_mode' => 'nullable|string|max:255',
                'improvements' => 'nullable|array',
                'existing_utilities' => 'nullable|array',
                'land_ownership_status' => 'nullable|string|max:255',
                'estimated_occupants' => 'nullable|integer',
                'estimated_fund' => 'nullable|numeric',
                // Utilization Data
                'specific_use' => 'nullable|string|max:255',
                // Document Information
                'prepared_by' => 'nullable|string|max:255',
                'preparer_position' => 'nullable|string|max:255',
                'certified_by' => 'nullable|string|max:255',
                'certifier_position' => 'nullable|string|max:255',
            ]);

            // Process array fields
            try {
                if ($request->has('improvements')) {
                    $validated['improvements'] = is_array($request->improvements)
                        ? $request->improvements
                        : explode(',', $request->improvements);
                }
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'Error processing improvements: '.$e->getMessage());
            }

            try {
                if ($request->has('existing_utilities')) {
                    $validated['existing_utilities'] = is_array($request->existing_utilities)
                        ? $request->existing_utilities
                        : explode(',', $request->existing_utilities);
                }
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'Error processing existing utilities: '.$e->getMessage());
            }

            // Handle file uploads and store them
            try {
                if ($request->hasFile('CSU_cert')) {
                    if ($building->CSU_cert && Storage::exists($building->CSU_cert)) {
                        Storage::delete($building->CSU_cert);
                    }
                    $validated['CSU_cert'] = $request->file('CSU_cert')->store('certificates');
                }
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'Error uploading CSU certificate: '.$e->getMessage());
            }

            try {
                if ($request->hasFile('FIRE_cert')) {
                    if ($building->FIRE_cert && Storage::exists($building->FIRE_cert)) {
                        Storage::delete($building->FIRE_cert);
                    }
                    $validated['FIRE_cert'] = $request->file('FIRE_cert')->store('certificates');
                }
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'Error uploading FIRE certificate: '.$e->getMessage());
            }

            try {
                if ($request->hasFile('OCCUPANCY_cert')) {
                    if ($building->OCCUPANCY_cert && Storage::exists($building->OCCUPANCY_cert)) {
                        Storage::delete($building->OCCUPANCY_cert);
                    }
                    $validated['OCCUPANCY_cert'] = $request->file('OCCUPANCY_cert')->store('certificates');
                }
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'Error uploading OCCUPANCY certificate: '.$e->getMessage());
            }

            try {
                if ($request->hasFile('LGU_cert')) {
                    if ($building->LGU_cert && Storage::exists($building->LGU_cert)) {
                        Storage::delete($building->LGU_cert);
                    }
                    $validated['LGU_cert'] = $request->file('LGU_cert')->store('certificates');
                }
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'Error uploading LGU certificate: '.$e->getMessage());
            }

            try {
                $building->update($validated);
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'Error updating building record: '.$e->getMessage());
            }

            return redirect()->route('campus.buildings.show', $building->id)->with('success', 'Building updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }

    public function destroy(Building $building)
    {
        // Delete all associated certificate files
        $certificates = ['CSU_cert', 'FIRE_cert', 'OCCUPANCY_cert', 'LGU_cert'];
        foreach ($certificates as $cert) {
            if ($building->$cert && Storage::exists($building->$cert)) {
                Storage::delete($building->$cert);
            }
        }

        // Delete all items in rooms of this building
        $building->items()->delete();

        // Delete all rooms in this building
        $building->rooms()->delete();

        // Delete the building itself
        $building->delete();

        return redirect()->route('campus.buildings.index')->with('success', 'Building deleted successfully.');
    }
}
