<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Kursus - KursusKu</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] }, colors: { brand: { 500: '#14b8a6', 600: '#0d9488', 700: '#0f766e' } } } }
        }
    </script>
    <style>
        .glass-nav { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); }
        .glass-card { background: rgba(255, 255, 255, 0.92); backdrop-filter: blur(16px); border: 1px solid rgba(20, 184, 166, 0.2); }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-teal-50/20 to-slate-100 text-slate-800 antialiased min-h-screen flex flex-col justify-between font-sans">

    <!-- NAVBAR -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-nav border-b border-slate-200/80 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-700 to-brand-500 flex items-center justify-center text-white shadow-md">
                        <i class="fa-solid fa-graduation-cap text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-brand-900 to-brand-600 bg-clip-text text-transparent">KursusKu</span>
                        <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Minggu 11 - CRUD Lanjutan</span>
                    </div>
                </a>
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700">Beranda</a>
                    <a href="{{ route('courses.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold text-brand-700 bg-brand-50">Daftar Kursus</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="flex-grow max-w-4xl mx-auto px-4 pt-32 pb-16 w-full">
        <div class="mb-6 flex justify-between items-center">
            <div>
                <span class="text-brand-600 font-bold text-xs uppercase tracking-wider">Detail Informasi</span>
                <h1 class="text-2xl font-extrabold text-slate-900 mt-1">Detail Kursus: {{ $course->name }}</h1>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('courses.index') }}" class="px-4 py-2 rounded-xl bg-slate-200 text-slate-700 font-bold text-xs hover:bg-slate-300 transition shadow-sm">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
                </a>
                <a href="{{ route('courses.edit', $course) }}" class="px-4 py-2 rounded-xl bg-amber-500 text-white font-bold text-xs hover:bg-amber-600 transition shadow-md">
                    <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center shadow-sm">
                <i class="fa-solid fa-circle-check text-emerald-600 text-lg mr-3"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="glass-card rounded-3xl shadow-xl overflow-hidden p-8 bg-white border border-teal-100 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <span class="text-xs uppercase tracking-wider font-bold text-slate-400">Kode Kursus</span>
                    <p class="text-base font-mono font-bold text-slate-800 mt-1">{{ $course->code }}</p>
                </div>
                <div>
                    <span class="text-xs uppercase tracking-wider font-bold text-slate-400">Nama Kursus</span>
                    <p class="text-base font-bold text-slate-800 mt-1">{{ $course->name }}</p>
                </div>
            </div>
            <div>
                <span class="text-xs uppercase tracking-wider font-bold text-slate-400">Deskripsi</span>
                <p class="text-sm text-slate-600 mt-1 leading-relaxed bg-slate-50 p-4 rounded-xl border border-slate-100">{{ $course->description ?: 'Tidak ada deskripsi.' }}</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-2">
                <div class="bg-teal-50/50 p-4 rounded-2xl border border-teal-100">
                    <span class="text-[11px] uppercase tracking-wider font-bold text-teal-700">Biaya</span>
                    <p class="text-sm font-bold font-mono text-slate-800 mt-1">Rp {{ number_format($course->fee, 0, ',', '.') }}</p>
                </div>
                <div class="bg-teal-50/50 p-4 rounded-2xl border border-teal-100">
                    <span class="text-[11px] uppercase tracking-wider font-bold text-teal-700">Kuota</span>
                    <p class="text-sm font-bold text-slate-800 mt-1">{{ $course->quota }} peserta</p>
                </div>
                <div class="bg-teal-50/50 p-4 rounded-2xl border border-teal-100">
                    <span class="text-[11px] uppercase tracking-wider font-bold text-teal-700">Tanggal Mulai</span>
                    <p class="text-sm font-bold text-slate-800 mt-1">{{ is_object($course->start_date) ? $course->start_date->format('d-m-Y') : \Carbon\Carbon::parse($course->start_date)->format('d-m-Y') }}</p>
                </div>
                <div class="bg-teal-50/50 p-4 rounded-2xl border border-teal-100">
                    <span class="text-[11px] uppercase tracking-wider font-bold text-teal-700">Status</span>
                    <p class="mt-1">
                        @php
                            $badgeColors = ['draft' => 'bg-amber-100 text-amber-800', 'open' => 'bg-emerald-100 text-emerald-800', 'closed' => 'bg-rose-100 text-rose-800'];
                        @endphp
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $badgeColors[$course->status] ?? 'bg-slate-100 text-slate-800' }}">
                            {{ ucfirst($course->status) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-slate-900 text-slate-400 py-6 text-center text-xs border-t border-slate-800">
        <p>&copy; 2026 <strong>KursusKu</strong>. Hak Cipta Dilindungi.</p>
    </footer>
</body>
</html>