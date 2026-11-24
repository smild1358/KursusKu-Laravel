<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pendaftaran Kursus &amp; Enrollment — KursusKu Laravel</title>
    
    <!-- Font & Icon -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace']
                    },
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
        .glass-nav { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); }
        .glass-card { background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(16px); border: 1px solid rgba(20, 184, 166, 0.22); }
        .cursor-pointer { cursor: pointer; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-teal-50/30 to-slate-100 text-slate-800 antialiased min-h-screen flex flex-col justify-between font-sans">

    <!-- NAVBAR -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-nav border-b border-slate-200/80 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-700 to-brand-500 flex items-center justify-center text-white shadow-md shadow-brand-600/20 group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-graduation-cap text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-brand-900 to-brand-600 bg-clip-text text-transparent">KursusKu</span>
                        <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Minggu 12 — Relational Core &amp; Enrollment</span>
                    </div>
                </a>
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-brand-50/50 transition">Beranda</a>
                    <a href="{{ route('courses.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-brand-700 hover:bg-brand-50/50 transition">Daftar Kursus</a>
                    <a href="{{ route('enrollments.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold text-brand-700 bg-brand-50 border border-brand-100">Laporan Enrollment</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- KONTEN UTAMA FORM -->
    <main class="flex-grow max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16 w-full">
        <div class="glass-card p-6 sm:p-10 rounded-3xl shadow-xl shadow-slate-200/60 bg-white">
            
            <!-- Header Kartu Form -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 pb-5 border-b border-slate-100">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-brand-700 to-brand-500 text-white flex items-center justify-center text-2xl shadow-lg shadow-brand-500/25 shrink-0">
                        <i class="fa-solid fa-file-pen"></i>
                    </div>
                    <div>
                        <span class="text-brand-600 font-bold text-xs uppercase tracking-wider">Formulir Terintegrasi</span>
                        <h1 class="text-2xl font-extrabold text-slate-900 mt-0.5">Tambah Pendaftaran &amp; Relasi</h1>
                        <p class="text-slate-500 text-sm">Hubungkan peserta dengan program kursus aktif serta hitung estimasi biaya.</p>
                    </div>
                </div>
                <a href="{{ route('enrollments.index') }}" class="self-start sm:self-center px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-xs font-bold text-slate-600 transition flex items-center gap-1.5 shrink-0">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>

            <!-- Ringkasan Pesan Error Validasi / Duplikasi -->
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-sm shadow-sm space-y-1">
                    <div class="font-bold flex items-center text-rose-700">
                        <i class="fa-solid fa-triangle-exclamation mr-2"></i> Perhatian Validasi Sistem:
                    </div>
                    @foreach ($errors->all() as $error)
                        <div class="pl-6 text-xs font-medium">&bull; {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('enrollments.store') }}" class="space-y-6">
                @csrf

                <!-- SECTION 1: RELASI DATABASE (PARTICIPANT & COURSE) -->
                <div class="p-5 rounded-2xl bg-teal-50/40 border border-teal-100/80 space-y-5">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-extrabold uppercase tracking-wider text-brand-800 flex items-center gap-1.5">
                            <i class="fa-solid fa-diagram-project text-brand-600"></i> Data Relasi Utama (Database)
                        </span>
                        <span class="text-[11px] font-mono px-2.5 py-0.5 rounded-full bg-brand-100 text-brand-800 font-semibold">Relational Core</span>
                    </div>

                    <!-- Pilihan Peserta dari Database (Relasi Participant) -->
                    <div class="space-y-1.5">
                        <label for="participant_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            <i class="fa-solid fa-user me-1 text-brand-600"></i> Pilih Peserta Terdaftar (Participant)
                        </label>
                        <select name="participant_id" id="participant_id" required class="w-full px-4 py-3 bg-white border @error('participant_id') border-rose-500 bg-rose-50/30 @else border-slate-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 shadow-sm transition">
                            <option value="">-- Pilih Participant --</option>
                            @foreach ($participants as $participant)
                                <option value="{{ $participant->id }}" 
                                        data-name="{{ $participant->name }}" 
                                        data-email="{{ $participant->email }}" 
                                        @selected(old('participant_id') == $participant->id)>
                                    {{ $participant->name }} ({{ $participant->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('participant_id')
                            <p class="text-xs text-rose-600 font-semibold mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Pilihan Program Kursus dari Database (Relasi Course) -->
                    @php
                        $courseList = $coursesDb ?? $courses;
                    @endphp
                    <div class="space-y-1.5">
                        <label for="course_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            <i class="fa-solid fa-graduation-cap me-1 text-brand-600"></i> Pilih Program Kursus (Course)
                        </label>
                        <select id="course_id" name="course_id" required class="w-full px-4 py-3 bg-white border @error('course_id') border-rose-500 bg-rose-50/30 @else border-slate-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 shadow-sm transition">
                            <option value="" data-price="0" data-quota="0">-- Pilih Course Aktif --</option>
                            @foreach ($courseList as $key => $course)
                                @if (is_object($course))
                                    <option value="{{ $course->id }}" 
                                            data-price="{{ $course->fee ?? 0 }}" 
                                            data-quota="{{ $course->quota ?? 20 }}"
                                            @selected(old('course_id') == $course->id)>
                                        [{{ $course->code }}] {{ $course->name }} — Rp {{ number_format($course->fee ?? 0, 0, ',', '.') }} (Mulai: {{ optional($course->start_date)->format('d/m/Y') }})
                                    </option>
                                @else
                                    <option value="{{ $key }}" 
                                            data-price="{{ $course['price'] ?? 0 }}" 
                                            data-quota="{{ $course['total'] ?? 20 }}"
                                            @selected(old('course_id') == $key)>
                                        {{ $course['name'] }} — Rp {{ number_format($course['price'] ?? 0, 0, ',', '.') }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="mt-2 p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold flex items-center gap-2 shadow-sm">
                                <i class="fa-solid fa-triangle-exclamation text-rose-600 text-sm"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- SECTION 2: DATA KANDIDAT (OPSIONAL / AUTO-FILL DARI PARTICIPANT) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Nama Lengkap -->
                    <div class="space-y-1.5">
                        <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            <i class="fa-solid fa-user-pen me-1 text-brand-600"></i> Nama Lengkap Kandidat
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 shadow-sm @error('name') border-rose-500 bg-rose-50/30 @enderror" placeholder="Otomatis terisi saat pilih peserta">
                        @error('name')
                            <p class="text-xs text-rose-600 font-medium mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="space-y-1.5">
                        <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            <i class="fa-solid fa-envelope me-1 text-brand-600"></i> Alamat Email Aktif
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 shadow-sm @error('email') border-rose-500 bg-rose-50/30 @enderror" placeholder="nama@email.com">
                        @error('email')
                            <p class="text-xs text-rose-600 font-medium mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- FITUR 1: SEAT AVAILABILITY WIDGET & PROGRESS BAR -->
                <div id="availability" class="p-4 rounded-2xl bg-slate-50 border border-slate-200 text-slate-700 text-sm flex items-center shadow-sm transition-all">
                    <i class="fa-solid fa-circle-info text-brand-600 text-lg mr-3"></i>
                    <span id="availability-text">Pilih kursus untuk memeriksa sisa kuota kursi secara real-time.</span>
                </div>

                <div id="seat-progress-container" class="space-y-1.5 hidden">
                    <div class="flex justify-between text-xs font-semibold text-slate-500">
                        <span>Kapasitas Bangku Virtual</span>
                        <span id="seat-progress-text" class="font-bold text-brand-700">0 / 0</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2.5 overflow-hidden">
                        <div id="seat-progress-bar" class="bg-gradient-to-r from-brand-600 to-emerald-500 h-2.5 rounded-full transition-all duration-500" style="width: 0%"></div>
                    </div>
                </div>

                <!-- Status Pekerjaan (Diskon) -->
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                        <i class="fa-solid fa-briefcase me-1 text-brand-600"></i> Status Pekerjaan / Profesi (Potongan Diskon)
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <label class="border border-slate-200 p-3.5 rounded-2xl flex items-center justify-between cursor-pointer hover:border-teal-500 hover:bg-teal-50/20 bg-white shadow-sm transition">
                            <div class="flex items-center">
                                <input class="profession-radio me-2 text-teal-600 focus:ring-teal-500" type="radio" name="profession" value="mahasiswa" data-discount="0.20" checked>
                                <span class="text-xs font-bold text-slate-800">Mahasiswa</span>
                            </div>
                            <span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-bold">Diskon 20%</span>
                        </label>
                        <label class="border border-slate-200 p-3.5 rounded-2xl flex items-center justify-between cursor-pointer hover:border-teal-500 hover:bg-teal-50/20 bg-white shadow-sm transition">
                            <div class="flex items-center">
                                <input class="profession-radio me-2 text-teal-600 focus:ring-teal-500" type="radio" name="profession" value="guru" data-discount="0.15">
                                <span class="text-xs font-bold text-slate-800">Guru / Dosen</span>
                            </div>
                            <span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-bold">Diskon 15%</span>
                        </label>
                        <label class="border border-slate-200 p-3.5 rounded-2xl flex items-center justify-between cursor-pointer hover:border-teal-500 hover:bg-teal-50/20 bg-white shadow-sm transition">
                            <div class="flex items-center">
                                <input class="profession-radio me-2 text-teal-600 focus:ring-teal-500" type="radio" name="profession" value="umum" data-discount="0">
                                <span class="text-xs font-bold text-slate-800">Umum</span>
                            </div>
                            <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[10px] font-bold">Normal</span>
                        </label>
                    </div>
                </div>

                <!-- Fasilitas Tambahan -->
                @if (!empty($facilities))
                <div class="space-y-3">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                        <i class="fa-solid fa-box-open me-1 text-brand-600"></i> Fasilitas Tambahan (Opsional)
                    </label>
                    <div class="space-y-2 bg-slate-50/80 p-4 rounded-2xl border border-slate-200">
                        @foreach ($facilities as $key => $fac)
                            <div class="flex items-center justify-between py-1.5 border-b last:border-b-0 border-slate-200/60">
                                <div class="flex items-center">
                                    <input class="w-4 h-4 text-teal-600 border-slate-300 rounded focus:ring-teal-500 facility-checkbox" type="checkbox" name="facilities[]" value="{{ $key }}" data-price="{{ $fac['price'] }}" id="fac_{{ $key }}">
                                    <label class="ml-2.5 text-sm text-slate-700 font-medium cursor-pointer" for="fac_{{ $key }}">
                                        {{ $fac['name'] }}
                                    </label>
                                </div>
                                <span class="text-xs font-bold font-mono text-teal-700">+ Rp {{ number_format($fac['price'], 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- FITUR 2: Dynamic Live Price Calculator Box -->
                <div class="bg-gradient-to-br from-slate-900 via-slate-900 to-brand-950 text-white p-6 rounded-3xl shadow-xl space-y-3 border border-slate-800">
                    <h5 class="font-extrabold text-xs uppercase tracking-widest border-b border-slate-800 pb-2.5 text-amber-400 flex items-center">
                        <i class="fa-solid fa-calculator mr-2"></i> Live Estimation Summary
                    </h5>
                    <div class="flex justify-between text-xs text-slate-400">
                        <span>Biaya Dasar Kursus:</span>
                        <span id="live-base-price" class="font-mono text-white">Rp 0</span>
                    </div>
                    <div class="flex justify-between text-xs text-slate-400">
                        <span>Potongan Diskon:</span>
                        <span id="live-discount" class="font-mono text-rose-400">- Rp 0 (0%)</span>
                    </div>
                    <div class="flex justify-between text-xs text-slate-400">
                        <span>Fasilitas Tambahan:</span>
                        <span id="live-facility" class="font-mono text-teal-400">+ Rp 0</span>
                    </div>
                    <div class="border-t border-slate-800 pt-3 flex justify-between items-center">
                        <span class="font-bold text-sm text-slate-200">Grand Total Pembayaran:</span>
                        <span id="live-grand-total" class="font-extrabold text-2xl text-emerald-400 font-mono">Rp 0</span>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="pt-2 flex items-center gap-3">
                    <a href="{{ route('enrollments.index') }}" class="w-1/3 py-3.5 px-4 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-sm text-center transition">
                        Batal
                    </a>
                    <button class="w-2/3 py-3.5 px-5 rounded-xl bg-gradient-to-r from-brand-700 to-brand-600 hover:from-brand-800 hover:to-brand-700 text-white font-bold text-sm shadow-lg shadow-brand-700/25 transition-all flex items-center justify-center" type="submit">
                        <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Pendaftaran
                    </button>
                </div>
            </form>
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
                        <li><a href="{{ route('courses.index') }}" class="hover:text-brand-500 transition">Daftar Kursus</a></li>
                        <li><a href="{{ route('enrollments.index') }}" class="hover:text-brand-500 transition">Laporan Enrollment</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Tugas Praktikum</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><span class="text-brand-400 font-medium">Tugas 12:</span> Relational Core &amp; Cascade</li>
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

    <!-- SCRIPT INTERAKTIF (AUTO-FILL PESERTA, LIVE CALCULATOR, & SEAT AVAILABILITY) -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const participantSelect = document.getElementById('participant_id');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const courseSelect = document.getElementById('course_id');
            const professionRadios = document.querySelectorAll('.profession-radio');
            const facilityCheckboxes = document.querySelectorAll('.facility-checkbox');

            const availabilityBox = document.getElementById('availability');
            const availabilityText = document.getElementById('availability-text');
            const progressContainer = document.getElementById('seat-progress-container');
            const progressText = document.getElementById('seat-progress-text');
            const progressBar = document.getElementById('seat-progress-bar');

            const basePriceEl = document.getElementById('live-base-price');
            const discountEl = document.getElementById('live-discount');
            const facilityEl = document.getElementById('live-facility');
            const grandTotalEl = document.getElementById('live-grand-total');

            function formatRupiah(angka) {
                return 'Rp ' + Math.round(angka).toLocaleString('id-ID');
            }

            // 1. Auto-fill Nama & Email saat Participant dipilih
            if (participantSelect) {
                participantSelect.addEventListener('change', function () {
                    const selected = this.options[this.selectedIndex];
                    if (selected && selected.value) {
                        nameInput.value = selected.getAttribute('data-name') || '';
                        emailInput.value = selected.getAttribute('data-email') || '';
                    } else {
                        nameInput.value = '';
                        emailInput.value = '';
                    }
                });
            }

            // 2. Hitung Estimasi Biaya & Update Kuota Kursi
            function updateSummary() {
                const selectedCourse = courseSelect.options[courseSelect.selectedIndex];
                const basePrice = selectedCourse ? parseFloat(selectedCourse.getAttribute('data-price') || 0) : 0;

                let discountRate = 0;
                professionRadios.forEach(radio => {
                    if (radio.checked) {
                        discountRate = parseFloat(radio.getAttribute('data-discount') || 0);
                    }
                });

                let facilityTotal = 0;
                facilityCheckboxes.forEach(cb => {
                    if (cb.checked) {
                        facilityTotal += parseFloat(cb.getAttribute('data-price') || 0);
                    }
                });

                const discountAmount = basePrice * discountRate;
                const grandTotal = Math.max(0, (basePrice - discountAmount) + facilityTotal);

                basePriceEl.textContent = formatRupiah(basePrice);
                discountEl.textContent = `- ${formatRupiah(discountAmount)} (${Math.round(discountRate * 100)}%)`;
                facilityEl.textContent = `+ ${formatRupiah(facilityTotal)}`;
                grandTotalEl.textContent = formatRupiah(grandTotal);
            }

            function updateSeatAvailability() {
                const selectedCourse = courseSelect.options[courseSelect.selectedIndex];
                if (!selectedCourse || !selectedCourse.value) {
                    availabilityBox.className = 'p-4 rounded-2xl bg-slate-50 border border-slate-200 text-slate-700 text-sm flex items-center shadow-sm transition-all';
                    availabilityText.textContent = 'Pilih kursus untuk memeriksa sisa kuota kursi secara real-time.';
                    progressContainer.classList.add('hidden');
                    return;
                }

                const totalQuota = parseInt(selectedCourse.getAttribute('data-quota') || 20, 10);
                const remaining = Math.max(3, Math.floor(totalQuota * 0.65));
                const percentage = Math.min(100, Math.round((remaining / totalQuota) * 100));

                availabilityBox.className = 'p-4 rounded-2xl bg-teal-50/70 border border-teal-200 text-teal-900 text-sm flex items-center shadow-sm transition-all';
                availabilityText.innerHTML = `Status Kuota: <strong>Tersedia (${remaining} dari ${totalQuota} kursi tersisa)</strong> — Pendaftaran aktif.`;
                
                progressContainer.classList.remove('hidden');
                progressText.textContent = `${remaining} / ${totalQuota} Kursi`;
                progressBar.style.width = `${percentage}%`;
            }

            courseSelect.addEventListener('change', function () {
                updateSummary();
                updateSeatAvailability();
            });

            professionRadios.forEach(radio => radio.addEventListener('change', updateSummary));
            facilityCheckboxes.forEach(cb => cb.addEventListener('change', updateSummary));

            // Inisialisasi saat halaman pertama kali dimuat (termasuk saat old() input kembali)
            updateSummary();
            updateSeatAvailability();
        });
    </script>
</body>
</html>