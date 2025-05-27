<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Building;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Building $building)
    {
        $rooms = $building->rooms()->with('items')->get();
        return view('admin.buildings.rooms.index', compact('rooms', 'building'));
    }


    public function show(Building $building, Room $room)
    {
        return view('admin.buildings.rooms.show', compact('building', 'room'));
    }
}
