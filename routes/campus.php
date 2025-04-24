<?php

use App\Http\Controllers\Campus\DashboardController;
use Illuminate\Support\Facades\Route;

Route::name('campus.')->prefix('campus')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
});
