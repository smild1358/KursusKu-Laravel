<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pendaftaran - KursusKu</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
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
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-teal-700 flex items-center justify-center text-white shadow-md shadow-teal-700/30 group-hover:scale-105 transition-transform">
                    <i class="fa-solid fa-graduation-cap text-lg"></i>
                </div>
                <div>
                    <span class="text-xl font-extrabold tracking-tight text-slate-900">Kursus<span class="text-teal-700">Ku</span></span>
                    <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Laravel Edition</span>
                </div>
            </a>
            
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-slate-100 text-slate-700 font-semibold text-sm hover:bg-slate-200 transition-all">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Beranda
                </a>
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-grow container mx-auto px-4 sm:px-8 lg:px-16 py-12 max-w-3xl">
        <div class="glass-card p-8 sm:p-10 rounded-3xl shadow-xl shadow-slate-200/50">
            <div class="text-center mb-8">
                <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-semibold bg-teal-50 text-teal-700 border border-teal-200 shadow-sm mb-3">
                    <i class="fa-solid fa-user-plus mr-2 text-teal-600"></i> Form Pendaftaran Kursus
                </span>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Daftar Program Pelatihan</h1>
                <p class="text-slate-500 text-sm mt-1">Lengkapi data diri Anda di bawah ini untuk mengamankan kursi kelas.</p>
            </div>

            <!-- FORM PENDAFTARAN -->
            <form action="{{ route('enrollments.preview') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Masukkan nama lengkap Anda">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="nama@email.com">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Pilih Program Kursus</label>
                    <select name="course" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
                        <option value="">-- Pilih Kursus --</option>
                        <option value="WEB-01">Web Dasar (Rp 200.000)</option>
                        <option value="PHP-01">PHP Dasar (Rp 250.000)</option>
                        <option value="LAR-01" disabled>Laravel Fundamental - Penuh</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nomor WhatsApp / Telepon</label>
                    <input type="text" name="telepon" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="0812xxxxxxxx">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-3.5 px-6 rounded-xl bg-teal-700 text-white font-semibold text-sm shadow-lg shadow-teal-700/25 hover:bg-teal-800 active:scale-95 transition-all">
                        Lanjutkan Pendaftaran <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-400 py-8 mt-20 border-t border-slate-800 text-center text-xs">
        <p>&copy; 2026 <strong>KursusKu</strong>. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>