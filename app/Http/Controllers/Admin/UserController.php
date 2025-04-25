<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['roles', 'campus'])
            ->whereHas('roles', function ($query) {
                $query->where('name', 'campus');
            })
            ->get();

        $campuses = Campus::all();

        return view('admin.users.index', compact('users', 'campuses'));
    }


    public function assignCampus(Request $request, User $user)
    {
        $request->validate([
            'campus_id' => 'nullable|exists:campuses,id',
        ]);

        $user->campus_id = $request->campus_id;
        $user->save();

        return back()->with('success', 'Campus assigned successfully.');
    }
}
