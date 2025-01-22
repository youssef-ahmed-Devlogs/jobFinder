<?php

use Illuminate\Support\Facades\Route;


Route::prefix('dashboard')->as('dashboard.')->group(function () {
    /**
     * This is the default route for the dashboard login.
     */

    Route::get('login', function () {
        dd('Dashboard Login View');
    })->name('login');

    Route::post('login',  function () {
        dd('Dashboard Login Post');
    });


    /**
     * This is the default route for the dashboard.
     */

    Route::get('/', function () {
        return 'Admin Dashboard';
    })->middleware(['auth'])->name('index');
});
