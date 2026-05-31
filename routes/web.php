<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\TrainingAdminController;
use App\Http\Controllers\Admin\ApplicationAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\ContactMessageAdminController;


use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Trainer\TrainerDashboardController;
use App\Http\Controllers\Trainer\CourseController as TrainerCourseController;
use App\Http\Controllers\Trainer\ContentController as TrainerContentController;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', fn () => view('about'))->name('about');

Route::get('/formations', [TrainingController::class, 'index'])->name('trainings.index');
Route::get('/formations/{training:slug}', [TrainingController::class, 'show'])->name('trainings.show');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

/*
|--------------------------------------------------------------------------
| Candidatures
|--------------------------------------------------------------------------
*/
Route::get(
    '/formations/{training:slug}/inscription',
    [ApplicationController::class, 'create']
)->name('applications.create');

Route::post(
    '/formations/{training:slug}/inscription',
    [ApplicationController::class, 'store']
)->name('applications.store');

/*
|--------------------------------------------------------------------------
| Auth (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Dashboard (redirection par rôle)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $role = auth()->user()->role;

    return match ($role) {
        'admin'   => redirect()->route('admin.dashboard'),
        'trainer' => redirect()->route('trainer.dashboard'),
        default   => redirect()->route('student.dashboard'),
    };
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Student
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])
            ->name('dashboard');
    });

/*
|--------------------------------------------------------------------------
| Trainer
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:trainer'])
    ->prefix('trainer')
    ->name('trainer.')
    ->group(function () {
        Route::get('/', [TrainerDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('courses', TrainerCourseController::class);

        Route::post(
            'courses/{course}/contents',
            [TrainerContentController::class, 'store']
        )->name('contents.store');
    });

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard admin
        Route::get('/', fn () => view('admin.dashboard'))->name('dashboard');

        // ✅ Utilisateurs (liste + CV)
        Route::get('/users', [UserAdminController::class, 'index'])
            ->name('users.index');

        // Formations (CRUD)
        Route::resource('trainings', TrainingAdminController::class);

        // Candidatures
        Route::get('applications', [ApplicationAdminController::class, 'index'])
            ->name('applications.index');

        Route::post(
            'applications/{application}/status',
            [ApplicationAdminController::class, 'updateStatus']
        )->name('applications.status');

        Route::get('messages', [ContactMessageAdminController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [ContactMessageAdminController::class, 'show'])->name('messages.show');
        Route::delete('messages/{message}', [ContactMessageAdminController::class, 'destroy'])->name('messages.destroy');

    });
