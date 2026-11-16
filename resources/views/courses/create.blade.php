<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Kursus - KursusKu</title>
    
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
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
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
        .glass-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(20, 184, 166, 0.2);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col justify-between font-sans">

    <!-- NAVBAR UTAMA KURSUSKU -->
    <header class="bg-[#0f2847] text-white py-4 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center gap-3">
            <div class="text-2xl font-extrabold tracking-tight">KursusKu</div>
            <p class="text-xs text-slate-300">Belajar Teknologi, Bangun Masa Depan</p>
            <nav class="flex flex-wrap justify-center gap-6 text-xs sm:text-sm font-semibold mt-2">
                <a href="http://127.0.0.1:8000" class="hover:text-teal-400 transition">Beranda</a>
                <a href="http://127.0.0.1:8000/#keunggulan" class="hover:text-teal-400 transition">Keunggulan</a>
                <a href="http://127.0.0.1:8000/#katalog" class="hover:text-teal-400 transition">Katalog</a>
                <a href="http://127.0.0.1:8000/#pendaftaran" class="hover:text-teal-400 transition">Cara Daftar</a>
                <a href="#" class="hover:text-teal-400 transition">Media</a>
                <a href="http://127.0.0.1:8000/#kontak" class="hover:text-teal-400 transition">Kontak</a>
                <a href="http://127.0.0.1:8000/registration" class="text-amber-400 hover:underline">Daftar Kursus</a>
            </nav>
        </div>
    </header>

    <!-- KONTEN UTAMA FORM -->
    <main class="flex-grow max-w-2xl mx-auto px-4 py-10 w-full">
        <div class="glass-card p-8 rounded-3xl shadow-xl bg-white border border-slate-200">
            <h1 class="text-xl font-extrabold text-slate-900 mb-6">Tambah Kursus</h1>

            <form action="{{ route('courses.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Kode Kursus</label>
                    <input type="text" name="code" value="{{ old('code') }}" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Contoh: WEB-101">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Kursus</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Contoh: Web Dasar">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Tuliskan deskripsi singkat...">{{ old('description') }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Biaya</label>
                        <input type="number" name="fee" value="{{ old('fee') }}" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="200000">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Kuota</label>
                        <input type="number" name="quota" value="{{ old('quota') }}" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="25">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Tanggal Mulai</label>
                        <input type="date" name="start_date" value="{{ old('start_date') }}" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Status</label>
                        <select name="status" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
                            <option value="draft">Draft</option>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-brand-700 text-white font-bold text-sm shadow-md hover:bg-brand-800 transition">
                        Simpan Kursus
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-slate-900 text-slate-400 py-6 text-center text-xs border-t border-slate-800">
        <p>&copy; 2026 <strong>KursusKu</strong>. Hak Cipta Dilindungi.</p>
    </footer>
</body>
</html>