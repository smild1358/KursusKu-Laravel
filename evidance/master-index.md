<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
  <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  <img src="https://img.shields.io/badge/Status-Elite%20Edition-red" alt="Elite Edition">
  <img src="https://img.shields.io/badge/Framework-Laravel-orange" alt="Laravel">
  <img src="https://img.shields.io/badge/License-MIT-blue" alt="License">
</p>

# 📚 KursusKu-Laravel (Elite Edition)

Selamat datang di pusat dokumentasi dan indeks master untuk proyek **KursusKu-Laravel**. Repositori ini berisi sistem pengelolaan kursus berbasis web yang dikembangkan menggunakan framework Laravel dengan standar arsitektur tingkat lanjut.

---

## 🗂️ Struktur Direktori Proyek

Berikut adalah peta navigasi direktori utama yang terdapat dalam repositori ini:

| Direktori / File | Deskripsi & Fungsi Utama |
| :--- | :--- |
| **`app/`** | Berisi inti logika aplikasi (Controllers, Models, Middleware, Services). |
| **`bootstrap/`** | Berisi file *framework bootstrapping* dan pengaturan autoloader (`app.php`). |
| **`config/`** | Seluruh file konfigurasi sistem aplikasi (database, mail, session, dll). |
| **`database/`** | Berisi migrasi database (`migrations`), *seeders*, dan *factories*. |
| **`evidance/`** | Kumpulan dokumentasi pendukung, tangkapan layar, atau laporan uji coba lapangan. |
| **`public/`** | Titik masuk publik (*entry point*), berisi file aset frontend (CSS, JS, gambar). |
| **`resources/`** | Berisi file tampilan mentah (`views`), aset SCSS/JS, dan komponen frontend. |
| **`routes/`** | Pengaturan jalur navigasi aplikasi (`web.php`, `api.php`, `console.php`). |
| **`storage/`** | Penyimpanan file *logs*, direktori unggahan (*uploads*), dan *cache* terstruktur. |
| **`tests/`** | Direktori pengujian otomatis menggunakan Unit Testing & Feature Testing (PHPUnit). |
| **`Structure Overview File Proyek.txt`** | Dokumen teks ringkas yang merangkum blueprint dan struktur arsitektur proyek. |

---

## ⚙️ Persyaratan Sistem & Instalasi

Pastikan lingkungan lokal Anda (seperti Laragon dengan Apache/Nginx dan PHP terbaru) memenuhi kebutuhan berikut:

* **PHP** >= 8.2
* **Composer** >= 2.x
* **Node.js & NPM** (untuk kompilasi aset via Vite)
* **Database MySQL / MariaDB**

### Langkah Cepat Setup:
```bash
# 1. Clone repositori ke local directory
git clone [https://github.com/smild1358/KursusKu-Laravel.git](https://github.com/smild1358/KursusKu-Laravel.git)

# 2. Masuk ke direktori proyek
cd KursusKu-Laravel

# 3. Instal dependensi PHP
composer install

# 4. Salin file konfigurasi lingkungan
cp .env.example .env

# 5. Generate kunci aplikasi
php artisan key:generate

# 6. Jalankan migrasi database
php artisan migrate --seed

# 7. Jalankan server lokal
php artisan serve