<?php

use App\Http\Controllers\Campus\BuildingController;
use App\Http\Controllers\Campus\DashboardController;
use Illuminate\Support\Facades\Route;

Route::name('campus.')->prefix('campus')->middleware(['auth', 'verified', 'role:campus'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('buildings', BuildingController::class);
});


