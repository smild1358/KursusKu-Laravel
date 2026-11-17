<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute untuk halaman utama / beranda
Route::get('/', function () {
    $courses = \App\Models\Course::latest()->take(6)->get();
    return view('welcome', compact('courses')); 
})->name('home');

// Rute untuk halaman pendaftaran
Route::get('/registration', function () {
    return view('registration'); 
})->name('registration');

Route::post('/enrollment/preview', [EnrollmentController::class, 'preview'])->name('enrollments.preview');

// Rute Resource CRUD Kursus (Otomatis menghubungkan ke index, create, store, show, edit, update, destroy)
Route::resource('courses', CourseController::class);

Route::resource('enrollments', EnrollmentController::class)->only(['index', 'create', 'store']);