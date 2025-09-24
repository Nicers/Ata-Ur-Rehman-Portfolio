<?php

use App\Http\Controllers\API\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('projects/{category}', [ProjectController::class, 'index'])->name('projects');
Route::get('home-section', [ProjectController::class, 'getHome'])->name('home-section');
