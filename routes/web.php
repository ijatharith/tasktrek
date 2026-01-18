<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController; // Must be at the top
use App\Http\Controllers\AuthController;

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected Routes
Route::middleware('auth')->group(function () {
    // 1. The Dashboard Home
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // 2. The Page to Show the "Add New Assignment" Form
    Route::get('/tasks/create', [DashboardController::class, 'create'])->name('tasks.create');

    // 3. The Action that handles the Form Submission (POST)
    Route::post('/tasks', [DashboardController::class, 'store'])->name('tasks.store');

    Route::get('/tasks/{id}/edit', [DashboardController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{id}', [DashboardController::class, 'update'])->name('tasks.update');

    // Show confirmation page
    Route::get('/tasks/{id}/delete', [DashboardController::class, 'deleteConfirm'])->name('tasks.delete.confirm');

    // Perform the delete action
    Route::delete('/tasks/{id}', [DashboardController::class, 'destroy'])->name('tasks.destroy');

    // If your logic is in DashboardController
    Route::get('/assignments', [DashboardController::class, 'assignments'])->name('tasks.index');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [DashboardController::class, 'updateProfile'])->name('profile.update');
});
// OR if your logic is in TaskController
// 27: Duplicate removed
// Route::get('/assignments', [DashboardController::class, 'index'])->name('tasks.index');