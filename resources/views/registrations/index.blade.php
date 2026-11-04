<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Data Pendaftaran - KursusKu</title>
    
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
                        <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Tugas 5 CRUD Lanjutan</span>
                    </div>
                </a>

                <!-- Navigation Desktop -->
                <nav class="hidden lg:flex items-center space-x-1" aria-label="Navigasi utama">
                    <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-slate-100/80 transition-all">Beranda</a>
                    <a href="{{ route('registrations.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold text-brand-700 bg-brand-50/80">Data Pendaftar</a>
                </nav>

                <!-- Action Button -->
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('enrollments.create') }}" class="relative inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white bg-gradient-to-r from-brand-700 to-brand-600 rounded-xl shadow-md shadow-brand-700/20 hover:shadow-lg hover:shadow-brand-700/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                        <i class="fa-solid fa-plus mr-2 text-xs"></i>
                        <span>Tambah Data</span>
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
            <a href="{{ route('registrations.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-brand-700 bg-brand-50">Data Pendaftar</a>
            <a href="{{ route('enrollments.create') }}" class="block w-full text-center mt-4 px-5 py-3 text-base font-bold text-white bg-brand-700 rounded-xl shadow-md">Tambah Data</a>
        </div>
    </header>

    <!-- KONTEN UTAMA TABEL -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16 w-full">
        
        <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <span class="text-brand-600 font-bold text-sm tracking-wider uppercase">Modul Database</span>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mt-1">Data Pendaftar Kursus</h1>
                <p class="text-slate-500 text-sm mt-1">Daftar lengkap seluruh peserta pelatihan yang terdaftar menggunakan Eloquent ORM.</p>
            </div>
            <a href="{{ route('enrollments.create') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-brand-700 text-white font-bold text-sm shadow-lg shadow-brand-700/20 hover:bg-brand-800 transition-all">
                <i class="fa-solid fa-plus text-xs"></i> Tambah Data Baru
            </a>
        </div>

        <!-- FLASH MESSAGE BERHASIL -->
        @if (session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center shadow-sm">
                <i class="fa-solid fa-circle-check text-emerald-600 text-lg mr-3"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- TABEL KARTU GLASSMORPHISM -->
        <div class="glass-card rounded-3xl shadow-xl overflow-hidden border border-teal-100 bg-white">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/80 text-slate-500 uppercase text-xs tracking-wider border-b border-slate-200">
                            <th class="py-4 px-6 font-bold">No</th>
                            <th class="py-4 px-6 font-bold">Nama Peserta</th>
                            <th class="py-4 px-6 font-bold">Kontak</th>
                            <th class="py-4 px-6 font-bold">Program Kursus</th>
                            <th class="py-4 px-6 font-bold">Kategori &amp; Biaya</th>
                            <th class="py-4 px-6 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse ($registrations as $index => $reg)
                            <tr class="hover:bg-teal-50/40 transition-colors">
                                <td class="py-4 px-6 font-semibold text-slate-500">{{ $index + 1 }}</td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-900">{{ $reg->full_name }}</div>
                                    <div class="text-xs text-slate-400">{{ $reg->email }}</div>
                                </td>
                                <td class="py-4 px-6 text-slate-600">
                                    <i class="fa-brands fa-whatsapp text-emerald-600 mr-1"></i> {{ $reg->phone }}
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-brand-50 text-brand-700 border border-brand-200">
                                        {{ $reg->course_name }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="text-xs font-semibold text-slate-700">{{ $reg->participant_type }}</div>
                                    <div class="text-brand-700 font-mono font-bold">Rp {{ number_format($reg->total_fee, 0, ',', '.') }}</div>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <div class="inline-flex items-center gap-2">
                                        <!-- Detail -->
                                        <a href="{{ route('registrations.show', $reg->id) }}" class="w-8 h-8 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center hover:bg-sky-600 hover:text-white transition-all shadow-sm" title="Detail">
                                            <i class="fa-solid fa-eye text-xs"></i>
                                        </a>
                                        <!-- Edit -->
                                        <a href="{{ route('registrations.edit', $reg->id) }}" class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center hover:bg-amber-600 hover:text-white transition-all shadow-sm" title="Edit">
                                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                                        </a>
                                        <!-- Delete -->
                                        <form action="{{ route('registrations.destroy', $reg->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center hover:bg-rose-600 hover:text-white transition-all shadow-sm" title="Hapus">
                                                <i class="fa-solid fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-16 text-center text-slate-400">
                                    <div class="w-16 h-16 mx-auto bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center text-2xl mb-3">
                                        <i class="fa-solid fa-folder-open"></i>
                                    </div>
                                    <p class="font-semibold text-slate-700">Belum ada data pendaftaran yang tersimpan.</p>
                                    <p class="text-xs text-slate-400 mt-1">Silakan tambahkan data baru melalui tombol di atas.</p>
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
                        <li><a href="{{ route('registrations.index') }}" class="hover:text-brand-500 transition">Data Pendaftar</a></li>
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