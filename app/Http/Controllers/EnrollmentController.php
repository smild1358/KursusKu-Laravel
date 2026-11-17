<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnrollmentController extends Controller
{
    // Mengambil Master Data Kursus & Fasilitas (Dari kode lama untuk mendukung fitur preview/availability lama)
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

    // Menampilkan laporan relasional enrollment (Fitur Week 12)
    public function index()
    {
        $enrollments = Enrollment::with(['participant', 'course'])->latest()->get();
        return view('enrollments.index', compact('enrollments'));
    }

    // Menampilkan form tambah enrollment dengan pilihan dropdown database & master data
    public function create()
    {
        $data = $this->getMasterData();
        $participants = Participant::orderBy('name')->get();
        $coursesDb = Course::where('status', 'open')->orderBy('name')->get();

        return view('enrollments.create', [
            'courses' => $data['courses'],
            'facilities' => $data['facilities'],
            'participants' => $participants,
            'coursesDb' => $coursesDb
        ]);
    }

    // Menyimpan data enrollment dengan validasi pencegahan duplikasi berbasis database (Week 12)
    public function store(Request $request)
    {
        $data = $request->validate([
            'participant_id' => ['required', 'exists:participants,id'],
            'course_id'      => [
                'required',
                'exists:courses,id',
                Rule::unique('enrollments')->where(
                    fn ($query) => $query->where('participant_id', $request->participant_id)
                ),
            ],
        ], [
            'course_id.unique' => 'Peserta ini sudah terdaftar pada program kursus tersebut.',
        ]);

        $data['status'] = 'registered';

        Enrollment::create($data);

        return redirect()->route('enrollments.index')
            ->with('success', 'Yeay! Pendaftaran (enrollment) kursus berhasil disimpan secara profesional.');
    }

    // Method Preview lama
    public function preview(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email'],
            'telepon' => ['required', 'string'],
            'prodi' => ['nullable', 'string'],
            'course' => ['required', 'string'],
            'metode' => ['required', 'string'],
            'jenis_peserta' => ['required', 'string'],
            'minat' => ['nullable', 'array'],
            'catatan' => ['nullable', 'string'],
            'course_id' => ['required', 'integer'],
            'profession' => ['required', 'string'],
            'learning_mode' => ['required', 'string'],
            'facilities' => ['nullable', 'array']
        ]);

        return back()
            ->with('success', 'Formulir Pendaftaran berhasil diproses dan lolos validasi server-side Laravel @csrf!')
            ->withInput();
    }

    // Method Availability lama
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