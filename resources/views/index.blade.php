@extends('layouts.app')

@section('title', 'Beranda — KursusKu')

@section('content')
<!-- Hero Section -->
<div class="hero-gradient rounded-3xl p-8 sm:p-12 lg:p-16 text-white shadow-2xl relative overflow-hidden mb-12">
    <div class="absolute -right-10 -bottom-10 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="relative z-10 max-w-2xl">
        <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-teal-500/30 border border-teal-400/30 text-teal-200 text-xs font-semibold uppercase tracking-wider mb-6">
            <i class="fa-solid fa-sparkles"></i> Platform Pembelajaran Interaktif V2.0
        </span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight mb-6">
            Kuasai Keahlian Masa Depan Bersama <span class="text-teal-300">KursusKu</span>
        </h1>
        <p class="text-slate-200 text-base sm:text-lg mb-8 leading-relaxed">
            Sistem pendaftaran kursus pemrograman terpadu dengan mesin kalkulasi biaya otomatis, simulasi diskon, dan manajemen mode belajar fleksibel.
        </p>
        <div class="flex flex-wrap items-center gap-4">
            <a href="{{ url('/register') }}" class="px-7 py-3.5 rounded-xl bg-white text-teal-900 font-bold shadow-xl hover:bg-teal-50 active:scale-95 transition-all">
                Daftar Kursus Sekarang
            </a>
            <a href="{{ url('/fee-calculator') }}" class="px-7 py-3.5 rounded-xl bg-teal-800/60 border border-teal-500/40 text-white font-semibold hover:bg-teal-800 transition-all">
                Cek Kalkulator Biaya
            </a>
        </div>
    </div>
</div>

<!-- Fitur Unggulan -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
    <div class="glass-card p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
        <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center text-xl mb-4">
            <i class="fa-solid fa-calculator"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-2">Dynamic Fee Engine</h3>
        <p class="text-sm text-slate-600 leading-relaxed">Perhitungan harga otomatis berdasarkan tipe peserta (Mahasiswa, Guru, Umum) dengan potongan diskon khusus secara real-time.</p>
    </div>

    <div class="glass-card p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
        <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center text-xl mb-4">
            <i class="fa-solid fa-laptop-code"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-2">Flexible Learning Mode</h3>
        <p class="text-sm text-slate-600 leading-relaxed">Pilihan mode pembelajaran lengkap: Tatap Muka (Offline), Online Live Class, hingga Hybrid dengan badge visual estetis.</p>
    </div>

    <div class="glass-card p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
        <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center text-xl mb-4">
            <i class="fa-solid fa-shield-halved"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-2">Secure & Reliable</h3>
        <p class="text-sm text-slate-600 leading-relaxed">Dibangun di atas kerangka kerja modern dengan validasi input ketat, penanganan session aman, serta sinkronisasi data yang mulus.</p>
    </div>
</div>
@endsection