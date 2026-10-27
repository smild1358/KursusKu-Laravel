@extends('layouts.app')

@section('title', 'Form Pendaftaran Kursus — KursusKu Laravel')

@section('content')
<div class="row justify-content-center py-4">
    <div class="col-lg-8">
        <div class="glass-card p-4 p-md-5">
            <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                <div class="bg-teal text-white p-3 rounded-3 fs-3">
                    <i class="fa-solid fa-file-pen"></i>
                </div>
                <div>
                    <h2 class="fw-extrabold mb-1">Formulir Pendaftaran Kursus</h2>
                    <p class="text-secondary mb-0">Isi data diri dan pilih program kursus yang Anda inginkan.</p>
                </div>
            </div>

            <form method="POST" action="{{ route('enrollments.preview') }}">
                @csrf

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold"><i class="fa-solid fa-user me-1 text-teal"></i> Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control form-control-lg rounded-3 @error('name') is-invalid @enderror" placeholder="Masukkan nama lengkap Anda" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold"><i class="fa-solid fa-envelope me-1 text-teal"></i> Alamat Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror" placeholder="nama@email.com" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Select Kursus -->
                <div class="mb-3">
                    <label for="course_id" class="form-label fw-bold"><i class="fa-solid fa-graduation-cap me-1 text-teal"></i> Pilih Program Kursus</label>
                    <select id="course_id" name="course_id" class="form-select form-select-lg rounded-3 @error('course_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Program Kursus --</option>
                        @foreach ($courses as $id => $course)
                            <option value="{{ $id }}" data-price="{{ $course['price'] }}" @selected(old('course_id') == $id)>
                                {{ $course['name'] }} — Rp {{ number_format($course['price'], 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- FITUR 1: FITUR AJAX SEAT AVAILABILITY WIDGET & PROGRESS BAR -->
                <div id="availability" class="alert alert-secondary rounded-3 mb-3">
                    <i class="fa-solid fa-circle-info me-2"></i> Pilih kursus untuk memeriksa sisa kuota kursi secara real-time.
                </div>

                <div id="seat-progress-container" class="mb-4 d-none">
                    <div class="d-flex justify-content-between small text-muted mb-1">
                        <span>Kapasitas Bangku Virtual</span>
                        <span id="seat-progress-text" class="fw-bold">0 / 0</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div id="seat-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%"></div>
                    </div>
                </div>

                <!-- Status Pekerjaan (Diskon) -->
                <div class="mb-4">
                    <label class="form-label fw-bold"><i class="fa-solid fa-briefcase me-1 text-teal"></i> Status Pekerjaan / Profesi (Potongan Diskon)</label>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-check-card border p-3 rounded-3 d-block cursor-pointer">
                                <input class="form-check-input me-2" type="radio" name="profession" value="mahasiswa" checked>
                                <strong>Mahasiswa</strong> <span class="badge bg-success float-end">Diskon 20%</span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="form-check-card border p-3 rounded-3 d-block cursor-pointer">
                                <input class="form-check-input me-2" type="radio" name="profession" value="guru">
                                <strong>Guru / Dosen</strong> <span class="badge bg-success float-end">Diskon 15%</span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="form-check-card border p-3 rounded-3 d-block cursor-pointer">
                                <input class="form-check-input me-2" type="radio" name="profession" value="umum">
                                <strong>Umum</strong> <span class="badge bg-secondary float-end">Harga Normal</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Fasilitas Tambahan -->
                <div class="mb-4">
                    <label class="form-label fw-bold"><i class="fa-solid fa-box-open me-1 text-teal"></i> Fasilitas Tambahan (Opsional)</label>
                    @foreach ($facilities as $key => $fac)
                        <div class="form-check mb-2">
                            <input class="form-check-input facility-checkbox" type="checkbox" name="facilities[]" value="{{ $key }}" data-price="{{ $fac['price'] }}" id="fac_{{ $key }}">
                            <label class="form-check-label d-flex justify-content-between" for="fac_{{ $key }}">
                                <span>{{ $fac['name'] }}</span>
                                <span class="fw-bold text-teal">+ Rp {{ number_format($fac['price'], 0, ',', '.') }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>

                <!-- FITUR 2: Dynamic Live Price Calculator Box -->
                <div class="bg-dark text-white p-4 rounded-4 mb-4">
                    <h5 class="fw-bold border-bottom border-secondary pb-2 mb-3 text-warning">
                        <i class="fa-solid fa-calculator me-2"></i> Live Estimation Summary
                    </h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-white-50">Biaya Dasar Kursus:</span>
                        <span id="live-base-price" class="font-monospace">Rp 0</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-white-50">Potongan Diskon:</span>
                        <span id="live-discount" class="font-monospace text-danger">- Rp 0 (0%)</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-white-50">Fasilitas Tambahan:</span>
                        <span id="live-facility" class="font-monospace text-info">+ Rp 0</span>
                    </div>
                    <hr class="border-secondary my-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold fs-6">Grand Total Pembayaran:</span>
                        <span id="live-grand-total" class="fw-extrabold fs-3 text-success font-monospace">Rp 0</span>
                    </div>
                </div>

                <button class="btn btn-teal btn-lg w-100" type="submit">
                    <i class="fa-solid fa-paper-plane me-2"></i> Kirim Pendaftaran
                </button>
            </form>
        </div>
    </div>
</div>
@endsection