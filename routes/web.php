use Illuminate\Support\Facades\Route;

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
    return view('welcome'); // Pastikan Anda memiliki file resources/views/welcome.blade.php
});

// Rute untuk halaman pendaftaran (Tombol "Daftar Sekarang")
Route::get('/registration', function () {
    return view('registration'); // Pastikan Anda membuat file resources/views/registration.blade.php
})->name('registration');

// Atau jika Anda menggunakan Controller untuk proses pendaftaran, gunakan format seperti di bawah ini:
// use App\Http\Controllers\RegistrationController;
// Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');