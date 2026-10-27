<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pendaftaran - KursusKu</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.90);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(20, 184, 166, 0.15);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col justify-between font-['Plus_Jakarta_Sans']">

    <!-- NAVBAR -->
    <header class="sticky top-4 z-50 mx-4 sm:mx-8 lg:mx-16">
        <nav class="glass-card shadow-lg rounded-2xl px-6 py-4 flex items-center justify-between">
            <a href="http://localhost/kursusku/public/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-teal-700 flex items-center justify-center text-white shadow-md">
                    <i class="fa-solid fa-graduation-cap text-lg"></i>
                </div>
                <div>
                    <span class="text-xl font-extrabold tracking-tight text-slate-900">Kursus<span class="text-teal-700">Ku</span></span>
                    <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Laravel Edition</span>
                </div>
            </a>
            <a href="http://localhost/kursusku/public/" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-700 font-semibold text-sm hover:bg-slate-200 transition-all">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Beranda
            </a>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-grow container mx-auto px-4 sm:px-8 lg:px-16 py-12 max-w-2xl">
        <div class="glass-card p-8 sm:p-10 rounded-3xl shadow-xl">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Form Pendaftaran Kursus</h1>
                <p class="text-slate-500 text-sm mt-1">Silakan isi data diri Anda dengan lengkap dan benar.</p>
            </div>

            <form action="http://localhost/kursusku/public/pendaftaran/store" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="full_name" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-teal-500 outline-none" placeholder="Masukkan nama lengkap">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-teal-500 outline-none" placeholder="nama@email.com">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nomor Telepon / WhatsApp</label>
                    <input type="text" name="phone" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-teal-500 outline-none" placeholder="08xxxxxxxxxx">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tipe Peserta</label>
                    <select name="participant_type" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-teal-500 outline-none">
                        <option value="Mahasiswa">Mahasiswa (Diskon 20%)</option>
                        <option value="Guru">Guru (Diskon 15%)</option>
                        <option value="Umum">Umum (Diskon 5%)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Pilih Program Kursus</label>
                    <select name="course_name" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-teal-500 outline-none">
                        <option value="Web Dasar">Web Dasar (Rp 200.000)</option>
                        <option value="PHP Dasar">PHP Dasar (Rp 250.000)</option>
                        <option value="Laravel Fundamental">Laravel Fundamental (Rp 350.000)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Mode Pembelajaran</label>
                    <select name="learning_mode" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-teal-500 outline-none">
                        <option value="Tatap Muka">Tatap Muka</option>
                        <option value="Online">Online</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                </div>

                <button type="submit" class="w-full py-3.5 px-6 rounded-xl bg-teal-700 text-white font-semibold text-sm shadow-lg hover:bg-teal-800 transition-all">
                    Simpan Pendaftaran <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </button>
            </form>
        </div>
    </main>

    <footer class="bg-slate-900 text-slate-400 py-6 text-center text-xs">
        <p>&copy; 2026 KursusKu. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>