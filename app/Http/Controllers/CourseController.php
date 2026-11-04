<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Menampilkan halaman utama (Landing Page)
    public function index() {
        return view('welcome');
    }

    // Menampilkan daftar data pendaftaran (Index / Tabel CRUD)
    public function listData() {
        $registrations = Registration::latest()->get();
        return view('registrations.index', compact('registrations'));
    }

    // Menampilkan form tambah pendaftaran
    public function create() {
        return view('registrations.create');
    }

    // Menyimpan data baru dengan Server-side Validation & Eloquent
    public function store(Request $request) {
        $validated = $request->validate([
            'full_name'        => 'required|string|max:255',
            'email'            => 'required|email|unique:registrations,email',
            'phone'            => 'required|string|max:15',
            'participant_type' => 'required|string',
            'course_name'      => 'required|string',
            'learning_mode'    => 'required|string',
        ]);

        // Kalkulasi Diskon Otomatis
        $baseFee = 500000;
        $discount = match($validated['participant_type']) {
            'Mahasiswa' => 0.20,
            'Guru'      => 0.15,
            default     => 0.05,
        };

        $validated['total_fee'] = $baseFee - ($baseFee * $discount);

        Registration::create($validated);

        return redirect()->route('registrations.index')
            ->with('success', 'Yeay! Data pendaftaran berhasil ditambahkan secara profesional.');
    }

    // Menampilkan detail data (Show)
    public function show($id) {
        $registration = Registration::findOrFail($id);
        return view('registrations.show', compact('registration'));
    }

    // Menampilkan form edit data
    public function edit($id) {
        $registration = Registration::findOrFail($id);
        return view('registrations.edit', compact('registration'));
    }

    // Mengupdate data pendaftaran
    public function update(Request $request, $id) {
        $registration = Registration::findOrFail($id);

        $validated = $request->validate([
            'full_name'        => 'required|string|max:255',
            'email'            => 'required|email|unique:registrations,email,' . $id,
            'phone'            => 'required|string|max:15',
            'participant_type' => 'required|string',
            'course_name'      => 'required|string',
            'learning_mode'    => 'required|string',
        ]);

        $baseFee = 500000;
        $discount = match($validated['participant_type']) {
            'Mahasiswa' => 0.20,
            'Guru'      => 0.15,
            default     => 0.05,
        };

        $validated['total_fee'] = $baseFee - ($baseFee * $discount);

        $registration->update($validated);

        return redirect()->route('registrations.index')
            ->with('success', 'Data pendaftaran berhasil diperbarui!');
    }

    // Menghapus data (Delete)
    public function destroy($id) {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()->route('registrations.index')
            ->with('success', 'Data berhasil dihapus dari sistem.');
    }

    // (Opsional) Method riwayat lama diarahkan ke index data
    public function history() {
        return redirect()->route('registrations.index');
    }
}