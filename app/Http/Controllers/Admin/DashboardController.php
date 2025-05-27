<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Campus;
use App\Models\Building;
use App\Models\Room;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch counts for dashboard stats
        $totalUsers = User::count();
        $totalCampuses = Campus::count();
        $totalBuildings = Building::count();
        $totalRooms = Room::count();

        // Get the authenticated user
        $user = auth()->user();

        // Get the latest buildings
        $latestBuildings = Building::with('campus')
            ->withCount('rooms')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'totalUsers',
            'totalCampuses',
            'totalBuildings',
            'totalRooms',
            'user',
            'latestBuildings'
        ));
    }
}
