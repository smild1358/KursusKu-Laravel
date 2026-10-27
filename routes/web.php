<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

// Landing Page Route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Form Pendaftaran Routes
Route::get('/pendaftaran', [CourseController::class, 'create'])->name('enrollments.create');
Route::post('/pendaftaran/preview', [CourseController::class, 'preview'])->name('enrollments.preview');

// Async Ajax Availability JSON Route
Route::get('/courses/{course}/availability', [CourseController::class, 'availability'])->name('courses.availability');