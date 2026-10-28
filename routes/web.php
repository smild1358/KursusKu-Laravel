<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

// Landing Page Route
Route::get('/', [CourseController::class, 'index'])->name('home');

// Route Pendaftaran
Route::get('/pendaftaran', [CourseController::class, 'create'])->name('enrollments.create');
Route::post('/pendaftaran/store', [CourseController::class, 'store'])->name('enrollments.store');

// Route Riwayat
Route::get('/history', [CourseController::class, 'history'])->name('registrations.history');