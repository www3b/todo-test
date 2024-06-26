<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/task', [TaskController::class, 'store']);
Route::put('/task/{id}/done', [TaskController::class, 'done']);
Route::delete('/task/{id}', [TaskController::class, 'delete']);
