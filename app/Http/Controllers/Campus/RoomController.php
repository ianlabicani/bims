<?php

namespace App\Http\Controllers\Campus;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Building;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Building $building)
    {
        $rooms = $building->rooms()->with('items')->paginate(15);
        return view('campus.buildings.rooms.index', compact('rooms', 'building'));
    }

    public function create(Building $building)
    {
        // Check if building has reached room capacity
        $currentRoomCount = $building->rooms()->count();
        $maxRooms = $building->number_of_rooms;

        if ($maxRooms && $currentRoomCount >= $maxRooms) {
            return redirect()->route('campus.buildings.rooms.index', $building)
                ->with('error', "This building has reached its maximum capacity of {$maxRooms} rooms. Current rooms: {$currentRoomCount}");
        }

        return view('campus.buildings.rooms.create', compact('building'));
    }

    public function store(Request $request, Building $building)
    {
        // Check room capacity before validation
        $currentRoomCount = $building->rooms()->count();
        $maxRooms = $building->number_of_rooms;

        if ($maxRooms && $currentRoomCount >= $maxRooms) {
            return redirect()->route('campus.buildings.rooms.create', $building)
                ->with('error', "Cannot create room. This building has reached its maximum capacity of {$maxRooms} rooms. Current rooms: {$currentRoomCount}")
                ->withInput();
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:100',
            'capacity' => 'nullable|integer|min:1',
        ]);

        // Add building_id to validated data
        $validated['building_id'] = $building->id;

        Room::create($validated);

        return redirect()->route('campus.buildings.rooms.index', $building)
            ->with('success', 'Room created successfully.');
    }

    public function show(Building $building, Room $room)
    {
        return view('campus.buildings.rooms.show', compact('building', 'room'));
    }

    public function edit(Building $building, Room $room)
    {
        return view('campus.buildings.rooms.edit', compact('building', 'room'));
    }

    public function update(Request $request, Building $building, Room $room)
    {
        // If changing building, check capacity of the new building
        if ($request->building_id != $room->building_id) {
            $newBuilding = Building::find($request->building_id);
            if ($newBuilding) {
                $currentRoomCount = $newBuilding->rooms()->count();
                $maxRooms = $newBuilding->number_of_rooms;

                if ($maxRooms && $currentRoomCount >= $maxRooms) {
                    return redirect()->route('campus.buildings.rooms.edit', [$building, $room])
                        ->with('error', "Cannot move room. The target building has reached its maximum capacity of {$maxRooms} rooms.")
                        ->withInput();
                }
            }
        }

        $validated = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:100',
            'capacity' => 'nullable|integer|min:1',
        ]);

        $room->update($validated);

        // If building was changed, redirect to new building's room index
        if ($validated['building_id'] != $building->id) {
            $newBuilding = Building::find($validated['building_id']);
            return redirect()->route('campus.buildings.rooms.index', $newBuilding)
                ->with('success', 'Room updated and moved to new building successfully.');
        }

        return redirect()->route('campus.buildings.rooms.index', $building)
            ->with('success', 'Room updated successfully.');
    }

    public function destroy(Building $building, Room $room)
    {
        $room->delete();

        return redirect()->route('campus.buildings.rooms.index', $building)
            ->with('success', 'Room deleted successfully.');
    }
}
