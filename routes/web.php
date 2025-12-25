<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController; // Must be at the top

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

// OR if your logic is in TaskController
Route::get('/assignments', [DashboardController::class, 'index'])->name('tasks.index');