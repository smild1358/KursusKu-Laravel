<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Pendaftaran - KursusKu</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(20, 184, 166, 0.2);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-teal-50/20 to-slate-100 text-slate-800 antialiased min-h-screen flex flex-col justify-between font-['Plus_Jakarta_Sans']">

    <!-- NAVBAR -->
    <header class="sticky top-4 z-50 mx-4 sm:mx-8 lg:mx-16">
        <nav class="glass-card shadow-lg rounded-2xl px-6 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-teal-700 flex items-center justify-center text-white shadow-md">
                    <i class="fa-solid fa-graduation-cap text-lg"></i>
                </div>
                <div>
                    <span class="text-xl font-extrabold tracking-tight text-slate-900">Kursus<span class="text-teal-700">Ku</span></span>
                    <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Edit Data Pendaftar</span>
                </div>
            </a>
            <a href="{{ route('registrations.index') }}" class="px-4 py-2 rounded-xl bg-white text-slate-700 font-semibold text-sm border border-slate-200 hover:bg-slate-50 transition-all">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
            </a>
        </nav>
    </header>

    <!-- FORM EDIT -->
    <main class="flex-grow container mx-auto px-4 sm:px-8 lg:px-16 py-12 max-w-2xl">
        <div class="glass-card p-8 sm:p-12 rounded-3xl shadow-xl">
            
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Pendaftaran Kursus</h1>
                <p class="text-slate-500 text-sm mt-1">Perbarui informasi data peserta di bawah ini.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-sm">
                    <p class="font-bold mb-1"><i class="fa-solid fa-triangle-exclamation mr-1"></i> Terjadi Kesalahan Validasi:</p>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('registrations.update', $registration->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap</label>
                    <input type="text" name="full_name" value="{{ old('full_name', $registration->full_name) }}" required 
                        class="w-full px-4 py-3 bg-white/80 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Alamat Email Aktif</label>
                    <input type="email" name="email" value="{{ old('email', $registration->email) }}" required 
                        class="w-full px-4 py-3 bg-white/80 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nomor Telepon / WhatsApp</label>
                    <input type="text" name="phone" value="{{ old('phone', $registration->phone) }}" required 
                        class="w-full px-4 py-3 bg-white/80 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Kategori Peserta</label>
                    <select name="participant_type" required class="w-full px-4 py-3 bg-white/80 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 shadow-sm">
                        <option value="Mahasiswa" {{ old('participant_type', $registration->participant_type) == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa (Diskon 20%)</option>
                        <option value="Guru" {{ old('participant_type', $registration->participant_type) == 'Guru' ? 'selected' : '' }}>Guru / Pengajar (Diskon 15%)</option>
                        <option value="Umum" {{ old('participant_type', $registration->participant_type) == 'Umum' ? 'selected' : '' }}>Umum (Diskon 5%)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Pilih Program Kursus</label>
                    <select name="course_name" required class="w-full px-4 py-3 bg-white/80 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 shadow-sm">
                        <option value="Web Dasar" {{ old('course_name', $registration->course_name) == 'Web Dasar' ? 'selected' : '' }}>Web Dasar</option>
                        <option value="PHP Dasar" {{ old('course_name', $registration->course_name) == 'PHP Dasar' ? 'selected' : '' }}>PHP Dasar &amp; MySQL</option>
                        <option value="Laravel Fundamental" {{ old('course_name', $registration->course_name) == 'Laravel Fundamental' ? 'selected' : '' }}>Laravel 11 Masterclass</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Mode Pembelajaran</label>
                    <select name="learning_mode" required class="w-full px-4 py-3 bg-white/80 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 shadow-sm">
                        <option value="Tatap Muka" {{ old('learning_mode', $registration->learning_mode) == 'Tatap Muka' ? 'selected' : '' }}>Tatap Muka (Offline)</option>
                        <option value="Online" {{ old('learning_mode', $registration->learning_mode) == 'Online' ? 'selected' : '' }}>Online</option>
                        <option value="Hybrid" {{ old('learning_mode', $registration->learning_mode) == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                    </select>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-4 px-6 rounded-xl bg-teal-700 text-white font-bold text-sm shadow-lg hover:bg-teal-800 transition-all">
                        Perbarui Data <i class="fa-solid fa-floppy-disk ml-2 text-xs"></i>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-slate-900 text-slate-400 py-6 text-center text-xs">
        <p>&copy; 2026 KursusKu. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>