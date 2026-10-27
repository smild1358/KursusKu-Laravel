<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KursusKu — Platform Kursus & Pendaftaran Interaktif')</title>
    
    <!-- Google Fonts: Inter & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
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
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Outfit', sans-serif; }
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(20, 184, 166, 0.15);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #0f766e 0%, #0d9488 50%, #042f2e 100%);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col justify-between">

    <!-- Navbar Estetik Mengapung -->
    <header class="sticky top-4 z-50 mx-4 sm:mx-8 lg:mx-16">
        <nav class="glass-card shadow-lg rounded-2xl px-6 py-4 flex items-center justify-between transition-all duration-300">
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-teal-600 flex items-center justify-center text-white shadow-md shadow-teal-500/30 group-hover:scale-105 transition-transform">
                    <i class="fa-solid fa-graduation-cap text-lg"></i>
                </div>
                <div>
                    <span class="text-xl font-extrabold tracking-tight text-slate-900">Kursus<span class="text-teal-600">Ku</span></span>
                    <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Laravel Edition</span>
                </div>
            </a>
            
            <div class="hidden md:flex items-center gap-8 font-medium text-sm text-slate-600">
                <a href="{{ url('/') }}" class="hover:text-teal-600 transition-colors">Beranda</a>
                <a href="{{ url('/fee-calculator') }}" class="hover:text-teal-600 transition-colors">Kalkulator Biaya</a>
                <a href="{{ url('/register') }}" class="hover:text-teal-600 transition-colors">Pendaftaran</a>
                <a href="{{ url('/history') }}" class="hover:text-teal-600 transition-colors">Riwayat</a>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ url('/register') }}" class="hidden sm:inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-teal-600 text-white font-semibold text-sm shadow-lg shadow-teal-600/25 hover:bg-teal-700 active:scale-95 transition-all">
                    Mulai Daftar <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>
        </nav>
    </header>

    <!-- Konten Utama -->
    <main class="flex-grow container mx-auto px-4 sm:px-8 lg:px-16 py-8">
        @yield('content')
    </main>

    <!-- Footer Modern -->
    <footer class="bg-slate-900 text-slate-400 py-10 mt-20 border-t border-slate-800">
        <div class="container mx-auto px-4 sm:px-8 lg:px-16 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
            <div>
                <p class="text-white font-bold text-lg">KursusKu Laravel Platform</p>
                <p class="text-sm text-slate-500 mt-1">Prototype modern dikembangkan dengan standar estetika tinggi & arsitektur bersih.</p>
            </div>
            <p class="text-xs text-slate-500">&copy; {{ date('Y') }} KursusKu. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

</body>
</html>