<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // Menampilkan halaman Login
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.profile');
        }

        return view('auth.login');
    }

    // Memproses Login dengan Username atau Email + Remember Me
    public function login(Request $request)
    {
        $request->validate([
            'login'    => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'login.required'    => 'Username atau email wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $loginInput = trim((string) $request->input('login'));
        $fieldType  = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $remember   = $request->boolean('remember');

        $user = User::where($fieldType, $loginInput)->first();

        if ($user && $user->status !== 'aktif') {
            return back()
                ->withInput($request->only('login', 'remember'))
                ->withErrors(['login' => 'Akun Anda sedang dinonaktifkan. Hubungi Administrator.']);
        }

        if (Auth::attempt([$fieldType => $loginInput, 'password' => $request->input('password')], $remember)) {
            $request->session()->regenerate();

            /** @var User $authenticatedUser */
            $authenticatedUser = Auth::user();
            $authenticatedUser->update(['last_login_at' => now()]);

            return redirect()->intended(route('admin.profile'))
                ->with('success', 'Selamat datang kembali, ' . $authenticatedUser->name . '!');
        }

        return back()
            ->withInput($request->only('login', 'remember'))
            ->withErrors(['login' => 'Username/email atau password yang Anda masukkan salah.']);
    }

    // Menampilkan halaman Lupa Password
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Memproses Reset Password berdasarkan verifikasi Email & Username
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email', 'exists:users,email'],
            'username' => ['required', 'string'],
            'password' => ['required', 'confirmed', $this->strongPasswordRule()],
        ], [
            'email.exists'       => 'Email tidak terdaftar dalam sistem.',
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        ]);

        $user = User::where('email', trim((string) $request->input('email')))
            ->where('username', trim((string) $request->input('username')))
            ->first();

        if (!$user) {
            return back()
                ->withInput($request->only('email', 'username'))
                ->withErrors(['username' => 'Kombinasi email dan username tidak cocok dengan data akun.']);
        }

        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('login')
            ->with('success', 'Password berhasil diperbarui! Silakan login dengan password baru Anda.');
    }

    // Menampilkan halaman Profil Saya setelah berhasil login
    public function profile()
    {
        /** @var User $user */
        $user = Auth::user();

        return view('admin.profile', compact('user'));
    }

    // Memperbarui Identitas & Kontak pada halaman Profil Saya
    public function updateProfile(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'username'    => ['required', 'string', 'max:50', Rule::unique('users', 'username')->ignore($user->id)],
            'email'       => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'phone'       => ['nullable', 'string', 'max:25'],
            'position'    => ['nullable', 'string', 'max:100'],
            'institution' => ['nullable', 'string', 'max:150'],
            'address'     => ['nullable', 'string', 'max:500'],
        ]);

        $validated['username'] = trim((string) $validated['username']);
        $validated['email']    = trim((string) $validated['email']);

        $user->update($validated);

        return back()->with('success', 'Identitas & kontak profil Anda berhasil diperbarui.');
    }

    // Memperbarui Password dari halaman Profil Saya
    public function updatePassword(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password'         => ['required', 'confirmed', $this->strongPasswordRule()],
        ], [
            'current_password.current_password' => 'Password saat ini tidak sesuai.',
            'password.confirmed'                => 'Konfirmasi password baru tidak cocok.',
        ]);

        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return back()->with('success', 'Password keamanan akun berhasil diperbarui!');
    }

    // Proses Logout aman
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda telah berhasil keluar (logout) dari sesi sistem.');
    }

    // Aturan kekuatan password seragam (min 8 karakter, huruf besar-kecil, angka, dan simbol)
    private function strongPasswordRule(): Password
    {
        return Password::min(8)
            ->mixedCase()
            ->numbers()
            ->symbols();
    }
}