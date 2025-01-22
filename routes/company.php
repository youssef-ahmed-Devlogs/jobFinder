<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Company Dashboard';
})->middleware(['auth:company', 'verified'])->name('index');
