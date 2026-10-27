@extends('layouts.app')

@section('title', 'Kalkulator Biaya — KursusKu')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="text-center mb-10">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Kalkulator Estimasi Biaya</h1>
        <p class="text-slate-600 text-sm mt-2">Simulasikan biaya kursus pilihan Anda secara instan dan transparan.</p>
    </div>

    <div class="glass-card p-8 rounded-3xl shadow-xl">
        <form action="{{ url('/fee-calculator') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Pilih Program Kursus</label>
                <select name="kursus" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition-all">
                    <option value="web">Fullstack Web Development (Rp 1.500.000)</option>
                    <option value="mobile">Mobile App Development (Rp 1.800.000)</option>
                    <option value="data">Data Science & AI (Rp 2.000.000)</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Status Peserta</label>
                <select name="status" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition-all">
                    <option value="mahasiswa">Mahasiswa (Diskon 20%)</option>
                    <option value="guru">Guru / Pengajar (Diskon 25%)</option>
                    <option value="umum">Umum / Profesional</option>
                </select>
            </div>

            <button type="submit" class="w-full py-4 rounded-xl bg-teal-600 text-white font-bold shadow-lg shadow-teal-600/30 hover:bg-teal-700 active:scale-[0.99] transition-all">
                Hitung Estimasi Biaya
            </button>
        </form>
    </div>
</div>
@endsection