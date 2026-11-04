<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pendaftaran - KursusKu</title>
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

    <header class="sticky top-4 z-50 mx-4 sm:mx-8 lg:mx-16">
        <nav class="glass-card shadow-lg rounded-2xl px-6 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-teal-700 flex items-center justify-center text-white shadow-md">
                    <i class="fa-solid fa-graduation-cap text-lg"></i>
                </div>
                <div>
                    <span class="text-xl font-extrabold tracking-tight text-slate-900">Kursus<span class="text-teal-700">Ku</span></span>
                    <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Detail Pendaftaran</span>
                </div>
            </a>
            <a href="{{ route('registrations.index') }}" class="px-4 py-2 rounded-xl bg-white text-slate-700 font-semibold text-sm border border-slate-200 hover:bg-slate-50 transition-all">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
            </a>
        </nav>
    </header>

    <main class="flex-grow container mx-auto px-4 sm:px-8 lg:px-16 py-12 max-w-xl">
        <div class="glass-card p-8 sm:p-10 rounded-3xl shadow-xl space-y-6">
            <div class="text-center border-b border-slate-100 pb-6">
                <div class="w-16 h-16 bg-teal-100 text-teal-700 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-3 shadow-inner">
                    <i class="fa-solid fa-user-check"></i>
                </div>
                <h1 class="text-2xl font-extrabold text-slate-900">{{ $registration->full_name }}</h1>
                <p class="text-xs text-slate-400 mt-1">Terdaftar pada: {{ $registration->created_at->format('d M Y, H:i') }}</p>
            </div>

            <div class="space-y-4 text-sm">
                <div class="flex justify-between py-2 border-b border-slate-100">
                    <span class="text-slate-500 font-medium">Email</span>
                    <span class="font-semibold text-slate-900">{{ $registration->email }}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-100">
                    <span class="text-slate-500 font-medium">WhatsApp / Telepon</span>
                    <span class="font-semibold text-slate-900">{{ $registration->phone }}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-100">
                    <span class="text-slate-500 font-medium">Program Kursus</span>
                    <span class="font-semibold text-teal-700">{{ $registration->course_name }}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-100">
                    <span class="text-slate-500 font-medium">Tipe Peserta</span>
                    <span class="font-semibold text-slate-900">{{ $registration->participant_type }}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-100">
                    <span class="text-slate-500 font-medium">Mode Belajar</span>
                    <span class="font-semibold text-slate-900">{{ $registration->learning_mode }}</span>
                </div>
                <div class="flex justify-between py-3 bg-teal-50/50 px-4 rounded-xl border border-teal-100">
                    <span class="text-teal-900 font-bold">Total Biaya Kursus</span>
                    <span class="font-extrabold text-teal-700 font-mono text-base">Rp {{ number_format($registration->total_fee, 0, ',', '.') }}</span>
                </div>
            </div>

            <div class="pt-4 flex gap-3">
                <a href="{{ route('registrations.edit', $registration->id) }}" class="flex-1 py-3 px-4 rounded-xl bg-amber-600 text-white font-semibold text-center text-sm shadow-md hover:bg-amber-700 transition-all">
                    <i class="fa-solid fa-pen-to-square mr-1"></i> Edit Data
                </a>
                <a href="{{ route('registrations.index') }}" class="flex-1 py-3 px-4 rounded-xl bg-slate-200 text-slate-700 font-semibold text-center text-sm hover:bg-slate-300 transition-all">
                    Tutup
                </a>
            </div>
        </div>
    </main>

    <footer class="bg-slate-900 text-slate-400 py-6 text-center text-xs">
        <p>&copy; 2026 KursusKu. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>