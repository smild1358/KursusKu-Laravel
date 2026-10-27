<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    private function getCoursesData()
    {
        return [
            1 => ['name' => 'Web Dasar HTML & CSS', 'fee' => 300000, 'remaining' => 12, 'capacity' => 20],
            2 => ['name' => 'PHP Fundamental & OOP', 'fee' => 350000, 'remaining' => 4, 'capacity' => 20],
            3 => ['name' => 'Laravel Framework Mastery', 'fee' => 500000, 'remaining' => 8, 'capacity' => 20],
        ];
    }

    private function getFacilitiesData()
    {
        return [
            'cert' => ['name' => 'Sertifikat Fisik & E-Badge', 'fee' => 50000],
            'modul' => ['name' => 'Modul Cetak & Source Code', 'fee' => 75000],
            'lab' => ['name' => 'Akses Server Lab Cloud (1 Bulan)', 'fee' => 100000],
        ];
    }

    public function create()
    {
        $courses = $this->getCoursesData();
        $facilities = $this->getFacilitiesData();

        return view('enrollments.create', compact('courses', 'facilities'));
    }

    public function preview(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email'],
            'course_id' => ['required', 'integer'],
        ]);

        return back()
            ->with('success', 'Form berhasil divalidasi dan siap diproses! (Database CRUD akan aktif di Pertemuan 10).')
            ->withInput();
    }

    // JSON Endpoint untuk Ajax Request
    public function availability(int $course)
    {
        $courses = $this->getCoursesData();

        abort_unless(isset($courses[$course]), 404);

        $data = $courses[$course];

        return response()->json([
            'course' => $data['name'],
            'remaining' => $data['remaining'],
            'total_capacity' => $data['capacity'],
            'price' => $data['fee']
        ]);
    }
}