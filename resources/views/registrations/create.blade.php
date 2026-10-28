<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pendaftaran Kursus - KursusKu</title>
    
    <!-- Google Fonts & FontAwesome -->
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
                            900: '#134e4a',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(20, 184, 166, 0.2);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-teal-50/20 to-slate-100 text-slate-800 antialiased min-h-screen flex flex-col justify-between font-sans selection:bg-teal-500 selection:text-white">

    <!-- NAVBAR ESTETIK -->
    <header class="sticky top-4 z-50 mx-4 sm:mx-8 lg:mx-16">
        <nav class="glass-card shadow-lg shadow-teal-900/5 rounded-2xl px-6 py-4 flex items-center justify-between transition-all duration-300">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-teal-700 flex items-center justify-center text-white shadow-md shadow-teal-700/30 group-hover:scale-105 transition-transform">
                    <i class="fa-solid fa-graduation-cap text-lg"></i>
                </div>
                <div>
                    <span class="text-xl font-extrabold tracking-tight text-slate-900">Kursus<span class="text-teal-700">Ku</span></span>
                    <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Laravel Edition</span>
                </div>
            </a>
            <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 rounded-xl bg-white text-slate-700 font-semibold text-sm border border-slate-200 hover:bg-slate-50 hover:text-teal-700 transition-all shadow-sm">
                <i class="fa-solid fa-arrow-left mr-2 text-xs"></i> Kembali ke Beranda
            </a>
        </nav>
    </header>

    <!-- KONTEN UTAMA FORM -->
    <main class="flex-grow container mx-auto px-4 sm:px-8 lg:px-16 py-12 max-w-2xl">
        <div class="glass-card p-8 sm:p-12 rounded-3xl shadow-xl shadow-teal-950/5">
            
            <div class="text-center mb-8">
                <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-semibold bg-teal-50 text-teal-700 border border-teal-200 shadow-sm mb-3">
                    <i class="fa-solid fa-file-pen mr-2 text-teal-600"></i> Pendaftaran Kursus Interaktif
                </span>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Formulir Pendaftaran</h1>
                <p class="text-slate-500 text-sm mt-1">Lengkapi data diri Anda di bawah ini untuk mengamankan kursi pelatihan.</p>
            </div>

            <!-- TAMPILKAN PESAN ERROR JIKA VALIDASI GAGAL -->
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-sm">
                    <p class="font-bold mb-1"><i class="fa-solid fa-triangle-exclamation mr-1"></i> Mohon periksa kembali inputan Anda:</p>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- FORM START -->
            <form action="{{ route('enrollments.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                            <i class="fa-regular fa-user"></i>
                        </span>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" required 
                            class="w-full pl-11 pr-4 py-3 bg-white/80 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 transition-all shadow-sm" 
                            placeholder="Contoh: Budi Santoso">
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Alamat Email Aktif</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" required 
                            class="w-full pl-11 pr-4 py-3 bg-white/80 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 transition-all shadow-sm" 
                            placeholder="nama@email.com">
                    </div>
                </div>

                <!-- Nomor Telepon / WhatsApp -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nomor Telepon / WhatsApp</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                            <i class="fa-brands fa-whatsapp"></i>
                        </span>
                        <input type="text" name="phone" value="{{ old('phone') }}" required 
                            class="w-full pl-11 pr-4 py-3 bg-white/80 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 transition-all shadow-sm" 
                            placeholder="081234567890">
                    </div>
                </div>

                <!-- Tipe Peserta (Otomatis Diskon) -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Kategori / Tipe Peserta</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 pointer-events-none">
                            <i class="fa-solid fa-id-card"></i>
                        </span>
                        <select name="participant_type" required 
                            class="w-full pl-11 pr-4 py-3 bg-white/80 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 transition-all shadow-sm appearance-none">
                            <option value="">-- Pilih Kategori Peserta --</option>
                            <option value="Mahasiswa" {{ old('participant_type') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa (Diskon Khusus 20%)</option>
                            <option value="Guru" {{ old('participant_type') == 'Guru' ? 'selected' : '' }}>Guru / Pengajar (Diskon Khusus 15%)</option>
                            <option value="Umum" {{ old('participant_type') == 'Umum' ? 'selected' : '' }}>Umum (Diskon 5%)</option>
                        </select>
                        <span class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </span>
                    </div>
                </div>

                <!-- Pilihan Program Kursus -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Pilih Program Kursus</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 pointer-events-none">
                            <i class="fa-solid fa-laptop-code"></i>
                        </span>
                        <select name="course_name" required 
                            class="w-full pl-11 pr-4 py-3 bg-white/80 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 transition-all shadow-sm appearance-none">
                            <option value="">-- Pilih Program Pelatihan --</option>
                            <option value="Web Dasar" {{ old('course_name') == 'Web Dasar' ? 'selected' : '' }}>Web Dasar (Rp 500.000)</option>
                            <option value="PHP Dasar" {{ old('course_name') == 'PHP Dasar' ? 'selected' : '' }}>PHP Dasar &amp; MySQL (Rp 500.000)</option>
                            <option value="Laravel Fundamental" {{ old('course_name') == 'Laravel Fundamental' ? 'selected' : '' }}>Laravel 11 Masterclass (Rp 500.000)</option>
                        </select>
                        <span class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </span>
                    </div>
                </div>

                <!-- Mode Pembelajaran -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Mode Pembelajaran</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 pointer-events-none">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </span>
                        <select name="learning_mode" required 
                            class="w-full pl-11 pr-4 py-3 bg-white/80 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 transition-all shadow-sm appearance-none">
                            <option value="">-- Pilih Mode Belajar --</option>
                            <option value="Tatap Muka" {{ old('learning_mode') == 'Tatap Muka' ? 'selected' : '' }}>Tatap Muka (Offline)</option>
                            <option value="Online" {{ old('learning_mode') == 'Online' ? 'selected' : '' }}>Online (Virtual Zoom/Meet)</option>
                            <option value="Hybrid" {{ old('learning_mode') == 'Hybrid' ? 'selected' : '' }}>Hybrid (Kombinasi Keduanya)</option>
                        </select>
                        <span class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </span>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4">
                    <button type="submit" class="w-full py-4 px-6 rounded-xl bg-teal-700 text-white font-bold text-sm shadow-lg shadow-teal-700/30 hover:bg-teal-800 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                        <span>Simpan &amp; Proses Pendaftaran</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </div>
            </form>
            <!-- FORM END -->

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-400 py-8 border-t border-slate-800 mt-16 text-center text-xs">
        <div class="container mx-auto px-4">
            <p class="font-medium text-slate-300">KursusKu Laravel Platform</p>
            <p class="text-slate-500 mt-1">&copy; 2026 KursusKu. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

</body>
</html>