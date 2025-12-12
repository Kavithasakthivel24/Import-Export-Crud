<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

    Route::resource('tasks', TaskController::class);

    // Soft delete restore & force delete
    Route::get('tasks-trash', [TaskController::class, 'trash'])->name('tasks.trash');
    Route::get('tasks/restore/{id}', [TaskController::class, 'restore'])->name('tasks.restore');
    Route::get('tasks/delete/{id}', [TaskController::class, 'forceDelete'])->name('tasks.forceDelete');

    // Import & Export
    Route::post('/tasks/import', [TaskController::class, 'import'])->name('tasks.import');
    Route::get('/tasks/export', [TaskController::class, 'export'])->name('tasks.export');

