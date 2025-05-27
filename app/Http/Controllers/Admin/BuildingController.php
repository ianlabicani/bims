<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuildingController extends Controller
{
    public function index(Request $request)
    {
        $buildings = Building::withCount(['rooms', 'items'])->get();
        return view('admin.buildings.index', compact('buildings'));
    }

    public function show(Building $building)
    {
        return view('admin.buildings.show', compact('building'));
    }
}
