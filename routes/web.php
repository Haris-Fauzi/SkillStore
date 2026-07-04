<?php

// use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Public\ProjectController as PublicProjectController;

Route::get('/', [PublicProjectController::class, 'index'])
    ->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/student-profile', [StudentProfileController::class, 'edit'])
        ->name('student-profile.edit');

    Route::match(['put', 'patch'], '/student-profile', [StudentProfileController::class, 'update'])
    ->name('student-profile.update');
    
    Route::get('/dashboard/projects', [ProjectController::class, 'index'])
        ->name('dashboard.projects.index');
    
    Route::get('/dashboard/projects/create', [ProjectController::class, 'create'])
    ->name('dashboard.projects.create');

    Route::post('/dashboard/projects', [ProjectController::class, 'store'])
    ->name('dashboard.projects.store');
    
    Route::get('/dashboard/projects/{project}/edit', [ProjectController::class, 'edit'])
    ->name('dashboard.projects.edit');

    Route::put('/dashboard/projects/{project}', [ProjectController::class, 'update'])
    ->name('dashboard.projects.update');

    Route::delete('/dashboard/projects/{project}', [ProjectController::class, 'destroy'])
    ->name('dashboard.projects.destroy');

    Route::delete(
        '/dashboard/projects/screenshots/{screenshot}',
        [ProjectController::class, 'destroyScreenshot']
    )->name('dashboard.projects.screenshots.destroy');

});

    Route::get('/projects', [PublicProjectController::class, 'index'])
    ->name('projects.index');

    Route::get('/projects/{project:slug}', [PublicProjectController::class, 'show'])
        ->name('projects.show');

    Route::get(
        '/projects/{project:slug}/download',
        [PublicProjectController::class,'download']
    )->name('projects.download');

require __DIR__.'/auth.php';