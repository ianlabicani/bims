<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Redirect users to their appropriate dashboard based on their role.
     */
    public function index()
    {
        $user = Auth::user();

        // Check user roles and redirect accordingly
        // Priority: admin > campus > default

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('campus')) {
            return redirect()->route('campus.dashboard');
        }

        // For now, redirect to welcome page for users without specific roles
        return redirect()->route('guest.welcome')->with('info', 'Welcome! Please contact an administrator to assign your role.');
    }
}
