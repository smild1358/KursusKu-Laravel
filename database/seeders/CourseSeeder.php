<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['code' => 'WEB-101', 'name' => 'Web Dasar', 'description' => 'HTML, CSS, dan dasar web', 'fee' => 200000, 'quota' => 25, 'start_date' => '2026-11-03', 'status' => 'open'],
            ['code' => 'PHP-101', 'name' => 'PHP Dasar', 'description' => 'PHP Fundamental', 'fee' => 400000, 'quota' => 25, 'start_date' => '2026-11-03', 'status' => 'open'],
            ['code' => 'LAV-101', 'name' => 'Laravel Dasar', 'description' => 'Laravel Dasar', 'fee' => 500000, 'quota' => 20, 'start_date' => '2026-11-03', 'status' => 'open'],
            ['code' => 'SQL-101', 'name' => 'MySQL Dasar', 'description' => 'MySQL Dasar', 'fee' => 250000, 'quota' => 30, 'start_date' => '2026-11-03', 'status' => 'open'],
            ['code' => 'UI-101', 'name' => 'UI/UX', 'description' => 'Bootstrap UI', 'fee' => 300000, 'quota' => 25, 'start_date' => '2026-11-03', 'status' => 'draft'],
            ['code' => 'JS-101', 'name' => 'JavaScript Dasar', 'description' => 'JavaScript Dasar', 'fee' => 400000, 'quota' => 20, 'start_date' => '2026-11-03', 'status' => 'open'],
            ['code' => 'AJAX-101', 'name' => 'jQuery dan Ajax', 'description' => 'jQuery dan Ajax', 'fee' => 450000, 'quota' => 20, 'start_date' => '2026-11-03', 'status' => 'draft'],
            ['code' => 'API-101', 'name' => 'REST API Dasar', 'description' => 'REST API', 'fee' => 550000, 'quota' => 18, 'start_date' => '2026-11-03', 'status' => 'closed'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}