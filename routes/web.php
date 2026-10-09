<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\ComputerController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('home', [HomeController::class, 'index'])->name('home.index');

// Centros de formación (Training Centers)
Route::get('trainingcenters', [TrainingCenterController::class, 'index'])->name('trainingcenters.index');
Route::get('trainingcenters/create', [TrainingCenterController::class, 'create'])->name('trainingcenters.create');
Route::post('trainingcenters', [TrainingCenterController::class, 'store'])->name('trainingcenters.store');
Route::get('trainingcenters/{id}', [TrainingCenterController::class, 'show'])->name('trainingcenters.show');
Route::get('trainingcenters/{id}/edit', [TrainingCenterController::class, 'edit'])->name('trainingcenters.edit');
Route::put('trainingcenters/{id}', [TrainingCenterController::class, 'update'])->name('trainingcenters.update');
Route::delete('trainingcenters/{id}', [TrainingCenterController::class, 'destroy'])->name('trainingcenters.destroy');

// Áreas (Areas)
Route::get('areas', [AreasController::class, 'index'])->name('areas.index');
Route::get('areas/create', [AreasController::class, 'create'])->name('areas.create');
Route::post('areas', [AreasController::class, 'store'])->name('areas.store');
Route::get('areas/{id}', [AreasController::class, 'show'])->name('areas.show');
Route::get('areas/{id}/edit', [AreasController::class, 'edit'])->name('areas.edit');
Route::put('areas/{id}', [AreasController::class, 'update'])->name('areas.update');
Route::delete('areas/{id}', [AreasController::class, 'destroy'])->name('areas.destroy');


// Computadores (Computers)
Route::get('computers', [ComputerController::class, 'index'])->name('computers.index');
Route::get('computers/create', [ComputerController::class, 'create'])->name('computers.create');
Route::post('computers', [ComputerController::class, 'store'])->name('computers.store');
Route::get('computers/{id}', [ComputerController::class, 'show'])->name('computers.show');
Route::get('computers/{id}/edit', [ComputerController::class, 'edit'])->name('computers.edit');
Route::put('computers/{id}', [ComputerController::class, 'update'])->name('computers.update');
Route::delete('computers/{id}', [ComputerController::class, 'destroy'])->name('computers.destroy');