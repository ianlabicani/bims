<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Main dashboard route that redirects based on user role
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__ . '/guest.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/campus.php';
require __DIR__ . '/admin.php';
