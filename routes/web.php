<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute untuk halaman utama / beranda
Route::get('/', function () {
    return view('welcome'); 
})->name('home');

// Rute untuk halaman pendaftaran (Tombol "Daftar Sekarang")
Route::get('/registration', function () {
    return view('registration'); 
})->name('registration');

Route::post('/enrollment/preview', [EnrollmentController::class, 'preview'])->name('enrollments.preview');