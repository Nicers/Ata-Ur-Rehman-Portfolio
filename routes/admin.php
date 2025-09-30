<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactSectionController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectSectionController;
use App\Http\Controllers\ResumeSectionController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('login', [AdminController::class, 'create'])->name('login');
    Route::post('loginCheck', [AdminController::class, 'login'])->name('loginCheck');

    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('logout', [AdminController::class, 'logout'])->name('logout');
        
        //*** Project ***/
        Route::get('project', [ProjectController::class, 'index'])->name('project');
        Route::post('add-project', [ProjectController::class, 'store'])->name('add-project');
        Route::put('update-project/{id}', [ProjectController::class, 'update'])->name('update-project');
        Route::delete('delete-project/{id}', [ProjectController::class, 'destroy'])->name('delete-project');
        
        //*** Project Category***/
        Route::get('project-category', [ProjectCategoryController::class, 'index'])->name('project-category');
        Route::post('add-project-category', [ProjectCategoryController::class, 'store'])->name('add-project-category');
        Route::put('update-project-category/{id}', [ProjectCategoryController::class, 'update'])->name('update-project-category');
        Route::delete('delete-project-category/{id}', [ProjectCategoryController::class, 'destroy'])->name('delete-project-category');
        
        //*** Hero Section Management ***/
        Route::get('hero', [HeroController::class, 'index'])->name('hero');
        Route::post('hero-store', [HeroController::class, 'store'])->name('hero-store');
        
        //*** About Section Management ***/
        Route::get('about', [AboutController::class, 'index'])->name('about');
        Route::post('about-store', [AboutController::class, 'store'])->name('about-store');

        //*** Project Section Management ***/
        Route::controller(ProjectSectionController::class)->prefix('project_section')->as('project_section.')->group( function(){
            Route::get('/', 'index')->name('index');
            Route::post('store', 'store')->name('store');
        });

        //*** Contact Section Management ***/
        Route::controller(ContactSectionController::class)->prefix('contact_section')->as('contact_section.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('store', 'store')->name('store');
        });

        //*** Resume Section Management ***/
        Route::controller(ResumeSectionController::class)->prefix('resume_section')->as('resume_section.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('store', 'store')->name('store');
        });
    });
});