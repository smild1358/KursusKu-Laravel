<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — KursusKu Laravel Platform
|--------------------------------------------------------------------------
| Seluruh rute utama beranda, pendaftaran, katalog & enrollment, serta
| autentikasi & manajemen profil administrator/operator KursusKu.
*/

// ==========================================
// RUTE UTAMA BERANDA & PENDAFTARAN AWAL
// ==========================================
Route::get('/', function () {
    $courses = Course::latest()->take(6)->get();

    return view('welcome', compact('courses'));
})->name('home');

Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::post('/enrollment/preview', [EnrollmentController::class, 'preview'])
    ->name('enrollments.preview');

// ==========================================
// AUTENTIKASI & PEMULIHAN AKUN (GUEST & LOGOUT)
// ==========================================
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:10,1')
    ->name('login.post');

Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])
    ->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'resetPassword'])
    ->middleware('throttle:10,1')
    ->name('password.reset.custom');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// ==========================================
// PROFIL PENGGUNA TERPROTEKSI LOGIN (AUTH)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [AuthController::class, 'profile'])
        ->name('admin.profile');
    Route::put('/admin/profile', [AuthController::class, 'updateProfile'])
        ->name('admin.profile.update');
    Route::put('/admin/profile/password', [AuthController::class, 'updatePassword'])
        ->name('admin.profile.password');
});

// ==========================================
// KATALOG KURSUS & ENROLLMENT (CRUD & DATA DISCOVERY)
// ==========================================
Route::resource('courses', CourseController::class);

Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);