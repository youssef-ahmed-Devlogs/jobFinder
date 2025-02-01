<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // auth()->guard('company')->logout();
    return 'Company Dashboard';
})->middleware(['auth:company', 'verified'])->name('index');
