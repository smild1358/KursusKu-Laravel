<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Kursus - KursusKu</title>
    
    <!-- Font & Icon -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
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
                        }
                    },
                    boxShadow: {
                        'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.07)',
                        'glow': '0 0 20px rgba(15, 118, 110, 0.35)',
                    }
                }
            }
        }
    </script>
    <style>
        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(20, 184, 166, 0.2);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-teal-50/20 to-slate-100 text-slate-800 antialiased min-h-screen flex flex-col justify-between font-sans selection:bg-brand-500 selection:text-white">

    <!-- SITE HEADER & NAVBAR (Sama persis seperti halaman index) -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-nav border-b border-slate-200/80 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-700 to-brand-500 flex items-center justify-center text-white shadow-md shadow-brand-500/20 group-hover:scale-105 transition-transform duration-300">
                        <i class="fa-solid fa-graduation-cap text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-brand-900 via-brand-700 to-brand-600 bg-clip-text text-transparent">
                            KursusKu
                        </span>
                        <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Tugas 5 CRUD Lanjutan</span>
                    </div>
                </a>

                <!-- Navigation Desktop -->
                <nav class="hidden lg:flex items-center space-x-1" aria-label="Navigasi utama">
                    <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-slate-100/80 transition-all">Beranda</a>
                    <a href="{{ route('courses.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold text-brand-700 bg-brand-50/80">Daftar Kursus</a>
                </nav>

                <!-- Action Button -->
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('courses.index') }}" class="relative inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white bg-gradient-to-r from-brand-700 to-brand-600 rounded-xl shadow-md shadow-brand-700/20 hover:shadow-lg hover:shadow-brand-700/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                        <i class="fa-solid fa-arrow-left mr-2 text-xs"></i>
                        <span>Kembali ke Daftar</span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden lg:hidden border-b border-slate-200 bg-white/95 backdrop-blur-md px-4 pt-2 pb-6 space-y-2">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-600 hover:bg-slate-50">Beranda</a>
            <a href="{{ route('courses.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-brand-700 bg-brand-50">Daftar Kursus</a>
        </div>
    </header>

    <!-- KONTEN UTAMA FORM TAMBAH -->
    <main class="flex-grow max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16 w-full">
        <div class="glass-card p-8 rounded-3xl shadow-xl bg-white border border-slate-200">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <span class="text-brand-600 font-bold text-xs uppercase tracking-wider">Formulir Data</span>
                    <h1 class="text-2xl font-extrabold text-slate-900 mt-0.5">Tambah Kursus Baru</h1>
                </div>
                <a href="{{ route('courses.index') }}" class="text-xs font-semibold text-slate-500 hover:text-brand-700 transition">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('courses.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Kode Kursus</label>
                    <input type="text" name="code" value="{{ old('code') }}" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Contoh: WEB-101">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Kursus</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Contoh: Web Dasar">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Tuliskan deskripsi singkat...">{{ old('description') }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Biaya (Rp)</label>
                        <input type="number" name="fee" value="{{ old('fee') }}" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="200000">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Kuota Peserta</label>
                        <input type="number" name="quota" value="{{ old('quota') }}" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="25">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Tanggal Mulai</label>
                        <input type="date" name="start_date" value="{{ old('start_date') }}" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Status</label>
                        <select name="status" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
                            <option value="draft">Draft</option>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                </div>

                <div class="pt-4 flex items-center gap-3">
                    <a href="{{ route('courses.index') }}" class="w-1/3 py-2.5 px-4 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-sm text-center transition">
                        Batal
                    </a>
                    <button type="submit" class="w-2/3 py-2.5 px-4 rounded-xl bg-brand-700 text-white font-bold text-sm shadow-md hover:bg-brand-800 transition">
                        Simpan Kursus
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-400 pt-16 pb-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-slate-800">
                <div class="space-y-4 md:col-span-2">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-brand-600 flex items-center justify-center text-white">
                            <i class="fa-solid fa-graduation-cap text-lg"></i>
                        </div>
                        <span class="text-xl font-extrabold text-white">KursusKu Laravel</span>
                    </a>
                    <p class="text-sm text-slate-400 max-w-sm leading-relaxed">
                        Platform edukasi berbasis web modern untuk akselerasi talenta digital Indonesia melalui kurikulum berstandar industri.
                    </p>
                </div>

                <div>
                    <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Navigasi Utama</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-brand-500 transition">Beranda</a></li>
                        <li><a href="{{ route('courses.index') }}" class="hover:text-brand-500 transition">Daftar Kursus</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Tugas Praktikum</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><span class="text-brand-400 font-medium">Tugas 5:</span> CRUD Lanjutan &amp; Eloquent</li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 gap-4">
                <p>&copy; 2026 KursusKu Laravel Platform. All rights reserved.</p>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-white transition"><i class="fa-brands fa-github text-base"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fa-brands fa-linkedin text-base"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fa-brands fa-instagram text-base"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Interactive Toggle Script for Mobile Menu -->
    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>