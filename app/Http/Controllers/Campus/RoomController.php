<?php

namespace App\Http\Controllers\Campus;

use App\Http\Controllers\Controller;
use App\Models\room;
use App\Models\Building;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Building $building)
    {
        $rooms = $building->rooms()->get();
        return view('campus.buildings.rooms.index', compact('rooms', 'building'));
    }

    public function show(Building $building, Room $room)
    {
        return view('campus.buildings.rooms.show', compact('building', 'room'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        room::create($validated);

        return redirect()->route('campus.rooms.index')->with('success', 'Room created successfully.');
    }

    public function edit(room $room)
    {
        $buildings = Building::all();
        return view('campus.rooms.edit', compact('room', 'buildings'));
    }

    public function update(Request $request, room $room)
    {
        $validated = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $room->update($validated);

        return redirect()->route('campus.rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(room $room)
    {
        $room->delete();

        return redirect()->route('campus.rooms.index')->with('success', 'Room deleted successfully.');
    }
}
