<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Participant;
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

    // Menampilkan daftar data Kursus (Modul Pertemuan 13 - Search, Filter Status, Pagination & Partial Ajax)
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q'));
        $status = trim((string) $request->query('status'));
        $allowedStatuses = ['open', 'closed', 'draft'];

        $courses = Course::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('code', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%");
                });
            })
            ->when(in_array($status, $allowedStatuses, true), function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        // Response khusus jika dipanggil via jQuery Ajax (partial=1)
        if ($request->boolean('partial')) {
            return view('courses._results', compact('courses'));
        }

        // Statistik ringkas untuk Dashboard Count Milestone 13
        $stats = [
            'total_courses'      => Course::count(),
            'open_courses'       => Course::where('status', 'open')->count(),
            'total_participants' => Participant::count(),
            'total_enrollments'  => Enrollment::count(),
        ];

        return view('courses.index', compact('courses', 'search', 'status', 'stats'));
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

        $validated['total_fee'] = $this->calculateRegistrationFee($validated['participant_type']);

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

        $validated['total_fee'] = $this->calculateRegistrationFee($validated['participant_type']);

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

    // Helper perhitungan biaya pendaftaran agar konsisten antara store & update registration
    private function calculateRegistrationFee(string $participantType): float
    {
        $baseFee = 500000;
        $discount = match ($participantType) {
            'Mahasiswa' => 0.20,
            'Guru'      => 0.15,
            default     => 0.05,
        };

        return $baseFee - ($baseFee * $discount);
    }
}