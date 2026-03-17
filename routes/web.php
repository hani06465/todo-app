<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;

// Authentication routes (login, register)


// After login, send users DIRECTLY to tasks page
Route::get('/', function() {
    return redirect()->route('tasks.index');
});

// Protected task routes
Route::resource('tasks', TaskController::class);