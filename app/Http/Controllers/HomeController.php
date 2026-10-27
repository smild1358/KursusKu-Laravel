<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $siteName = 'KursusKu Elite';
        
        // Data Kursus Master (Array Multidimensi)
        $featured = [
            [
                'id' => 1,
                'code' => 'WEB-01',
                'name' => 'Web Developer Fundamental',
                'level' => 'Beginner',
                'description' => 'Kuasai HTML5, CSS3 Grid/Flexbox, JavaScript ES6+, dan Bootstrap 5 secara terstruktur.',
                'price' => 450000,
                'icon' => 'fa-code'
            ],
            [
                'id' => 2,
                'code' => 'PHP-01',
                'name' => 'PHP 8 & MySQL Web Backend',
                'level' => 'Intermediate',
                'description' => 'Pelajari sintaks modern PHP 8, OOP dasar, manipulasi array, dan kalkulasi bisnis server-side.',
                'price' => 550000,
                'icon' => 'fa-server'
            ],
            [
                'id' => 3,
                'code' => 'LAR-01',
                'name' => 'Laravel 11 Masterclass',
                'level' => 'Advanced',
                'description' => 'Bangun arsitektur MVC, Blade Layout, Vite, CSRF Protection, dan Ajax Engine profesional.',
                'price' => 750000,
                'icon' => 'fa-cubes'
            ]
        ];

        return view('home', compact('siteName', 'featured'));
    }
}