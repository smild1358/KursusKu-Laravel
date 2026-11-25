<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin &amp; Operator — KursusKu Laravel</title>

    <!-- Font & Icon -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        brand: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            500: '#14b8a6',
                            600: '#0d9488',
                            700: '#0f766e',
                            800: '#115e59',
                            900: '#134e4a',
                            950: '#042f2e',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-800 antialiased font-sans selection:bg-brand-500 selection:text-white">

    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-12">

        <!-- PANEL KIRI: WORKSPACE BRANDING (DARK TEAL GRADIENT) -->
        <aside class="hidden lg:flex lg:col-span-5 bg-gradient-to-br from-brand-950 via-brand-900 to-slate-900 text-white p-12 flex-col justify-between relative overflow-hidden">
            <!-- Dekorasi Cahaya Halus -->
            <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-brand-500/10 blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full bg-teal-400/10 blur-3xl pointer-events-none"></div>

            <!-- Logo Brand -->
            <div class="relative z-10">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-brand-600 to-brand-400 flex items-center justify-center text-white shadow-lg shadow-brand-500/30 group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-graduation-cap text-xl"></i>
                    </div>
                    <div>
                        <span class="text-xl font-extrabold tracking-tight text-white">KursusKu</span>
                        <span class="block text-[10px] uppercase tracking-widest text-teal-300/80 font-semibold">Academic &amp; Course Workspace</span>
                    </div>
                </a>
            </div>

            <!-- Headline & Kartu Ringkasan Sistem -->
            <div class="relative z-10 space-y-8 my-auto">
                <div class="space-y-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/15 text-teal-200 text-xs font-bold uppercase tracking-wider">
                        <i class="fa-solid fa-sparkles text-[10px]"></i> Workspace Terintegrasi
                    </div>
                    <h2 class="text-4xl xl:text-5xl font-extrabold leading-tight tracking-tight">
                        Setiap kelas.<br>
                        Setiap progres.<br>
                        <span class="text-teal-300">Lebih terarah.</span>
                    </h2>
                    <p class="text-sm text-teal-100/80 leading-relaxed max-w-md">
                        Kelola katalog program pelatihan, pendaftaran peserta, relasi enrollment, dan hak akses administrator melalui satu dashboard terpadu.
                    </p>
                </div>

                <!-- Kartu Ringkasan Modul Aktif -->
                <div class="p-5 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-md space-y-3">
                    <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider text-teal-300">
                        <span>Ringkasan Modul Sistem</span>
                        <span class="inline-flex items-center gap-1.5 text-emerald-300">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Aktif
                        </span>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 flex items-center gap-3.5">
                        <div class="w-9 h-9 rounded-xl bg-brand-500/20 text-teal-300 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-white">Katalog &amp; Relasi Enrollment</div>
                            <div class="text-xs text-teal-100/70">Manajemen kuota, validasi duplikasi &amp; pencarian real-time</div>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 flex items-center gap-3.5">
                        <div class="w-9 h-9 rounded-xl bg-brand-500/20 text-teal-300 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-white">Autentikasi &amp; Kontrol Role</div>
                            <div class="text-xs text-teal-100/70">Proteksi sesi Admin &amp; Operator berbasis database</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Panel Kiri -->
            <div class="relative z-10 flex items-center justify-between text-xs text-teal-200/60 border-t border-white/10 pt-5">
                <span>&copy; 2026 KursusKu Platform</span>
                <span class="font-mono">UAS Project Akhir</span>
            </div>
        </aside>

        <!-- PANEL KANAN: FORMULIR LOGIN -->
        <main class="lg:col-span-7 flex flex-col justify-between p-6 sm:p-10 lg:px-16 bg-gradient-to-br from-slate-50 via-teal-50/25 to-slate-100">
            
            <!-- Navigasi Atas -->
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-600 hover:text-brand-700 transition">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
                </a>
                <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-brand-50 border border-brand-200 text-brand-700 text-xs font-bold hover:bg-brand-100 transition">
                    <span>Katalog Kursus</span>
                    <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                </a>
            </div>

            <!-- Kontainer Utama Form -->
            <div class="w-full max-w-md mx-auto my-auto py-8">
                <div class="mb-7">
                    <span class="inline-block px-3 py-1 rounded-full bg-brand-100/80 text-brand-800 text-[11px] font-extrabold uppercase tracking-wider mb-3">
                        Akses Administrator &amp; Operator
                    </span>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                        Selamat datang <span class="inline-block animate-bounce">👋</span>
                    </h1>
                    <p class="text-slate-500 text-sm mt-1.5">
                        Masuk ke dashboard Anda untuk mengelola program kursus dan aktivitas pendaftaran.
                    </p>
                </div>

                <!-- Notifikasi Sukses (misal setelah Logout atau Reset Password) -->
                @if (session('success'))
                    <div class="mb-5 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center gap-2.5 shadow-sm">
                        <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Notifikasi Error Login -->
                @if ($errors->any())
                    <div class="mb-5 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold flex items-center gap-2.5 shadow-sm">
                        <i class="fa-solid fa-circle-exclamation text-rose-600 text-base"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                    @csrf

                    <!-- Input Username atau Email -->
                    <div class="space-y-1.5">
                        <label for="login" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            Username atau Email
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 pointer-events-none">
                                <i class="fa-regular fa-user text-sm"></i>
                            </span>
                            <input type="text" id="login" name="login" value="{{ old('login') }}" required autofocus
                                class="w-full pl-11 pr-4 py-3.5 bg-white border @error('login') border-rose-500 @else border-slate-200 @enderror rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-600 shadow-sm transition"
                                placeholder="Masukkan username atau email (misal: admin)">
                        </div>
                    </div>

                    <!-- Input Password + Fitur Hiding Password (Lihat / Sembunyikan) -->
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Password
                            </label>
                            <a href="{{ route('password.request') }}" class="text-xs font-bold text-brand-700 hover:text-brand-800 hover:underline transition">
                                Lupa password?
                            </a>
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 pointer-events-none">
                                <i class="fa-solid fa-lock text-sm"></i>
                            </span>
                            <input type="password" id="password" name="password" required
                                class="w-full pl-11 pr-24 py-3.5 bg-white border @error('password') border-rose-500 @else border-slate-200 @enderror rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-600 shadow-sm transition"
                                placeholder="Masukkan password">
                            <button type="button" id="toggle-password"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center gap-1.5 text-xs font-bold text-brand-700 hover:text-brand-900 focus:outline-none">
                                <i id="toggle-password-icon" class="fa-regular fa-eye"></i>
                                <span id="toggle-password-text">Lihat</span>
                            </button>
                        </div>
                    </div>

                    <!-- Checkbox Remember Password -->
                    <div class="flex items-center justify-between pt-1">
                        <label class="inline-flex items-center gap-2.5 cursor-pointer select-none">
                            <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}
                                class="w-4 h-4 rounded border-slate-300 text-brand-700 focus:ring-brand-600">
                            <span class="text-xs font-semibold text-slate-600">Ingat sesi login saya (*Remember Password*)</span>
                        </label>
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit"
                        class="w-full py-3.5 px-6 rounded-2xl bg-gradient-to-r from-brand-700 to-brand-600 hover:from-brand-800 hover:to-brand-700 text-white font-bold text-sm shadow-lg shadow-brand-700/25 hover:shadow-xl transition-all flex items-center justify-center gap-2">
                        <span>Masuk ke Dashboard</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </form>

                <!-- Pembatas & Kartu Akses Cepat / Info Pengunjung -->
                <div class="my-6 flex items-center gap-3 text-xs text-slate-400">
                    <div class="h-px bg-slate-200 flex-grow"></div>
                    <span>atau akses cepat</span>
                    <div class="h-px bg-slate-200 flex-grow"></div>
                </div>

                <a href="{{ route('home') }}" class="block p-4 rounded-2xl bg-white/80 hover:bg-white border border-slate-200/90 hover:border-brand-300 shadow-sm transition group">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-700 flex items-center justify-center text-base border border-brand-100">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                            <div>
                                <div class="text-sm font-bold text-slate-900 group-hover:text-brand-700 transition">Halaman Pengunjung / Peserta</div>
                                <div class="text-xs text-slate-500">Lihat katalog kursus tanpa perlu login staf</div>
                            </div>
                        </div>
                        <i class="fa-solid fa-arrow-up-right-from-square text-xs text-slate-400 group-hover:text-brand-700 transition"></i>
                    </div>
                </a>

                <p class="text-center text-[11px] text-slate-400 mt-5 flex items-center justify-center gap-1.5">
                    <i class="fa-solid fa-shield-check text-brand-600"></i>
                    <span>Akses staf dilindungi enkripsi password database &amp; CSRF token</span>
                </p>
            </div>

            <!-- Footer Panel Kanan -->
            <footer class="text-center text-xs text-slate-400 pt-4">
                &copy; 2026 KursusKu — UIN Sjech M. Djamil Djambek Bukittinggi
            </footer>
        </main>
    </div>

    <!-- Script Toggle Hiding Password -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('password');
            const toggleBtn     = document.getElementById('toggle-password');
            const toggleIcon    = document.getElementById('toggle-password-icon');
            const toggleText    = document.getElementById('toggle-password-text');

            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', function () {
                    const isHidden = passwordInput.type === 'password';
                    passwordInput.type = isHidden ? 'text' : 'password';
                    toggleIcon.className = isHidden ? 'fa-regular fa-eye-slash' : 'fa-regular fa-eye';
                    toggleText.textContent = isHidden ? 'Sembunyi' : 'Lihat';
                });
            }
        });
    </script>
</body>
</html>