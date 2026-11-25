<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Saya — KursusKu Laravel</title>

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
                            50: '#f0fdfa', 100: '#ccfbf1', 500: '#14b8a6',
                            600: '#0d9488', 700: '#0f766e', 800: '#115e59', 900: '#134e4a'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-nav {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(20, 184, 166, 0.2);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-teal-50/30 to-slate-100 text-slate-800 antialiased min-h-screen flex flex-col justify-between font-sans selection:bg-brand-500 selection:text-white">

    <!-- NAVBAR -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-nav border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-700 to-brand-500 flex items-center justify-center text-white shadow-md shadow-brand-700/20 group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-graduation-cap text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-brand-900 to-brand-600 bg-clip-text text-transparent">KursusKu</span>
                        <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Workspace Administrator</span>
                    </div>
                </a>

                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-brand-50/50 transition">Beranda</a>
                    <a href="{{ route('courses.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-brand-50/50 transition">Course</a>
                    <a href="{{ route('enrollments.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-brand-50/50 transition">Enrollment</a>
                    <a href="{{ route('admin.profile') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold text-brand-700 bg-brand-50 border border-brand-100">Profil Saya</a>
                </nav>

                <!-- Dropdown Akun (6 Menu Pilihan) & Tombol Logout -->
                <div class="flex items-center gap-3">
                    <!-- DROPDOWN AKUN PENGGUNA (6 MENU PILIHAN) -->
                    <div class="relative" id="profile-dropdown-wrapper">
                        <button type="button" id="profile-dropdown-btn"
                            aria-expanded="false"
                            aria-controls="profile-dropdown-menu"
                            class="inline-flex items-center gap-2.5 px-3.5 py-2 rounded-2xl bg-slate-900/95 hover:bg-brand-900 text-white border border-teal-500/30 shadow-md shadow-slate-900/15 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            <span class="w-7 h-7 rounded-xl bg-gradient-to-tr from-brand-500 to-teal-300 text-slate-950 text-xs font-extrabold flex items-center justify-center shadow-sm">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </span>
                            <span class="text-xs font-bold tracking-tight">{{ $user->name }}</span>
                            <i id="profile-dropdown-chevron" class="fa-solid fa-chevron-down text-[10px] text-teal-300 transition-transform duration-200"></i>
                        </button>

                        <!-- Panel Dropdown Glassmorphism -->
                        <div id="profile-dropdown-menu"
                            class="hidden origin-top-right absolute right-0 mt-2.5 w-64 rounded-2xl bg-white/95 backdrop-blur-xl border border-teal-200/70 shadow-2xl shadow-slate-900/15 py-2 z-50 text-slate-700">

                            <!-- Header Info Akun di Dalam Dropdown -->
                            <div class="px-4 py-2.5 border-b border-slate-100 bg-brand-50/40">
                                <p class="text-xs font-extrabold text-slate-900 truncate">{{ $user->name }}</p>
                                <p class="text-[11px] font-mono text-brand-700 truncate">{{ $user->email }}</p>
                            </div>

                            <div class="p-1.5 space-y-0.5 text-xs font-semibold">
                                <!-- 1. Dashboard Admin -->
                                <a href="{{ route('courses.index') }}"
                                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-brand-50 hover:text-brand-800 transition">
                                    <span class="w-7 h-7 rounded-lg bg-teal-50 text-brand-700 flex items-center justify-center border border-teal-100">
                                        <i class="fa-solid fa-gauge-high text-xs"></i>
                                    </span>
                                    <span>Dashboard Admin</span>
                                </a>

                                <!-- 2. Profil Saya -->
                                <a href="{{ route('admin.profile') }}"
                                    class="flex items-center justify-between px-3 py-2.5 rounded-xl bg-brand-50/90 text-brand-800 border border-brand-200/60 transition">
                                    <span class="flex items-center gap-3">
                                        <span class="w-7 h-7 rounded-lg bg-brand-700 text-white flex items-center justify-center">
                                            <i class="fa-solid fa-user-gear text-xs"></i>
                                        </span>
                                        <span>Profil Saya</span>
                                    </span>
                                    <span class="text-[10px] font-bold uppercase px-1.5 py-0.5 rounded bg-brand-100 text-brand-700">Aktif</span>
                                </a>

                                <!-- 3. Kelola Kursus -->
                                <a href="{{ route('courses.index') }}"
                                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-brand-50 hover:text-brand-800 transition">
                                    <span class="w-7 h-7 rounded-lg bg-teal-50 text-brand-700 flex items-center justify-center border border-teal-100">
                                        <i class="fa-solid fa-book-open-reader text-xs"></i>
                                    </span>
                                    <span>Kelola Kursus</span>
                                </a>

                                <!-- 4. Pendaftaran & Enrollment -->
                                <a href="{{ route('enrollments.index') }}"
                                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-brand-50 hover:text-brand-800 transition">
                                    <span class="w-7 h-7 rounded-lg bg-teal-50 text-brand-700 flex items-center justify-center border border-teal-100">
                                        <i class="fa-solid fa-clipboard-list text-xs"></i>
                                    </span>
                                    <span>Pendaftaran</span>
                                </a>

                                <!-- 5. Beranda Utama -->
                                <a href="{{ route('home') }}"
                                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-brand-50 hover:text-brand-800 transition">
                                    <span class="w-7 h-7 rounded-lg bg-teal-50 text-brand-700 flex items-center justify-center border border-teal-100">
                                        <i class="fa-solid fa-house text-xs"></i>
                                    </span>
                                    <span>Beranda</span>
                                </a>

                                <div class="my-1.5 border-t border-slate-100"></div>

                                <!-- 6. Logout -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-rose-700 hover:bg-rose-50 hover:text-rose-800 font-bold transition text-left">
                                        <span class="w-7 h-7 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center border border-rose-100">
                                            <i class="fa-solid fa-right-from-bracket text-xs"></i>
                                        </span>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-rose-50 hover:bg-rose-600 text-rose-700 hover:text-white border border-rose-200 hover:border-rose-600 text-xs font-bold transition shadow-sm">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- KONTEN UTAMA PROFIL SAYA -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16 w-full">

        <!-- Header Profil -->
        <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <span class="text-brand-600 font-bold text-xs uppercase tracking-widest">My Profile</span>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mt-0.5">Profil Saya</h1>
                <p class="text-slate-500 text-sm mt-1">Perbarui identitas, kontak, email login, dan password keamanan akun Anda.</p>
            </div>
            <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 font-bold text-xs shadow-sm transition">
                <i class="fa-solid fa-table-columns text-brand-600"></i> Kembali ke Dashboard Kursus
            </a>
        </div>

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium flex items-center shadow-sm">
                <i class="fa-solid fa-circle-check text-emerald-600 text-lg mr-3"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs space-y-1 shadow-sm">
                <div class="font-bold text-rose-700"><i class="fa-solid fa-triangle-exclamation mr-1.5"></i> Perhatian Validasi:</div>
                @foreach ($errors->all() as $error)
                    <div class="pl-5">&bull; {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- Grid 2 Kolom (Identitas Kiri + Informasi Akses & Ganti Password Kanan) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

            <!-- KOLOM KIRI: IDENTITAS & KONTAK -->
            <section class="lg:col-span-7 glass-card p-6 sm:p-8 rounded-3xl shadow-xl shadow-slate-200/50 bg-white">
                <div class="flex items-center gap-4 pb-6 mb-6 border-b border-slate-100">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-brand-700 to-brand-500 text-white text-xl font-extrabold flex items-center justify-center shadow-md">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                        <h2 class="text-lg font-extrabold text-slate-900">Identitas &amp; Kontak</h2>
                        <p class="text-xs text-slate-400">Role tidak dapat diubah dari halaman profil pribadi.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.profile.update') }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-xs font-bold text-slate-700 mb-1.5">Nama Lengkap *</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                                class="w-full px-4 py-3 bg-slate-50/70 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600">
                        </div>
                        <div>
                            <label for="username" class="block text-xs font-bold text-slate-700 mb-1.5">Username Login *</label>
                            <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required
                                class="w-full px-4 py-3 bg-slate-50/70 border border-slate-200 rounded-xl text-sm font-mono focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="email" class="block text-xs font-bold text-slate-700 mb-1.5">Email Login *</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                                class="w-full px-4 py-3 bg-slate-50/70 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600">
                            <p class="text-[11px] text-slate-400 mt-1">Setelah disimpan, email baru digunakan pada login berikutnya.</p>
                        </div>
                        <div>
                            <label for="phone" class="block text-xs font-bold text-slate-700 mb-1.5">Nomor HP</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                                class="w-full px-4 py-3 bg-slate-50/70 border border-slate-200 rounded-xl text-sm font-mono focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600"
                                placeholder="Contoh: 081234567890">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="position" class="block text-xs font-bold text-slate-700 mb-1.5">Jabatan</label>
                            <input type="text" id="position" name="position" value="{{ old('position', $user->position) }}"
                                class="w-full px-4 py-3 bg-slate-50/70 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600"
                                placeholder="Administrator Sistem">
                        </div>
                        <div>
                            <label for="institution" class="block text-xs font-bold text-slate-700 mb-1.5">Instansi / Unit</label>
                            <input type="text" id="institution" name="institution" value="{{ old('institution', $user->institution) }}"
                                class="w-full px-4 py-3 bg-slate-50/70 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600"
                                placeholder="KursusKu">
                        </div>
                    </div>

                    <div>
                        <label for="address" class="block text-xs font-bold text-slate-700 mb-1.5">Alamat</label>
                        <textarea id="address" name="address" rows="3"
                            class="w-full px-4 py-3 bg-slate-50/70 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600"
                            placeholder="Alamat lengkap instansi atau domisili">{{ old('address', $user->address) }}</textarea>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="px-6 py-3 rounded-xl bg-gradient-to-r from-brand-700 to-brand-600 hover:from-brand-800 hover:to-brand-700 text-white font-bold text-sm shadow-md shadow-brand-700/20 transition">
                            <i class="fa-solid fa-floppy-disk mr-1.5"></i> Simpan Perubahan Profil
                        </button>
                    </div>
                </form>
            </section>

            <!-- KOLOM KANAN: INFORMASI AKSES & GANTI PASSWORD -->
            <div class="lg:col-span-5 space-y-6">

                <!-- KARTU INFORMASI AKSES -->
                <section class="glass-card p-6 sm:p-8 rounded-3xl shadow-xl shadow-slate-200/50 bg-white">
                    <span class="text-[11px] font-extrabold uppercase tracking-widest text-brand-600">Account Access</span>
                    <h2 class="text-lg font-extrabold text-slate-900 mt-0.5 mb-5">Informasi Akses</h2>

                    <div class="space-y-3.5 text-sm">
                        <div class="flex items-center justify-between py-2 border-b border-slate-100">
                            <span class="text-slate-500 font-medium">Role</span>
                            <span class="px-3 py-1 rounded-lg bg-slate-900 text-white text-xs font-bold uppercase tracking-wider">
                                {{ ucfirst($user->role) }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-slate-100">
                            <span class="text-slate-500 font-medium">Status</span>
                            <span class="px-3 py-1 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-bold uppercase">
                                {{ ucfirst($user->status) }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between py-2">
                            <span class="text-slate-500 font-medium">Login terakhir</span>
                            <span class="font-mono text-xs font-bold text-slate-700">
                                {{ optional($user->last_login_at)->format('d/m/Y H:i') ?? now()->format('d/m/Y H:i') }}
                            </span>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('logout') }}" class="mt-6 pt-4 border-t border-slate-100">
                        @csrf
                        <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-rose-50 hover:bg-rose-600 text-rose-700 hover:text-white border border-rose-200 hover:border-rose-600 text-xs font-bold transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Keluar dari Sesi (Logout)</span>
                        </button>
                    </form>
                </section>

                <!-- KARTU SECURITY: GANTI PASSWORD -->
                <section class="glass-card p-6 sm:p-8 rounded-3xl shadow-xl shadow-slate-200/50 bg-white">
                    <span class="text-[11px] font-extrabold uppercase tracking-widest text-brand-600">Security</span>
                    <h2 class="text-lg font-extrabold text-slate-900 mt-0.5">Ganti Password</h2>
                    <p class="text-xs text-slate-400 mt-1 mb-5">
                        Password baru minimal 8 karakter serta mengandung huruf besar-kecil, angka, dan simbol.
                    </p>

                    <form method="POST" action="{{ route('admin.profile.password') }}" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="current_password" class="block text-xs font-bold text-slate-700 mb-1">Password Saat Ini</label>
                            <div class="relative">
                                <input type="password" id="current_password" name="current_password" required
                                    class="w-full px-4 py-3 pr-12 bg-slate-50/70 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600">
                                <button type="button" data-target="current_password" class="pw-toggle absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-brand-700">
                                    <i class="fa-regular fa-eye text-xs"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label for="new_password" class="block text-xs font-bold text-slate-700 mb-1">Password Baru</label>
                            <div class="relative">
                                <input type="password" id="new_password" name="password" required
                                    class="w-full px-4 py-3 pr-12 bg-slate-50/70 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600">
                                <button type="button" data-target="new_password" class="pw-toggle absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-brand-700">
                                    <i class="fa-regular fa-eye text-xs"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label for="new_password_confirmation" class="block text-xs font-bold text-slate-700 mb-1">Konfirmasi Password Baru</label>
                            <div class="relative">
                                <input type="password" id="new_password_confirmation" name="password_confirmation" required
                                    class="w-full px-4 py-3 pr-12 bg-slate-50/70 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600">
                                <button type="button" data-target="new_password_confirmation" class="pw-toggle absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-brand-700">
                                    <i class="fa-regular fa-eye text-xs"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-3 px-5 rounded-xl bg-slate-900 hover:bg-brand-800 text-white font-bold text-sm shadow-md transition">
                            <i class="fa-solid fa-shield-halved mr-1.5"></i> Perbarui Password
                        </button>
                    </form>
                </section>

            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-400 py-8 text-center text-xs border-t border-slate-800">
        <p>&copy; 2026 <strong>KursusKu Laravel Platform</strong>. Hak Cipta Dilindungi.</p>
    </footer>

    <!-- Script Dropdown 6 Menu Pilihan & Show/Hide Password -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const wrapper = document.getElementById('profile-dropdown-wrapper');
            const btn     = document.getElementById('profile-dropdown-btn');
            const menu    = document.getElementById('profile-dropdown-menu');
            const chevron = document.getElementById('profile-dropdown-chevron');

            if (btn && menu && wrapper) {
                btn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    const isHidden = menu.classList.contains('hidden');
                    menu.classList.toggle('hidden', !isHidden);
                    btn.setAttribute('aria-expanded', String(isHidden));
                    if (chevron) {
                        chevron.classList.toggle('rotate-180', isHidden);
                    }
                });

                document.addEventListener('click', function (e) {
                    if (!wrapper.contains(e.target)) {
                        menu.classList.add('hidden');
                        btn.setAttribute('aria-expanded', 'false');
                        if (chevron) {
                            chevron.classList.remove('rotate-180');
                        }
                    }
                });

                document.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape') {
                        menu.classList.add('hidden');
                        btn.setAttribute('aria-expanded', 'false');
                        if (chevron) {
                            chevron.classList.remove('rotate-180');
                        }
                    }
                });
            }

            document.querySelectorAll('.pw-toggle').forEach(btnPw => {
                btnPw.addEventListener('click', function () {
                    const target = document.getElementById(this.getAttribute('data-target'));
                    const icon = this.querySelector('i');
                    if (target) {
                        const isHidden = target.type === 'password';
                        target.type = isHidden ? 'text' : 'password';
                        if (icon) {
                            icon.className = isHidden ? 'fa-regular fa-eye-slash text-xs' : 'fa-regular fa-eye text-xs';
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>