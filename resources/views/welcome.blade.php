<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KursusKu - Platform Pelatihan Digital & Sertifikasi</title>

    <!-- Google Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
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
                            900: '#134e4a',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.90);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(20, 184, 166, 0.15);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col justify-between font-sans">

    <!-- SITE HEADER & NAVBAR -->
    <header class="sticky top-4 z-50 mx-4 sm:mx-8 lg:mx-16">
        <nav class="glass-card shadow-lg rounded-2xl px-6 py-4 flex items-center justify-between transition-all duration-300">
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-teal-700 flex items-center justify-center text-white shadow-md shadow-teal-700/30 group-hover:scale-105 transition-transform">
                    <i class="fa-solid fa-graduation-cap text-lg"></i>
                </div>
                <div>
                    <span class="text-xl font-extrabold tracking-tight text-slate-900">Kursus<span class="text-teal-700">Ku</span></span>
                    <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Laravel Edition</span>
                </div>
            </a>
            
            <div class="hidden lg:flex items-center gap-6 font-medium text-sm text-slate-600">
                <a href="{{ url('/') }}" class="hover:text-teal-700 transition-colors">Beranda</a>
                <a href="#keunggulan" class="hover:text-teal-700 transition-colors">Keunggulan</a>
                <a href="#katalog" class="hover:text-teal-700 transition-colors">Katalog</a>
                <a href="#pendaftaran" class="hover:text-teal-700 transition-colors">Cara Daftar</a>
                <a href="#kontak" class="hover:text-teal-700 transition-colors">Kontak</a>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ url('/registration') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-teal-700 text-white font-semibold text-sm shadow-lg shadow-teal-700/25 hover:bg-teal-800 active:scale-95 transition-all">
                    Daftar Sekarang <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-grow container mx-auto px-4 sm:px-8 lg:px-16 py-8 space-y-16">
        
        <!-- HERO SECTION -->
        <section class="py-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 space-y-6">
                    <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-semibold bg-teal-50 text-teal-700 border border-teal-200 shadow-sm">
                        <i class="fa-solid fa-rocket mr-2 text-teal-600"></i> Platform Edukasi Digital Terdepan
                    </span>
                    <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
                        Tingkatkan Keterampilan Bersama <span class="text-teal-700">KursusKu</span>
                    </h1>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        Platform Pelatihan &amp; Sertifikasi Keterampilan Digital Terdepan dengan kurikulum berbasis proyek nyata dan mentor profesional.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="#katalog" class="inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-teal-700 text-white font-semibold shadow-lg shadow-teal-700/25 hover:bg-teal-800 active:scale-95 transition-all">
                            <i class="fa-solid fa-layer-group mr-2"></i> Lihat Katalog
                        </a>
                        <a href="{{ url('/registration') }}" class="inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-white text-slate-700 font-semibold border border-slate-300 hover:bg-slate-50 transition-all">
                            <i class="fa-solid fa-user-plus mr-2"></i> Form Pendaftaran
                        </a>
                    </div>
                </div>
                <div class="lg:col-span-5">
                    <div class="glass-card p-8 rounded-3xl text-center shadow-xl shadow-teal-900/5 border border-teal-100">
                        <div class="w-20 h-20 mx-auto bg-teal-700 text-white rounded-2xl flex items-center justify-center text-4xl mb-6 shadow-lg shadow-teal-700/30">
                            <i class="fa-solid fa-laptop-code"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Belajar Fleksibel &amp; Interaktif</h3>
                        <p class="text-sm text-slate-500">Akses modul pembelajaran berkualitas tinggi kapan saja dan di mana saja.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- KEUNGGULAN SECTION -->
        <section id="keunggulan" class="py-12">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Mengapa Memilih KursusKu?</h2>
                <p class="text-slate-500 mt-2">Fasilitas utama untuk mendukung kesuksesan belajar Anda.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="glass-card p-8 rounded-2xl shadow-md hover:border-teal-400 transition-all">
                    <div class="w-14 h-14 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center text-2xl mb-6 font-bold">📚</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Materi Terarah</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Materi pembelajaran disusun secara terstruktur, sistematis, dan mudah diikuti oleh pemula.</p>
                </div>
                <div class="glass-card p-8 rounded-2xl shadow-md hover:border-teal-400 transition-all">
                    <div class="w-14 h-14 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center text-2xl mb-6 font-bold">💻</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Belajar Berbasis Proyek</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Peserta belajar melalui kasus nyata dan latihan praktis yang dapat memperkuat portofolio.</p>
                </div>
                <div class="glass-card p-8 rounded-2xl shadow-md hover:border-teal-400 transition-all">
                    <div class="w-14 h-14 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center text-2xl mb-6 font-bold">👨‍🏫</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Pendampingan Praktik</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Mendapatkan arahan langsung dari praktisi untuk memastikan pemahaman modul secara mendalam.</p>
                </div>
            </div>
        </section>

        <!-- KATALOG KURSUS SECTION -->
        <section id="katalog" class="py-12">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 gap-4">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Katalog Kursus Pilihan</h2>
                    <p class="text-slate-500 mt-1">Pilih program pelatihan sesuai dengan jalur karir yang Anda impikan.</p>
                </div>
            </div>

            <!-- FILTER BAR (Dummy UI Interaktif) -->
            <div class="glass-card p-6 rounded-2xl mb-8 shadow-sm">
                <form method="GET" action="#katalog" class="flex flex-wrap gap-4 items-center">
                    <input type="text" name="search" class="flex-1 min-w-[220px] px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Cari nama atau kode kursus...">
                    <select name="status" class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
                        <option value="all">Semua Status</option>
                        <option value="tersedia">Tersedia</option>
                        <option value="penuh">Penuh</option>
                    </select>
                    <button type="submit" class="px-6 py-2.5 bg-teal-700 text-white font-semibold rounded-xl text-sm hover:bg-teal-800 transition-colors">
                        <i class="fa-solid fa-magnifying-glass mr-2"></i> Filter
                    </button>
                </form>
            </div>

            <!-- GRID KATALOG KURSUS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="glass-card rounded-2xl p-6 flex flex-col justify-between shadow-lg shadow-slate-200/50 hover:border-teal-400 transition-all duration-300">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="px-2.5 py-1 rounded-md bg-slate-900 text-amber-400 font-mono text-xs font-bold">WEB-01</span>
                            <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold border border-emerald-200">Tersedia</span>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900 mb-2">Web Dasar</h4>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">Materi fundamental pembuatan web interaktif menggunakan HTML, CSS, dan JavaScript.</p>
                        <div class="text-xs text-slate-500 mb-4 flex items-center gap-2">
                            <span><i class="fa-solid fa-users mr-1"></i> 12/30 Terdaftar</span>
                            <span>•</span>
                            <span><i class="fa-regular fa-calendar mr-1"></i> 21-09-2026</span>
                        </div>
                    </div>
                    <div>
                        <hr class="border-slate-200 mb-4">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-500 text-sm">Biaya</span>
                            <span class="text-lg font-extrabold text-teal-700 font-mono">Rp 200.000</span>
                        </div>
                        <a href="{{ url('/registration?course=WEB-01') }}" class="w-full inline-flex items-center justify-center px-4 py-3 rounded-xl bg-teal-700 text-white font-semibold text-sm hover:bg-teal-800 transition-all shadow-md shadow-teal-700/20">
                            Daftar Sekarang <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="glass-card rounded-2xl p-6 flex flex-col justify-between shadow-lg shadow-slate-200/50 hover:border-teal-400 transition-all duration-300">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="px-2.5 py-1 rounded-md bg-slate-900 text-amber-400 font-mono text-xs font-bold">PHP-01</span>
                            <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold border border-emerald-200">Tersedia</span>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900 mb-2">PHP Dasar</h4>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">Belajar bahasa pemrograman PHP dasar untuk pengembangan website dinamis.</p>
                        <div class="text-xs text-slate-500 mb-4 flex items-center gap-2">
                            <span><i class="fa-solid fa-users mr-1"></i> 18/30 Terdaftar</span>
                            <span>•</span>
                            <span><i class="fa-regular fa-calendar mr-1"></i> 22-09-2026</span>
                        </div>
                    </div>
                    <div>
                        <hr class="border-slate-200 mb-4">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-500 text-sm">Biaya</span>
                            <span class="text-lg font-extrabold text-teal-700 font-mono">Rp 250.000</span>
                        </div>
                        <a href="{{ url('/registration?course=PHP-01') }}" class="w-full inline-flex items-center justify-center px-4 py-3 rounded-xl bg-teal-700 text-white font-semibold text-sm hover:bg-teal-800 transition-all shadow-md shadow-teal-700/20">
                            Daftar Sekarang <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="glass-card rounded-2xl p-6 flex flex-col justify-between shadow-lg shadow-slate-200/50 hover:border-teal-400 transition-all duration-300">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="px-2.5 py-1 rounded-md bg-slate-900 text-amber-400 font-mono text-xs font-bold">LAR-01</span>
                            <span class="px-3 py-1 rounded-full bg-rose-50 text-rose-700 text-xs font-semibold border border-rose-200">Penuh</span>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900 mb-2">Laravel Fundamental</h4>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">Menguasai framework PHP Laravel modern untuk pembuatan aplikasi skala enterprise.</p>
                        <div class="text-xs text-slate-500 mb-4 flex items-center gap-2">
                            <span><i class="fa-solid fa-users mr-1"></i> 25/25 Terdaftar</span>
                            <span>•</span>
                            <span><i class="fa-regular fa-calendar mr-1"></i> 28-09-2026</span>
                        </div>
                    </div>
                    <div>
                        <hr class="border-slate-200 mb-4">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-500 text-sm">Biaya</span>
                            <span class="text-lg font-extrabold text-teal-700 font-mono">Rp 350.000</span>
                        </div>
                        <button disabled class="w-full inline-flex items-center justify-center px-4 py-3 rounded-xl bg-slate-200 text-slate-400 font-semibold text-sm cursor-not-allowed">
                            Kursus Penuh
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- LANGKAH PENDAFTARAN -->
        <section id="pendaftaran" class="py-12">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Langkah Pendaftaran</h2>
                <p class="text-slate-500 mt-2">Prosedur mudah untuk memulai kelas pertama Anda.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="glass-card p-6 rounded-2xl relative text-center">
                    <div class="w-10 h-10 rounded-full bg-teal-700 text-white font-bold flex items-center justify-center mx-auto mb-4 shadow-md">1</div>
                    <h3 class="font-bold text-slate-900 mb-1">Pilih Kelas</h3>
                    <p class="text-xs text-slate-500">Tentukan program studi/kursus yang ingin diikuti dari katalog.</p>
                </div>
                <div class="glass-card p-6 rounded-2xl relative text-center">
                    <div class="w-10 h-10 rounded-full bg-teal-700 text-white font-bold flex items-center justify-center mx-auto mb-4 shadow-md">2</div>
                    <h3 class="font-bold text-slate-900 mb-1">Cek Informasi</h3>
                    <p class="text-xs text-slate-500">Periksa detail biaya, ketersediaan sisa kursi, dan jadwal mulai.</p>
                </div>
                <div class="glass-card p-6 rounded-2xl relative text-center">
                    <div class="w-10 h-10 rounded-full bg-teal-700 text-white font-bold flex items-center justify-center mx-auto mb-4 shadow-md">3</div>
                    <h3 class="font-bold text-slate-900 mb-1">Isi Form</h3>
                    <p class="text-xs text-slate-500">Lengkapi formulir pendaftaran data diri pada menu Daftar Kursus.</p>
                </div>
                <div class="glass-card p-6 rounded-2xl relative text-center">
                    <div class="w-10 h-10 rounded-full bg-teal-700 text-white font-bold flex items-center justify-center mx-auto mb-4 shadow-md">4</div>
                    <h3 class="font-bold text-slate-900 mb-1">Konfirmasi</h3>
                    <p class="text-xs text-slate-500">Tunggu verifikasi pendaftaran dan instruksi kelas dari tim KursusKu.</p>
                </div>
            </div>
        </section>

        <!-- KONTAK SECTION -->
        <section id="kontak" class="py-12">
            <div class="glass-card p-8 rounded-3xl text-center max-w-3xl mx-auto shadow-sm">
                <h2 class="text-2xl font-bold text-slate-900 mb-2">Butuh Bantuan?</h2>
                <p class="text-slate-500 text-sm mb-6">Tim support kami siap menjawab pertanyaan Anda.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-6 text-sm">
                    <div class="p-4 rounded-xl bg-white/60 border border-slate-100">
                        <strong class="block text-slate-900 mb-1">Email Support:</strong>
                        <span class="text-teal-700">info@kursusku.test</span>
                    </div>
                    <div class="p-4 rounded-xl bg-white/60 border border-slate-100">
                        <strong class="block text-slate-900 mb-1">Layanan Telepon:</strong>
                        <span class="text-teal-700">0812-3456-7890</span>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-400 py-10 mt-20 border-t border-slate-800">
        <div class="container mx-auto px-4 sm:px-8 lg:px-16 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
            <div>
                <p class="text-white font-bold text-lg">KursusKu Laravel Platform</p>
                <p class="text-sm text-slate-500 mt-1">Modul Praktikum Pemrograman Web III (FTIK-PTIK UIN Bukittinggi)</p>
            </div>
            <p class="text-xs text-slate-500">&copy; 2026 <strong>KursusKu</strong>. Hak Cipta Dilindungi. Laravel v{{ Illuminate\Foundation\Application::VERSION }}</p>
        </div>
    </footer>

</body>
</html>