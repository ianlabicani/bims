<?php

Route::name('guest.')->group(function () {
    Route::get('/', fn() => view('guest.welcome.index'))->name('welcome');
});


