<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\CohortController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TeacherController;

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

// Alias de computadores en singular
Route::get('computer', [ComputerController::class, 'index'])->name('computer.index');
Route::get('computer/create', [ComputerController::class, 'create'])->name('computer.create');


// Ambientes de formación
Route::get('environments', [EnvironmentController::class, 'index'])->name('environments.index');
Route::get('environments/create', [EnvironmentController::class, 'create'])->name('environments.create'); // va ANTES de {id}
Route::post('environments', [EnvironmentController::class, 'store'])->name('environments.store');
Route::get('environments/{id}', [EnvironmentController::class, 'show'])->name('environments.show');
Route::get('environments/{id}/edit', [EnvironmentController::class, 'edit'])->name('environments.edit');
Route::put('environments/{id}', [EnvironmentController::class, 'update'])->name('environments.update');
Route::delete('environments/{id}', [EnvironmentController::class, 'destroy'])->name('environments.destroy');

// Anuncios (Announcements)
Route::get('announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
Route::post('announcements', [AnnouncementController::class, 'store'])->name('announcements.store');
Route::get('announcements/{id}', [AnnouncementController::class, 'show'])->name('announcements.show');
Route::get('announcements/{id}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit');
Route::put('announcements/{id}', [AnnouncementController::class, 'update'])->name('announcements.update');
Route::delete('announcements/{id}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');

// Aprendices (Apprentices)
Route::get('apprentice', [ApprenticeController::class, 'index'])->name('apprentice.index');
Route::get('apprentice/create', [ApprenticeController::class, 'create'])->name('apprentice.create');
Route::post('apprentice', [ApprenticeController::class, 'store'])->name('apprentice.admin');
Route::get('apprentice/{id}', [ApprenticeController::class, 'show'])->name('apprentice.show');
Route::get('apprentice/{id}/edit', [ApprenticeController::class, 'edit'])->name('apprentice.edit');
Route::put('apprentice/{id}', [ApprenticeController::class, 'update'])->name('apprentice.update');
Route::delete('apprentice/{id}', [ApprenticeController::class, 'destroy'])->name('apprentice.destroy');

// Fichas (Cohorts)
Route::get('cohorts', [CohortController::class, 'index'])->name('cohorts.index');
Route::get('cohorts/create', [CohortController::class, 'create'])->name('cohorts.create');
Route::post('cohorts', [CohortController::class, 'store'])->name('cohorts.admin');
Route::get('cohorts/{id}', [CohortController::class, 'show'])->name('cohorts.show');
Route::get('cohorts/{id}/edit', [CohortController::class, 'edit'])->name('cohorts.edit');
Route::put('cohorts/{id}', [CohortController::class, 'update'])->name('cohorts.update');
Route::delete('cohorts/{id}', [CohortController::class, 'destroy'])->name('cohorts.destroy');

// Cursos (Courses)
Route::get('course', [CourseController::class, 'index'])->name('course.index');
Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
Route::post('course', [CourseController::class, 'store'])->name('course.datos');
Route::get('course/{id}', [CourseController::class, 'show'])->name('course.show');
Route::get('course/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
Route::put('course/{id}', [CourseController::class, 'update'])->name('course.update');
Route::delete('course/{id}', [CourseController::class, 'destroy'])->name('course.destroy');

// Ofertas (Offers)
Route::get('offers', [OfferController::class, 'index'])->name('offers.index');
Route::get('offers/create', [OfferController::class, 'create'])->name('offers.create');
Route::post('offers', [OfferController::class, 'store'])->name('offers.admin');
Route::get('offers/{id}', [OfferController::class, 'show'])->name('offers.show');
Route::get('offers/{id}/edit', [OfferController::class, 'edit'])->name('offers.edit');
Route::put('offers/{id}', [OfferController::class, 'update'])->name('offers.update');
Route::delete('offers/{id}', [OfferController::class, 'destroy'])->name('offers.destroy');

// Programas (Programs)
Route::get('programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('programs/create', [ProgramController::class, 'create'])->name('programs.create');
Route::post('programs', [ProgramController::class, 'store'])->name('programs.store');
Route::get('programs/{id}', [ProgramController::class, 'show'])->name('programs.show');
Route::get('programs/{id}/edit', [ProgramController::class, 'edit'])->name('programs.edit');
Route::put('programs/{id}', [ProgramController::class, 'update'])->name('programs.update');
Route::delete('programs/{id}', [ProgramController::class, 'destroy'])->name('programs.destroy');

// Instructores (Teachers)
Route::get('teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('teacher', [TeacherController::class, 'store'])->name('teacher.admin');
Route::get('teacher/{id}', [TeacherController::class, 'show'])->name('teacher.show');
Route::get('teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('teacher/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

// Páginas estáticas y auth
Route::get('about', function () { return view('about.nosotros'); })->name('about.nosotros');
Route::get('login', function () { return view('login.login'); })->name('login');
Route::get('registro', function () { return view('login.registro'); })->name('registro');
Route::get('search', function () { return redirect()->back(); })->name('search');
