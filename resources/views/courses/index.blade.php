<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar &amp; Pencarian Kursus — KursusKu Laravel</title>

    <!-- Font & Icon -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS & jQuery CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(20, 184, 166, 0.22);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-teal-50/30 to-slate-100 text-slate-800 antialiased min-h-screen flex flex-col justify-between font-sans selection:bg-brand-500 selection:text-white">

    <!-- SITE HEADER & NAVBAR -->
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
                        <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Minggu 13 — Data Discovery &amp; Ajax</span>
                    </div>
                </a>

                <!-- Navigation Desktop -->
                <nav class="hidden lg:flex items-center space-x-1" aria-label="Navigasi utama">
                    <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-brand-50/60 transition-all">Beranda</a>
                    <a href="{{ route('courses.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold text-brand-700 bg-brand-50 border border-brand-100">Daftar Kursus</a>
                    <a href="{{ route('enrollments.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-brand-50/60 transition-all">Laporan Enrollment</a>
                </nav>

                <!-- Action Button Desktop -->
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('courses.create') }}" class="relative inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white bg-gradient-to-r from-brand-700 to-brand-600 rounded-xl shadow-md shadow-brand-700/20 hover:shadow-lg hover:shadow-glow hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                        <i class="fa-solid fa-plus mr-2 text-xs"></i>
                        <span>Tambah Kursus</span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" type="button" class="lg:hidden p-2 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none" aria-label="Buka menu navigasi">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden lg:hidden border-b border-slate-200 bg-white/95 backdrop-blur-md px-4 pt-2 pb-6 space-y-2">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-600 hover:bg-slate-50">Beranda</a>
            <a href="{{ route('courses.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-brand-700 bg-brand-50">Daftar Kursus</a>
            <a href="{{ route('enrollments.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-600 hover:bg-slate-50">Laporan Enrollment</a>
            <a href="{{ route('courses.create') }}" class="block w-full text-center mt-4 px-5 py-3 text-base font-bold text-white bg-brand-700 hover:bg-brand-800 rounded-xl shadow-md transition">Tambah Kursus</a>
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16 w-full">

        <!-- Header & Tombol Tambah -->
        <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 border border-brand-200/70 text-brand-700 text-xs font-bold uppercase tracking-wider mb-2">
                    <i class="fa-solid fa-magnifying-glass-chart"></i> Milestone 13 — Data Discovery KursusKu
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Katalog &amp; Manajemen Kursus</h1>
                <p class="text-slate-500 text-sm mt-1">Pencarian real-time, filter status, dan pagination server-side dengan progressive enhancement Ajax.</p>
            </div>
            <a href="{{ route('courses.create') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-brand-700 to-brand-600 hover:from-brand-800 hover:to-brand-700 text-white font-bold text-sm shadow-lg shadow-brand-700/25 transition-all shrink-0">
                <i class="fa-solid fa-plus text-xs"></i> Tambah Kursus Baru
            </a>
        </div>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium flex items-center shadow-sm">
                <i class="fa-solid fa-circle-check text-emerald-600 text-lg mr-3"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Dashboard Count (Tambahan Proyek Milestone 13) -->
        @if (isset($stats))
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="glass-card p-5 rounded-2xl shadow-glass bg-white flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-700 flex items-center justify-center text-xl border border-brand-100 shrink-0">
                    <i class="fa-solid fa-layer-group"></i>
                </div>
                <div>
                    <div class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Course</div>
                    <div class="text-2xl font-extrabold text-slate-900 font-mono">{{ $stats['total_courses'] }}</div>
                </div>
            </div>
            <div class="glass-card p-5 rounded-2xl shadow-glass bg-white flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-xl border border-emerald-100 shrink-0">
                    <i class="fa-solid fa-door-open"></i>
                </div>
                <div>
                    <div class="text-xs font-bold uppercase tracking-wider text-slate-400">Course Open</div>
                    <div class="text-2xl font-extrabold text-emerald-700 font-mono">{{ $stats['open_courses'] }}</div>
                </div>
            </div>
            <div class="glass-card p-5 rounded-2xl shadow-glass bg-white flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-sky-50 text-sky-700 flex items-center justify-center text-xl border border-sky-100 shrink-0">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div>
                    <div class="text-xs font-bold uppercase tracking-wider text-slate-400">Participant</div>
                    <div class="text-2xl font-extrabold text-slate-900 font-mono">{{ $stats['total_participants'] }}</div>
                </div>
            </div>
            <div class="glass-card p-5 rounded-2xl shadow-glass bg-white flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center text-xl border border-amber-100 shrink-0">
                    <i class="fa-solid fa-file-signature"></i>
                </div>
                <div>
                    <div class="text-xs font-bold uppercase tracking-wider text-slate-400">Enrollment</div>
                    <div class="text-2xl font-extrabold text-slate-900 font-mono">{{ $stats['total_enrollments'] }}</div>
                </div>
            </div>
        </div>
        @endif

        <!-- FORM SEARCH & FILTER (GET METHOD — TETAP BEKERJA TANPA JAVASCRIPT) -->
        <div class="glass-card p-5 rounded-3xl shadow-glass bg-white mb-6">
            <form id="course-filter-form" method="GET" action="{{ route('courses.index') }}" class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
                <!-- Input Search q -->
                <div class="md:col-span-6 relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass text-sm"></i>
                    </span>
                    <input type="search" id="live-search" name="q" value="{{ $search ?? '' }}"
                        class="w-full pl-11 pr-10 py-3 bg-slate-50/70 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 transition"
                        placeholder="Cari kode (misal: LRV-101) atau nama kursus...">
                    <span id="ajax-spinner" class="hidden absolute inset-y-0 right-0 pr-3.5 flex items-center text-brand-600">
                        <i class="fa-solid fa-circle-notch fa-spin text-sm"></i>
                    </span>
                </div>

                <!-- Dropdown Filter Status -->
                <div class="md:col-span-3">
                    <select id="status-filter" name="status" class="w-full px-4 py-3 bg-slate-50/70 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 transition">
                        <option value="">Semua Status</option>
                        <option value="open" @selected(($status ?? '') === 'open')>Open (Tersedia)</option>
                        <option value="closed" @selected(($status ?? '') === 'closed')>Closed (Ditutup)</option>
                        <option value="draft" @selected(($status ?? '') === 'draft')>Draft (Konsep)</option>
                    </select>
                </div>

                <!-- Tombol Cari & Reset -->
                <div class="md:col-span-3 flex items-center gap-2">
                    <button type="submit" class="w-2/3 py-3 px-4 rounded-xl bg-brand-700 hover:bg-brand-800 text-white font-bold text-sm shadow-sm transition flex items-center justify-center gap-1.5">
                        <i class="fa-solid fa-search text-xs"></i> Cari
                    </button>
                    <a href="{{ route('courses.index') }}" class="w-1/3 py-3 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-sm text-center transition">
                        Reset
                    </a>
                </div>
            </form>
            <div id="ajax-error-banner" class="hidden mt-3 p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold">
                <i class="fa-solid fa-circle-exclamation mr-1.5"></i> Gagal memuat data secara Ajax. Silakan gunakan tombol Cari.
            </div>
        </div>

        <!-- AREA HASIL PARTIAL (TABEL + PAGINATION) -->
        @include('courses._results')

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
                        <li><a href="{{ route('enrollments.index') }}" class="hover:text-brand-500 transition">Laporan Enrollment</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Tugas Praktikum</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><span class="text-brand-400 font-medium">Tugas 13:</span> Pagination, Search &amp; Ajax</li>
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

    <!-- MOBILE MENU TOGGLE & JQUERY AJAX LIVE SEARCH (DEBOUNCE 300MS) + AJAX PAGINATION -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            if (btn && menu) {
                btn.addEventListener('click', function () {
                    menu.classList.toggle('hidden');
                });
            }
        });

        $(function () {
            let searchTimer;

            function loadCourses(url = "{{ route('courses.index') }}") {
                const q = $('#live-search').val();
                const status = $('#status-filter').val();

                $('#ajax-spinner').removeClass('hidden');
                $('#ajax-error-banner').addClass('hidden');

                $.get(url, { q: q, status: status, partial: 1 })
                    .done(function (html) {
                        $('#course-results').replaceWith(html);

                        const cleanUrl = new URL(url, window.location.origin);
                        if (q) cleanUrl.searchParams.set('q', q); else cleanUrl.searchParams.delete('q');
                        if (status) cleanUrl.searchParams.set('status', status); else cleanUrl.searchParams.delete('status');
                        cleanUrl.searchParams.delete('partial');
                        window.history.replaceState({}, '', cleanUrl.toString());
                    })
                    .fail(function () {
                        $('#ajax-error-banner').removeClass('hidden');
                    })
                    .always(function () {
                        $('#ajax-spinner').addClass('hidden');
                    });
            }

            $(document).on('input', '#live-search', function () {
                clearTimeout(searchTimer);
                searchTimer = setTimeout(function () {
                    loadCourses();
                }, 300);
            });

            $(document).on('change', '#status-filter', function () {
                loadCourses();
            });

            $(document).on('click', '#course-results .pagination-wrapper a', function (e) {
                e.preventDefault();
                const targetUrl = $(this).attr('href');
                if (targetUrl) {
                    loadCourses(targetUrl);
                }
            });
        });
    </script>
</body>
</html>