@extends('layouts.app')

@section('content')
<div class="container py-4" style="max-width: 800px;">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1 fw-bold text-dark">Detail Kursus</h1>
            <p class="text-muted mb-0"><span class="badge bg-secondary">{{ $course->code }}</span> {{ $course->name }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary shadow-sm">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <dl class="row mb-0 gy-3">
                <dt class="col-sm-3 text-muted">Kode Kursus</dt>
                <dd class="col-sm-9 fw-semibold">{{ $course->code }}</dd>

                <dt class="col-sm-3 text-muted">Nama Kursus</dt>
                <dd class="col-sm-9 fw-semibold">{{ $course->name }}</dd>

                <dt class="col-sm-3 text-muted">Deskripsi</dt>
                <dd class="col-sm-9 text-secondary">{{ $course->description ?: '-' }}</dd>

                <dt class="col-sm-3 text-muted">Biaya</dt>
                <dd class="col-sm-9 fw-semibold text-success">Rp {{ number_format($course->fee, 0, ',', '.') }}</dd>

                <dt class="col-sm-3 text-muted">Kuota</dt>
                <dd class="col-sm-9">{{ $course->quota }} peserta</dd>

                <dt class="col-sm-3 text-muted">Tanggal Mulai</dt>
                <dd class="col-sm-9">{{ $course->start_date?->format('d-m-Y') }}</dd>

                <dt class="col-sm-3 text-muted">Status</dt>
                <dd class="col-sm-9">
                    @php
                        $badgeColors = ['draft' => 'secondary', 'open' => 'success', 'closed' => 'danger'];
                    @endphp
                    <span class="badge bg-{{ $badgeColors[$course->status] ?? 'primary' }} px-3 py-2 text-uppercase">
                        {{ ucfirst($course->status) }}
                    </span>
                </dd>
            </dl>
        </div>
    </div>
</div>
@endsection