<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
    return view('welcome'); // Diubah dari 'home' menjadi 'welcome'
    }

    // Menampilkan halaman form pendaftaran
    public function create() {
        return view('registrations.create');
    }

    // Menyimpan data pendaftaran dan kalkulasi biaya otomatis
    public function store(Request $request) {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'participant_type' => 'required|string',
            'course_name' => 'required|string',
            'learning_mode' => 'required|string',
        ]);

        // Kalkulasi Biaya Berdasarkan Tipe Peserta
        $baseFee = 500000;
        $discount = match($validated['participant_type']) {
            'Mahasiswa' => 0.20, // Diskon 20%
            'Guru'      => 0.15, // Diskon 15%
            default     => 0.05, // Diskon Umum 5%
        };

        // Perbaikan rumus perhitungan total biaya setelah diskon
        $validated['total_fee'] = $baseFee - ($baseFee * $discount);

        // Simpan ke database
        Registration::create($validated);

        // Redirect ke halaman riwayat dengan pesan sukses
        return redirect()->route('registrations.history')->with('success', 'Pendaftaran KursusKu berhasil disimpan!');
    }

    // Menampilkan riwayat pendaftaran
    public function history() {
        $registrations = Registration::latest()->get();
        return view('registrations.history', compact('registrations'));
    }
}