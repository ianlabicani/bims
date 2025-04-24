<?php

namespace App\Http\Controllers\Campus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('campus.dashboard.index');
    }
}
