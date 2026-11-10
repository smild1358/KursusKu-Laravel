<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Menampilkan halaman utama (Landing Page)
    public function index() 
    {
        $courses = Course::latest()->get();
        return view('welcome', compact('courses'));
    }

    // Menampilkan daftar data pendaftaran (Index / Tabel CRUD)
    public function listData() 
    {
        $registrations = Registration::latest()->get();
        return view('registrations.index', compact('registrations'));
    }

    // Menampilkan form tambah pendaftaran / kursus
    public function create() 
    {
        return view('courses.create');
    }

    // Menyimpan data kursus baru (menggunakan StoreCourseRequest)
    public function store(StoreCourseRequest $request) 
    {
        Course::create($request->validated());

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan.');   
    }

    // Menyimpan data pendaftaran baru dengan kalkulasi diskon yang diperbaiki
    public function storeRegistration(Request $request) 
    {
        $validated = $request->validate([
            'full_name'        => 'required|string|max:255',
            'email'            => 'required|email|unique:registrations,email',
            'phone'            => 'required|string|max:15',
            'participant_type' => 'required|string',
            'course_name'      => 'required|string',
            'learning_mode'    => 'required|string',
        ]);

        // Kalkulasi Diskon Otomatis (Diperbaiki dari error operator sebelumnya)
        $baseFee = 500000;
        $discount = match($validated['participant_type']) {
            'Mahasiswa' => 0.20,
            'Guru'      => 0.15,
            default     => 0.05,
        };

        // Perbaikan rumus total fee (Harga dasar dikurangi besar diskon)
        $validated['total_fee'] = $baseFee - ($baseFee * $discount);

        Registration::create($validated);

        return redirect()->route('registrations.index')
            ->with('success', 'Yeay! Data pendaftaran berhasil ditambahkan secara profesional.');
    }

    // Menampilkan detail data Course (Route Model Binding)
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // Menampilkan detail data Registration berdasarkan ID
    public function showRegistration($id) 
    {
        $registration = Registration::findOrFail($id);
        return view('registrations.show', compact('registration'));
    }

    // Menampilkan form edit Course
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Mengupdate data Course (menggunakan UpdateCourseRequest)
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return to_route('courses.show', $course)
            ->with('success', 'Kursus berhasil diperbarui.');
    }

    // Mengupdate data pendaftaran (Registration) dengan kalkulasi diskon yang diperbaiki
    public function updateRegistration(Request $request, $id) 
    {
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

        // Perbaikan rumus total fee
        $validated['total_fee'] = $baseFee - ($baseFee * $discount);

        $registration->update($validated);

        return redirect()->route('registrations.index')
            ->with('success', 'Data pendaftaran berhasil diperbarui!');
    }

    // Menghapus data Course
    public function destroy(Course $course)
    {
        $course->delete();

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }

    // Menghapus data Registration
    public function destroyRegistration($id) 
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()->route('registrations.index')
            ->with('success', 'Data berhasil dihapus dari sistem.');
    }

    // (Opsional) Method riwayat lama diarahkan ke index data
    public function history() 
    {
        return redirect()->route('registrations.index');
    }
}