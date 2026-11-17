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
    public function home() 
    {
        $courses = Course::latest()->get();
        return view('welcome', compact('courses'));
    }

    // Menampilkan daftar data Kursus (Modul Pertemuan 10 - CRUD Course)
    public function index() 
    {
        $courses = Course::latest()->get();
        return view('courses.index', compact('courses'));
    }

    // Menampilkan form tambah Course baru
    public function create() 
    {
        return view('courses.create');
    }

    // Menyimpan data Course baru dengan Form Request
    public function store(StoreCourseRequest $request) 
    {
        Course::create($request->validated());

        return redirect()->route('courses.index')
            ->with('success', 'Yeay! Data kursus berhasil ditambahkan secara profesional.');
    }

    // Menampilkan detail Course (Route Model Binding)
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // Menampilkan form edit Course
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Mengupdate Course menggunakan Form Request & Route Model Binding
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return redirect()->route('courses.index')
            ->with('success', 'Data kursus berhasil diperbarui!');
    }

    // Menghapus Course (Route Model Binding)
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Data kursus berhasil dihapus dari sistem.');
    }


    // ==========================================
    // CONTROLLER PENDUKUNG: REGISTRATION (TUGAS SEBELUMNYA)
    // ==========================================

    public function listData() 
    {
        $registrations = Registration::latest()->get();
        return view('registrations.index', compact('registrations'));
    }

    public function createRegistration() 
    {
        return view('registrations.create');
    }

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

        $baseFee = 500000;
        $discount = match($validated['participant_type']) {
            'Mahasiswa' => 0.20,
            'Guru'      => 0.15,
            default     => 0.05,
        };

        $validated['total_fee'] = $baseFee - ($baseFee * $discount);

        Registration::create($validated);

        return redirect()->route('registrations.index')
            ->with('success', 'Data pendaftaran berhasil ditambahkan!');
    }

    public function showRegistration($id) 
    {
        $registration = Registration::findOrFail($id);
        return view('registrations.show', compact('registration'));
    }

    public function editRegistration($id) 
    {
        $registration = Registration::findOrFail($id);
        return view('registrations.edit', compact('registration'));
    }

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

        $validated['total_fee'] = $baseFee - ($baseFee * $discount);

        $registration->update($validated);

        return redirect()->route('registrations.index')
            ->with('success', 'Data pendaftaran berhasil diperbarui!');
    }

    public function destroyRegistration($id) 
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()->route('registrations.index')
            ->with('success', 'Data pendaftaran berhasil dihapus.');
    }

    public function history() 
    {
        return redirect()->route('registrations.index');
    }
}