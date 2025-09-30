<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

require __DIR__.'/admin.php';

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('aboutUs', function () {
    return Inertia::render('AboutUs');
})->name('aboutUs');

Route::get('resume', function () {
    return Inertia::render('Resume');
})->name('resume');

Route::get('projects', function () {
    return Inertia::render('Projects');
})->name('projects');

Route::get('contactUs', function () {
    return Inertia::render('ContactUs');
})->name('contactUs');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/{vue_capture?}', function () {
    return Inertia::render('Home');
})->where('vue_capture', '^(?!api).*');
