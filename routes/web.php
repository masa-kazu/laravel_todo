<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // プロジェクト一覧画面
    Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
    // プロジェクト作成画面
    Route::get('project/create', [ProjectController::class, 'create'])->name('projects.create');
    // プロジェクト作成処理
    Route::post('project/store', [ProjectController::class, 'store'])->name('projects.store');
    // タスク一覧画面
    Route::get('projects/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');
});

require __DIR__.'/auth.php';
