<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    // Mengambil Master Data Kursus & Fasilitas
    private function getMasterData()
    {
        return [
            'courses' => [
                1 => ['name' => 'Web Developer Fundamental', 'price' => 450000, 'remaining' => 12, 'total' => 20],
                2 => ['name' => 'PHP 8 & MySQL Web Backend', 'price' => 550000, 'remaining' => 4, 'total' => 15],
                3 => ['name' => 'Laravel 11 Masterclass', 'price' => 750000, 'remaining' => 8, 'total' => 25],
            ],
            'facilities' => [
                'cert' => ['name' => 'Sertifikat Cetak Edisi Khusus', 'price' => 50000],
                'modul' => ['name' => 'Buku Modul Praktikum & Akses Source Code', 'price' => 75000],
                'mentor' => ['name' => 'Sesi Konsultasi Private Mentor 1-on-1', 'price' => 150000],
            ]
        ];
    }

    public function create()
    {
        $data = $this->getMasterData();
        return view('enrollments.create', [
            'courses' => $data['courses'],
            'facilities' => $data['facilities']
        ]);
    }

    public function preview(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email'],
            'course_id' => ['required', 'integer'],
            'profession' => ['required', 'string'],
            'learning_mode' => ['required', 'string'],
            'facilities' => ['nullable', 'array']
        ]);

        return back()
            ->with('success', 'Formulir Pendaftaran berhasil diproses dan lolos validasi server-side Laravel @csrf!')
            ->withInput();
    }

    public function availability(int $course)
    {
        $master = $this->getMasterData()['courses'];

        if (!isset($master[$course])) {
            return response()->json(['error' => 'Kursus tidak ditemukan'], 404);
        }

        $item = $master[$course];

        return response()->json([
            'course' => $item['name'],
            'price' => $item['price'],
            'remaining' => $item['remaining'],
            'total_capacity' => $item['total'],
            'status' => $item['remaining'] > 5 ? 'Available' : 'Limited Seats'
        ]);
    }
}