<?php

use App\Http\Controllers\Campus\BuildingController;
use App\Http\Controllers\Campus\DashboardController;
use App\Http\Controllers\Campus\ItemController;
use App\Http\Controllers\Campus\RoomController;
use Illuminate\Support\Facades\Route;

Route::name('campus.')->prefix('campus')->middleware(['auth', 'verified', 'role:campus'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('buildings', BuildingController::class);
    Route::resource('buildings.rooms', RoomController::class);
    Route::resource('buildings.items', ItemController::class);
});


