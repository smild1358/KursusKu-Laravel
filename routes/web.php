<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

// Landing Page
Route::get('/', [CourseController::class, 'index'])->name('home');

// Resource / Route CRUD Pendaftaran KursusKu
Route::get('/pendaftaran', [CourseController::class, 'create'])->name('enrollments.create');
Route::post('/pendaftaran/store', [CourseController::class, 'store'])->name('enrollments.store');

// Manajemen Data (Index, Show, Edit, Update, Delete)
Route::get('/history', [CourseController::class, 'listData'])->name('registrations.index');
Route::get('/pendaftaran/{id}/edit', [CourseController::class, 'edit'])->name('registrations.edit');
Route::put('/pendaftaran/{id}', [CourseController::class, 'update'])->name('registrations.update');
Route::delete('/pendaftaran/{id}', [CourseController::class, 'destroy'])->name('registrations.destroy');
Route::get('/pendaftaran/{id}', [CourseController::class, 'show'])->name('registrations.show');