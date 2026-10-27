<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KursusKu - Platform Pelatihan Digital Modern</title>

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
        .hero-gradient {
            background: radial-gradient(circle at top right, rgba(204, 251, 241, 0.6), transparent 50%),
                        radial-gradient(circle at bottom left, rgba(241, 245, 249, 1), transparent 50%);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-brand-500 selection:text-white">

    <!-- SITE HEADER & NAVBAR -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-nav border-b border-slate-200/80 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="index.php" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-700 to-brand-500 flex items-center justify-center text-white shadow-md shadow-brand-500/20 group-hover:scale-105 transition-transform duration-300">
                        <i class="fa-solid fa-graduation-cap text-lg"></i>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-brand-900 via-brand-700 to-brand-600 bg-clip-text text-transparent">
                        KursusKu
                    </span>
                </a>

                <!-- Navigation Desktop -->
                <nav class="hidden lg:flex items-center space-x-1" aria-label="Navigasi utama">
                    <a href="index.php" class="px-3.5 py-2 rounded-lg text-sm font-semibold text-brand-700 bg-brand-50/80">Beranda</a>
                    <a href="#keunggulan" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-slate-100/80 transition-all">Keunggulan</a>
                    <a href="#katalog" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-slate-100/80 transition-all">Katalog</a>
                    <a href="#video" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-slate-100/80 transition-all">Media</a>
                    
                    <!-- Dropdown Extra Links -->
                    <div class="relative group">
                        <button class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-slate-100/80 transition-all flex items-center gap-1.5">
                            Fitur Lain <i class="fa-solid fa-chevron-down text-xs opacity-70 group-hover:rotate-180 transition-transform duration-300"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-52 bg-white rounded-2xl shadow-xl border border-slate-100 p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-2 group-hover:translate-y-0">
                            <a href="form-p5.php" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 hover:bg-brand-50 hover:text-brand-700 transition">
                                <i class="fa-solid fa-file-lines w-4 text-brand-600"></i> Form P5
                            </a>
                            <a href="daftar-p6.php" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 hover:bg-brand-50 hover:text-brand-700 transition">
                                <i class="fa-solid fa-list-check w-4 text-brand-600"></i> Daftar P6
                            </a>
                            <a href="history.php" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 hover:bg-brand-50 hover:text-brand-700 transition">
                                <i class="fa-solid fa-clock-rotate-left w-4 text-brand-600"></i> History
                            </a>
                            <a href="fee-calculator.php" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 hover:bg-brand-50 hover:text-brand-700 transition">
                                <i class="fa-solid fa-calculator w-4 text-brand-600"></i> Kalkulator Biaya
                            </a>
                            <a href="test-functions.php" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 hover:bg-brand-50 hover:text-brand-700 transition">
                                <i class="fa-solid fa-vial-circle-check w-4 text-brand-600"></i> Unit Test
                            </a>
                        </div>
                    </div>

                    <a href="#kontak" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-slate-100/80 transition-all">Kontak</a>
                </nav>

                <!-- Action Button -->
                <div class="hidden lg:flex items-center gap-3">
                    <a href="registration.php" class="relative inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white bg-gradient-to-r from-brand-700 to-brand-600 rounded-xl shadow-md shadow-brand-700/20 hover:shadow-lg hover:shadow-brand-700/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                        <span>Daftar Sekarang</span>
                        <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
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
            <a href="index.php" class="block px-3 py-2 rounded-lg text-base font-semibold text-brand-700 bg-brand-50">Beranda</a>
            <a href="#keunggulan" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-600 hover:bg-slate-50">Keunggulan</a>
            <a href="#katalog" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-600 hover:bg-slate-50">Katalog</a>
            <a href="#video" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-600 hover:bg-slate-50">Media Video</a>
            <a href="form-p5.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-600 hover:bg-slate-50">Form P5</a>
            <a href="daftar-p6.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-600 hover:bg-slate-50">Daftar P6</a>
            <a href="history.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-600 hover:bg-slate-50">History</a>
            <a href="fee-calculator.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-600 hover:bg-slate-50">Kalkulator Biaya</a>
            <a href="test-functions.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-600 hover:bg-slate-50">Unit Test</a>
            <a href="registration.php" class="block w-full text-center mt-4 px-5 py-3 text-base font-bold text-white bg-brand-700 rounded-xl shadow-md">Daftar Sekarang</a>
        </div>
    </header>

    <main class="pt-20">
        <!-- HERO SECTION -->
        <section class="relative pt-12 pb-20 lg:pt-20 lg:pb-32 overflow-hidden hero-gradient">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                    
                    <!-- Left Hero Content -->
                    <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-50 border border-brand-200 text-brand-700 text-xs font-bold tracking-wide uppercase shadow-sm">
                            <span class="w-2 h-2 rounded-full bg-brand-500 animate-pulse"></span>
                            Edukasi Digital Modern
                        </div>
                        
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-[1.15]">
                            Tingkatkan Keterampilan Digital Bersama <span class="bg-gradient-to-r from-brand-700 via-brand-600 to-teal-500 bg-clip-text text-transparent">KursusKu</span>
                        </h1>
                        
                        <p class="text-lg text-slate-600 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-normal">
                            Platform pelatihan & sertifikasi keterampilan terdepan dengan kurikulum standar industri, metode kurasi berpraktik langsung, dan pengajar ahli.
                        </p>

                        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                            <a href="#katalog" class="w-full sm:w-auto px-8 py-4 bg-brand-700 hover:bg-brand-800 text-white font-bold rounded-2xl shadow-lg shadow-brand-700/25 hover:shadow-xl hover:shadow-brand-700/35 hover:-translate-y-0.5 active:translate-y-0 transition-all text-center flex items-center justify-center gap-2">
                                <i class="fa-solid fa-compass"></i>
                                Lihat Katalog Kursus
                            </a>
                            <a href="registration.php" class="w-full sm:w-auto px-8 py-4 bg-white hover:bg-slate-100 text-slate-800 font-bold rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all text-center flex items-center justify-center gap-2">
                                <i class="fa-regular fa-clipboard"></i>
                                Form Pendaftaran
                            </a>
                        </div>

                        <!-- Stats Banner Mini -->
                        <div class="pt-8 border-t border-slate-200/60 grid grid-cols-3 gap-4 text-center lg:text-left">
                            <div>
                                <div class="text-2xl font-extrabold text-slate-900">1,200+</div>
                                <div class="text-xs text-slate-500 font-medium">Alumni Lulus</div>
                            </div>
                            <div>
                                <div class="text-2xl font-extrabold text-slate-900">98%</div>
                                <div class="text-xs text-slate-500 font-medium">Kepuasan Kelas</div>
                            </div>
                            <div>
                                <div class="text-2xl font-extrabold text-slate-900">15+</div>
                                <div class="text-xs text-slate-500 font-medium">Modul Hands-on</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Hero Media -->
                    <div class="lg:col-span-5 relative">
                        <div class="relative mx-auto max-w-md lg:max-w-none">
                            <!-- Background Decorative Glow -->
                            <div class="absolute -top-4 -left-4 w-72 h-72 bg-brand-300 rounded-full filter blur-3xl opacity-30 animate-pulse"></div>
                            <div class="absolute -bottom-4 -right-4 w-72 h-72 bg-teal-400 rounded-full filter blur-3xl opacity-20"></div>
                            
                            <!-- Card Container with Image & Glass Badge -->
                            <div class="relative rounded-3xl p-3 bg-white/70 backdrop-blur-xl border border-white/60 shadow-2xl shadow-slate-200/50">
                                <img src="assets/images/hero-kursus.jpg" 
                                     onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1000&auto=format&fit=crop';" 
                                     alt="Pembelajaran Kursus" 
                                     class="w-full h-80 sm:h-96 object-cover rounded-2xl shadow-inner">
                                
                                <!-- Floating Card Accent 1 -->
                                <div class="absolute bottom-6 left-6 right-6 p-4 bg-white/90 backdrop-blur-md rounded-2xl border border-slate-100 shadow-xl flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0 text-xl font-bold">
                                        <i class="fa-solid fa-certificate"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-900">Sertifikat Resmi Digital</h4>
                                        <p class="text-xs text-slate-500">Dapat dilampirkan langsung ke CV & LinkedIn</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- VIDEO SECTION -->
        <section id="video" class="py-20 bg-slate-100/70 border-y border-slate-200/60">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span class="text-brand-600 font-bold text-sm tracking-wider uppercase">Media Edukasi</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-1">Video Perkenalan KursusKu</h2>
                    <p class="text-slate-600 mt-2">Pelajari metode praktis, alur belajar, dan gambaran materi interaktif di platform kami.</p>
                </div>

                <div class="max-w-4xl mx-auto rounded-3xl overflow-hidden shadow-2xl border border-white/80 bg-slate-900 group relative">
                    <div class="aspect-video w-full relative">
                        <video controls class="w-full h-full object-cover">
                            <source src="assets/video/intro-kursus.mp4" type="video/mp4">
                            Browser kamu tidak mendukung pemutaran video.
                        </video>
                    </div>
                </div>
            </div>
        </section>

        <!-- KEUNGGULAN SECTION -->
        <section id="keunggulan" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <span class="text-brand-600 font-bold text-sm tracking-wider uppercase">Fasilitas Terbaik</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-1">Mengapa Memilih KursusKu?</h2>
                    <p class="text-slate-600 mt-2">Fasilitas utama untuk mendukung akselerasi kesuksesan belajar Anda.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Feature Card 1 -->
                    <div class="group p-8 rounded-3xl bg-slate-50 hover:bg-white border border-slate-200/60 hover:border-brand-200 shadow-sm hover:shadow-xl hover:shadow-brand-500/5 transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-brand-100/70 text-brand-700 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 group-hover:bg-brand-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-book-bookmark"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Materi Terarah</h3>
                        <p class="text-slate-600 leading-relaxed text-sm">
                            Materi pembelajaran disusun secara terstruktur, sistematis, dan dirancang khusus agar mudah diikuti oleh pemula hingga mahir.
                        </p>
                    </div>

                    <!-- Feature Card 2 -->
                    <div class="group p-8 rounded-3xl bg-slate-50 hover:bg-white border border-slate-200/60 hover:border-brand-200 shadow-sm hover:shadow-xl hover:shadow-brand-500/5 transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-brand-100/70 text-brand-700 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 group-hover:bg-brand-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-laptop-code"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Belajar Berbasis Proyek</h3>
                        <p class="text-slate-600 leading-relaxed text-sm">
                            Peserta belajar melalui studi kasus nyata dan latihan praktis yang berdampak langsung untuk memperkuat nilai portofolio.
                        </p>
                    </div>

                    <!-- Feature Card 3 -->
                    <div class="group p-8 rounded-3xl bg-slate-50 hover:bg-white border border-slate-200/60 hover:border-brand-200 shadow-sm hover:shadow-xl hover:shadow-brand-500/5 transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-brand-100/70 text-brand-700 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 group-hover:bg-brand-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Pendampingan Praktik</h3>
                        <p class="text-slate-600 leading-relaxed text-sm">
                            Mendapatkan bimbingan dan feedback langsung dari praktisi industri untuk memastikan pemahaman modul secara mendalam.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- KATALOG KURSUS SECTION -->
        <section id="katalog" class="py-20 bg-slate-100/80 border-t border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
                    <div>
                        <span class="text-brand-600 font-bold text-sm tracking-wider uppercase">Program Utama</span>
                        <h2 class="text-3xl font-extrabold text-slate-900 mt-1">Katalog Kursus Pilihan</h2>
                        <p class="text-slate-600 mt-1">Pilih program pelatihan sesuai dengan jalur karir yang Anda impikan.</p>
                    </div>
                </div>

                <!-- FILTER & SEARCH BAR CARD -->
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200/80 mb-8">
                    <form method="GET" action="index.php#katalog" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                        <!-- Input Cari -->
                        <div class="md:col-span-6 relative">
                            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="text" name="search" class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl font-medium text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-600 focus:bg-white transition" placeholder="Cari nama atau kode kursus (contoh: WEB-01)..." value="">
                        </div>

                        <!-- Select Status -->
                        <div class="md:col-span-3">
                            <select name="status" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl font-medium text-sm text-slate-800 focus:outline-none focus:border-brand-600 focus:bg-white transition">
                                <option value="all" selected>Semua Status</option>
                                <option value="tersedia">Tersedia</option>
                                <option value="penuh">Penuh</option>
                            </select>
                        </div>

                        <!-- Filter Button -->
                        <div class="md:col-span-3 flex gap-2">
                            <button type="submit" class="w-full py-3 bg-brand-700 hover:bg-brand-800 text-white font-semibold text-sm rounded-xl shadow-md transition flex items-center justify-center gap-2">
                                <i class="fa-solid fa-filter"></i> Filter
                            </button>
                            <a href="index.php#katalog" class="px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-sm rounded-xl transition flex items-center justify-center" title="Reset Filter">
                                <i class="fa-solid fa-rotate-left"></i>
                            </a>
                        </div>
                    </form>
                </div>

                <!-- TABLE CARD MODERN -->
                <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-200/80 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/80 border-b border-slate-200 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                    <th class="py-4 px-6">Kode</th>
                                    <th class="py-4 px-6">Program Kursus</th>
                                    <th class="py-4 px-6">Biaya</th>
                                    <th class="py-4 px-6">Ketersediaan Kursi</th>
                                    <th class="py-4 px-6">Status</th>
                                    <th class="py-4 px-6">Mulai Kursus</th>
                                    <th class="py-4 px-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm">
                                
                                <!-- Row 1 -->
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-4 px-6 font-bold text-slate-900 whitespace-nowrap">
                                        <span class="inline-block px-3 py-1 bg-slate-100 text-slate-700 rounded-lg text-xs font-mono font-bold">WEB-01</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-bold text-slate-900 text-base">Web Dasar</div>
                                        <div class="text-xs text-slate-500 flex items-center gap-1 mt-0.5">
                                            <i class="fa-solid fa-users text-slate-400"></i> Kuota Total: 30 Peserta
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-bold text-brand-700 whitespace-nowrap">
                                        Rp 200.000
                                    </td>
                                    <td class="py-4 px-6 min-w-[200px]">
                                        <div class="flex justify-between items-center text-xs font-semibold mb-1">
                                            <span class="text-slate-800"><strong>12</strong> Terdaftar</span>
                                            <span class="text-slate-500">(Sisa 18)</span>
                                        </div>
                                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                                            <div class="h-full bg-brand-500 rounded-full" style="width: 40%;"></div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Tersedia
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap text-xs font-medium text-slate-600">
                                        <div class="flex items-center gap-2 bg-slate-50 border border-slate-200/60 px-3 py-1.5 rounded-lg w-max">
                                            <i class="fa-regular fa-calendar text-brand-600"></i>
                                            21-09-2026
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-center whitespace-nowrap">
                                        <a href="registration.php?course=WEB-01" class="inline-flex items-center justify-center px-4 py-2 bg-brand-700 hover:bg-brand-800 text-white font-bold text-xs rounded-xl shadow-md transition hover:scale-105">
                                            Daftar
                                        </a>
                                    </td>
                                </tr>

                                <!-- Row 2 -->
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-4 px-6 font-bold text-slate-900 whitespace-nowrap">
                                        <span class="inline-block px-3 py-1 bg-slate-100 text-slate-700 rounded-lg text-xs font-mono font-bold">PHP-01</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-bold text-slate-900 text-base">PHP Dasar</div>
                                        <div class="text-xs text-slate-500 flex items-center gap-1 mt-0.5">
                                            <i class="fa-solid fa-users text-slate-400"></i> Kuota Total: 30 Peserta
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-bold text-brand-700 whitespace-nowrap">
                                        Rp 250.000
                                    </td>
                                    <td class="py-4 px-6 min-w-[200px]">
                                        <div class="flex justify-between items-center text-xs font-semibold mb-1">
                                            <span class="text-slate-800"><strong>18</strong> Terdaftar</span>
                                            <span class="text-slate-500">(Sisa 12)</span>
                                        </div>
                                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                                            <div class="h-full bg-brand-500 rounded-full" style="width: 60%;"></div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Tersedia
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap text-xs font-medium text-slate-600">
                                        <div class="flex items-center gap-2 bg-slate-50 border border-slate-200/60 px-3 py-1.5 rounded-lg w-max">
                                            <i class="fa-regular fa-calendar text-brand-600"></i>
                                            22-09-2026
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-center whitespace-nowrap">
                                        <a href="registration.php?course=PHP-01" class="inline-flex items-center justify-center px-4 py-2 bg-brand-700 hover:bg-brand-800 text-white font-bold text-xs rounded-xl shadow-md transition hover:scale-105">
                                            Daftar
                                        </a>
                                    </td>
                                </tr>

                                <!-- Row 3 -->
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-4 px-6 font-bold text-slate-900 whitespace-nowrap">
                                        <span class="inline-block px-3 py-1 bg-slate-100 text-slate-700 rounded-lg text-xs font-mono font-bold">PHP-02</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-bold text-slate-900 text-base">PHP Lanjutan</div>
                                        <div class="text-xs text-slate-500 flex items-center gap-1 mt-0.5">
                                            <i class="fa-solid fa-users text-slate-400"></i> Kuota Total: 25 Peserta
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-bold text-brand-700 whitespace-nowrap">
                                        Rp 300.000
                                    </td>
                                    <td class="py-4 px-6 min-w-[200px]">
                                        <div class="flex justify-between items-center text-xs font-semibold mb-1">
                                            <span class="text-slate-800"><strong>24</strong> Terdaftar</span>
                                            <span class="text-amber-600 font-bold">(Sisa 1)</span>
                                        </div>
                                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                                            <div class="h-full bg-amber-500 rounded-full" style="width: 96%;"></div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Hampir Penuh
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap text-xs font-medium text-slate-600">
                                        <div class="flex items-center gap-2 bg-slate-50 border border-slate-200/60 px-3 py-1.5 rounded-lg w-max">
                                            <i class="fa-regular fa-calendar text-brand-600"></i>
                                            24-09-2026
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-center whitespace-nowrap">
                                        <a href="registration.php?course=PHP-02" class="inline-flex items-center justify-center px-4 py-2 bg-brand-700 hover:bg-brand-800 text-white font-bold text-xs rounded-xl shadow-md transition hover:scale-105">
                                            Daftar
                                        </a>
                                    </td>
                                </tr>

                                <!-- Row 4 -->
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-4 px-6 font-bold text-slate-900 whitespace-nowrap">
                                        <span class="inline-block px-3 py-1 bg-slate-100 text-slate-700 rounded-lg text-xs font-mono font-bold">LAR-01</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-bold text-slate-900 text-base">Laravel Fundamental</div>
                                        <div class="text-xs text-slate-500 flex items-center gap-1 mt-0.5">
                                            <i class="fa-solid fa-users text-slate-400"></i> Kuota Total: 25 Peserta
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-bold text-brand-700 whitespace-nowrap">
                                        Rp 350.000
                                    </td>
                                    <td class="py-4 px-6 min-w-[200px]">
                                        <div class="flex justify-between items-center text-xs font-semibold mb-1">
                                            <span class="text-slate-800"><strong>25</strong> Terdaftar</span>
                                            <span class="text-red-500 font-bold">(Sisa 0)</span>
                                        </div>
                                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                                            <div class="h-full bg-red-500 rounded-full" style="width: 100%;"></div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Penuh
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap text-xs font-medium text-slate-600">
                                        <div class="flex items-center gap-2 bg-slate-50 border border-slate-200/60 px-3 py-1.5 rounded-lg w-max">
                                            <i class="fa-regular fa-calendar text-brand-600"></i>
                                            28-09-2026
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-center whitespace-nowrap">
                                        <button disabled class="inline-flex items-center justify-center px-4 py-2 bg-slate-200 text-slate-400 font-bold text-xs rounded-xl cursor-not-allowed">
                                            Penuh
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer id="kontak" class="bg-slate-900 text-slate-400 pt-16 pb-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-slate-800">
                
                <div class="space-y-4 md:col-span-2">
                    <a href="index.php" class="flex items-center gap-3">
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
                        <li><a href="index.php" class="hover:text-brand-500 transition">Beranda</a></li>
                        <li><a href="#keunggulan" class="hover:text-brand-500 transition">Keunggulan</a></li>
                        <li><a href="#katalog" class="hover:text-brand-500 transition">Katalog Kursus</a></li>
                        <li><a href="registration.php" class="hover:text-brand-500 transition">Form Pendaftaran</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Internal Links</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="form-p5.php" class="hover:text-brand-500 transition">Form P5</a></li>
                        <li><a href="daftar-p6.php" class="hover:text-brand-500 transition">Daftar P6</a></li>
                        <li><a href="history.php" class="hover:text-brand-500 transition">History Log</a></li>
                        <li><a href="fee-calculator.php" class="hover:text-brand-500 transition">Kalkulator Biaya</a></li>
                        <li><a href="test-functions.php" class="hover:text-brand-500 transition">Unit Test</a></li>
                    </ul>
                </div>

            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 gap-4">
                <p>&copy; 2026 KursusKu Laravel. All rights reserved.</p>
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