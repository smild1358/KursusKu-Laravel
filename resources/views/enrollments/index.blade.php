<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Enrollment Kursus — KursusKu</title>
    
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
                        mono: ['JetBrains Mono', 'monospace']
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
        .glass-nav { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); }
        .glass-card { background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(16px); border: 1px solid rgba(20, 184, 166, 0.22); }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-teal-50/30 to-slate-100 text-slate-800 antialiased min-h-screen flex flex-col justify-between font-sans">

    <!-- NAVBAR -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-nav border-b border-slate-200/80 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-700 to-brand-500 flex items-center justify-center text-white shadow-md shadow-brand-600/20 group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-graduation-cap text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-brand-900 to-brand-600 bg-clip-text text-transparent">KursusKu</span>
                        <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Minggu 12 — Relational Core &amp; Eager Loading</span>
                    </div>
                </a>
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-brand-50/50 transition">Beranda</a>
                    <a href="{{ route('courses.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-brand-50/50 transition">Daftar Kursus</a>
                    <a href="{{ route('enrollments.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold text-brand-700 bg-brand-50 border border-brand-100">Laporan Enrollment</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- KONTEN UTAMA LAPORAN -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16 w-full">
        
        <!-- Header Halaman -->
        <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 border border-brand-200/70 text-brand-700 text-xs font-bold uppercase tracking-wider mb-2">
                    <i class="fa-solid fa-database"></i> Relasi Database &amp; Eloquent Eager Loading
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Laporan Enrollment Kursus</h1>
                <p class="text-slate-500 text-sm mt-1">Gabungan data lintas entitas (Participant, Course, Tanggal Mulai, dan Status Pendaftaran).</p>
            </div>
            <a href="{{ route('enrollments.create') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-brand-700 to-brand-600 hover:from-brand-800 hover:to-brand-700 text-white font-bold text-sm shadow-lg shadow-brand-700/25 transition-all shrink-0">
                <i class="fa-solid fa-plus text-xs"></i> Tambah Enrollment Baru
            </a>
        </div>

        <!-- Flash Message Sukses -->
        @if (session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium flex items-center shadow-sm">
                <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center mr-3 shrink-0">
                    <i class="fa-solid fa-circle-check text-base"></i>
                </div>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Tabel Laporan Relasional -->
        <div class="glass-card rounded-3xl shadow-xl shadow-slate-200/60 overflow-hidden bg-white">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/90 text-slate-500 uppercase text-xs tracking-wider border-b border-slate-200">
                            <th class="py-4 px-6 font-bold w-16">No</th>
                            <th class="py-4 px-6 font-bold">Nama Peserta</th>
                            <th class="py-4 px-6 font-bold">Program Kursus</th>
                            <th class="py-4 px-6 font-bold">Tanggal Mulai</th>
                            <th class="py-4 px-6 font-bold">Status Pendaftaran</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse ($enrollments as $index => $enrollment)
                            <tr class="hover:bg-teal-50/40 transition-colors">
                                <td class="py-4 px-6 font-mono font-semibold text-xs text-slate-500">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-900">{{ optional($enrollment->participant)->name ?? '-' }}</div>
                                    <div class="text-xs text-slate-400 font-mono">{{ optional($enrollment->participant)->email ?? '-' }}</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-brand-50 text-brand-700 border border-brand-200/80">
                                            {{ optional($enrollment->course)->name ?? '-' }}
                                        </span>
                                        @if (optional($enrollment->course)->code)
                                            <span class="px-2 py-0.5 rounded-md text-[11px] font-mono font-semibold bg-slate-100 text-slate-600 border border-slate-200">
                                                {{ $enrollment->course->code }}
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-slate-600 font-mono text-xs font-medium">
                                    <i class="fa-regular fa-calendar mr-1.5 text-brand-600"></i>
                                    {{ optional(optional($enrollment->course)->start_date)->format('d/m/Y') ?? '-' }}
                                </td>
                                <td class="py-4 px-6">
                                    @php
                                        $statusStyle = match(strtolower($enrollment->status ?? '')) {
                                            'registered' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                            'completed'  => 'bg-teal-50 text-teal-800 border-teal-200',
                                            'cancelled'  => 'bg-rose-50 text-rose-700 border-rose-200',
                                            default      => 'bg-slate-100 text-slate-700 border-slate-200',
                                        };
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold border {{ $statusStyle }}">
                                        <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                        {{ ucfirst($enrollment->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-16 text-center text-slate-400">
                                    <div class="w-16 h-16 mx-auto bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center text-2xl mb-3">
                                        <i class="fa-solid fa-folder-open"></i>
                                    </div>
                                    <p class="font-bold text-slate-700 text-sm">Belum ada data pendaftaran (enrollment) yang tersimpan.</p>
                                    <p class="text-xs text-slate-400 mt-1">Silakan tambahkan data pendaftaran baru melalui tombol di atas.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
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
                        <li><a href="{{ route('enrollments.index') }}" class="hover:text-brand-500 transition">Laporan Enrollment</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Tugas Praktikum</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><span class="text-brand-400 font-medium">Tugas 12:</span> Relational Core &amp; Cascade</li>
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
</body>
</html>