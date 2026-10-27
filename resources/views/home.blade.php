@extends('layouts.app')

@section('title', 'Beranda — KursusKu Laravel')

@section('content')
<!-- FITUR 3: Glassmorphism Hero Section -->
<section class="py-5">
    <div class="row align-items-center g-5">
        <div class="col-lg-7">
            <span class="badge bg-teal-subtle text-teal fw-bold px-3 py-2 rounded-pill mb-3 border border-teal">
                <i class="fa-solid fa-rocket me-1"></i> Platform Edukasi Web Pertemuan 7 & 9
            </span>
            <h1 class="display-4 fw-extrabold tracking-tight mb-3">
                Kuasai Pemrograman Web Bersama <span class="text-teal">KursusKu Laravel</span>
            </h1>
            <p class="lead text-secondary mb-4">
                Nikmati kemudahan pendaftaran kursus interaktif dengan pengecekan sisa kursi berbasis <strong>jQuery Ajax asynchronous</strong> tanpa perlu memuat ulang (*reload*) halaman.
            </p>
            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('enrollments.create') }}" class="btn btn-teal btn-lg">
                    <i class="fa-solid fa-user-plus me-2"></i> Daftar Sekarang
                </a>
                <a href="#katalog" class="btn btn-outline-secondary btn-lg rounded-3">
                    <i class="fa-solid fa-layer-group me-2"></i> Lihat Katalog
                </a>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="glass-card p-4 text-center">
                <div class="bg-teal text-white rounded-4 p-4 mb-3">
                    <i class="fa-solid fa-laptop-code display-1"></i>
                </div>
                <h5 class="fw-bold mb-1">Interactive Ajax Engine Active</h5>
                <p class="small text-muted mb-0">Terhubung secara live dengan backend route JSON Laravel.</p>
            </div>
        </div>
    </div>
</section>

<!-- FITUR 3: Interactive Course Cards -->
<section id="katalog" class="py-5">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h2 class="fw-bold m-0">Katalog Program Unggulan</h2>
            <p class="text-muted m-0">Pilih program terbaik untuk peningkatan keahlian Anda.</p>
        </div>
    </div>

    <div class="row g-4">
        @foreach ($featured as $course)
            <div class="col-md-4">
                <div class="glass-card h-100 p-4 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-dark text-warning font-monospace">{{ $course['code'] }}</span>
                            <span class="badge bg-teal-subtle text-teal border border-teal">{{ $course['level'] }}</span>
                        </div>
                        <h4 class="fw-bold mb-2"><i class="fa-solid {{ $course['icon'] }} text-teal me-2"></i>{{ $course['name'] }}</h4>
                        <p class="text-secondary small mb-3">{{ $course['description'] }}</p>
                    </div>
                    <div>
                        <hr class="my-3 opacity-25">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted small">Biaya Kursus</span>
                            <span class="fw-extrabold text-teal font-monospace fs-5">Rp {{ number_format($course['price'], 0, ',', '.') }}</span>
                        </div>
                        <a href="{{ route('enrollments.create') }}" class="btn btn-teal w-100">
                            Pilih Kursus Ini <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection