<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Menjalankan seeder data program kursus untuk pengujian pagination,
     * pencarian (q), dan filter status (open, closed, draft).
     */
    public function run(): void
    {
        $courses = $this->courseDataset();

        foreach ($courses as $index => $item) {
            Course::updateOrCreate(
                ['code' => $item['code']],
                [
                    'name'        => $item['name'],
                    'description' => $this->buildDescription($item['name']),
                    'fee'         => $item['fee'],
                    'quota'       => $item['quota'],
                    'start_date'  => now()->addDays(7 + $index)->toDateString(),
                    'status'      => $item['status'],
                ]
            );
        }
    }

    /**
     * Menyusun deskripsi pelatihan yang konsisten dan terstruktur.
     */
    private function buildDescription(string $courseName): string
    {
        return 'Program pelatihan terstruktur ' . $courseName . ' dengan studi kasus industri dan bimbingan mentor.';
    }

    /**
     * Dataset 22 program kursus (12 open, 5 closed, 5 draft).
     *
     * @return array<int, array{code: string, name: string, fee: int, quota: int, status: string}>
     */
    private function courseDataset(): array
    {
        return [
            ['code' => 'WEB-01', 'name' => 'Web Developer Fundamental', 'fee' => 350000, 'quota' => 25, 'status' => 'open'],
            ['code' => 'PHP-101', 'name' => 'PHP 8 Modern & OOP', 'fee' => 400000, 'quota' => 20, 'status' => 'open'],
            ['code' => 'LRV-101', 'name' => 'Laravel 10 Dasar', 'fee' => 500000, 'quota' => 30, 'status' => 'open'],
            ['code' => 'LRV-201', 'name' => 'Laravel Eloquent & Relasi Database', 'fee' => 600000, 'quota' => 20, 'status' => 'open'],
            ['code' => 'SQL-101', 'name' => 'MySQL Database Design & Query', 'fee' => 350000, 'quota' => 25, 'status' => 'open'],
            ['code' => 'JS-101', 'name' => 'JavaScript ES6+ Interaktif', 'fee' => 400000, 'quota' => 20, 'status' => 'open'],
            ['code' => 'JQR-101', 'name' => 'jQuery & Ajax Progressive UX', 'fee' => 300000, 'quota' => 18, 'status' => 'open'],
            ['code' => 'TWD-101', 'name' => 'Tailwind CSS Glassmorphism UI', 'fee' => 350000, 'quota' => 22, 'status' => 'open'],
            ['code' => 'API-101', 'name' => 'RESTful API dengan Laravel Sanctum', 'fee' => 650000, 'quota' => 15, 'status' => 'open'],
            ['code' => 'GIT-101', 'name' => 'Git & GitHub Kolaborasi Tim', 'fee' => 250000, 'quota' => 30, 'status' => 'open'],
            ['code' => 'WEB-02', 'name' => 'Web Modern Responsif', 'fee' => 450000, 'quota' => 20, 'status' => 'open'],
            ['code' => 'VUE-101', 'name' => 'Vue.js 3 Frontend Dasar', 'fee' => 550000, 'quota' => 15, 'status' => 'open'],
            ['code' => 'RCT-101', 'name' => 'React JS Component Architecture', 'fee' => 600000, 'quota' => 15, 'status' => 'closed'],
            ['code' => 'UIX-101', 'name' => 'UI/UX Design System Figma', 'fee' => 400000, 'quota' => 20, 'status' => 'closed'],
            ['code' => 'SEC-101', 'name' => 'Keamanan Aplikasi Web OWASP', 'fee' => 700000, 'quota' => 12, 'status' => 'closed'],
            ['code' => 'PYT-101', 'name' => 'Python Dasar untuk Otomasi', 'fee' => 450000, 'quota' => 25, 'status' => 'closed'],
            ['code' => 'DSA-101', 'name' => 'Struktur Data & Algoritma', 'fee' => 500000, 'quota' => 20, 'status' => 'closed'],
            ['code' => 'DCK-101', 'name' => 'Docker Deployment untuk Laravel', 'fee' => 750000, 'quota' => 10, 'status' => 'draft'],
            ['code' => 'TST-101', 'name' => 'Automated Testing dengan Pest PHP', 'fee' => 550000, 'quota' => 15, 'status' => 'draft'],
            ['code' => 'NJS-101', 'name' => 'Node.js & Express Backend', 'fee' => 600000, 'quota' => 18, 'status' => 'draft'],
            ['code' => 'MOB-101', 'name' => 'Flutter Mobile App Starter', 'fee' => 650000, 'quota' => 20, 'status' => 'draft'],
            ['code' => 'AI-101', 'name' => 'Integrasi AI API pada Web App', 'fee' => 800000, 'quota' => 15, 'status' => 'draft'],
        ];
    }
}