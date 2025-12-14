<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PriorityController;

Route::middleware('auth')->group(function () {
    Route::resource('priorities', PriorityController::class);
});


Route::resource('tasks', TaskController::class);


Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
});


Route::middleware('auth')->group(function () {
    Route::resource('todos', TodoListController::class);
});


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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::resource('categories', CategoryController::class)
    ->middleware('auth');


});

require __DIR__.'/auth.php';
