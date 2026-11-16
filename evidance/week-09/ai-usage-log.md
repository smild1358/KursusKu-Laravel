<div align="center">

# 🤖 AI Usage Log — Pertemuan 9 (KursusKu Laravel)

![Module](https://img.shields.io/badge/Praktikum-Pemrograman_Web_III-0f766e?style=for-the-badge)
![Role](https://img.shields.io/badge/AI_Role-Tutor_%26_Debugger-6366f1?style=for-the-badge)
![Compliance](https://img.shields.io/badge/Code_Ownership-100%25_Verified-10b981?style=for-the-badge)

*Log transparansi pemanfaatan kecerdasan buatan (AI) dalam pengembangan fitur Form Dinamis, Validasi Controller, dan Endpoint JSON.*

</div>

---

### 📊 Tabel Riwayat Konsultasi & Debugging

| Masalah / Tujuan | Prompt Singkat | Saran & Solusi AI | Keputusan | Hasil Uji |
| :--- | :--- | :--- | :---: | :--- |
| **Setup Tailwind CSS & Tipografi Modern** | *"Cara konfigurasi Tailwind CDN dengan font Plus Jakarta Sans dan palet warna custom brand teal di Blade"* | Tambahkan konfigurasi `tailwind.config` pada `<head>` dan definisikan class `.glass-card` dengan properti `backdrop-filter: blur(12px)`. | **Diterima** | Seluruh halaman beranda dan form tampil konsisten dengan gaya *Glassmorphism*. |
| **Pembuatan Master Layout & Navigasi Sticky** | *"Cara membuat header navbar sticky melayang yang reusable antara halaman home dan pendaftaran"* | Gunakan class `sticky top-4 z-50` pada elemen `<header>` serta tautkan rute menggunakan helper `{{ route('home') }}`. | **Diterima** | Navigasi antar halaman berjalan mulus tanpa *broken link*. |
| **Endpoint JSON Ketersediaan Kursus** | *"Cara membuat method controller di Laravel yang mengembalikan data sisa kursi dalam format JSON"* | Buat method `availability(int $course)` di `EnrollmentController` yang mengembalikan `response()->json([...])` beserta status `404` jika ID tidak ditemukan. | **Diterima** | Tab *Network* di browser menampilkan payload JSON valid dengan status `200 OK`. |
| **Perluasan Field Form & Validasi Server** | *"Cara menambahkan input Prodi, Metode Belajar, Radio Jenis Peserta, dan Checkbox Minat beserta validasinya"* | Tambahkan atribut `name` bertipe array (`minat[]`) pada checkbox dan perbarui aturan `$request->validate([...])` pada method `preview()`. | **Diterima** | Data form berhasil diproses dan dipertahankan dengan `withInput()` saat kembali. |
| **Penanganan Error Terminal (`php not recognized`)** | *"Mengapa perintah php artisan serve tidak dikenali di terminal VS Code?"* | Daftarkan direktori `bin\php` milik Laragon ke *Environment Variables (PATH)* Windows lalu mulai ulang terminal. | **Diterima** | Perintah `php artisan route:list` dan `serve` berjalan normal tanpa kendala. |

---

### 📝 Catatan Refleksi & Etika Penggunaan AI

> Dalam pengerjaan praktikum Pertemuan 9 ini, AI dimanfaatkan secara bertanggung jawab sebagai **mitra *debugging* dan referensi arsitektur**—khususnya saat menyusun struktur validasi `EnrollmentController` dan mengonfigurasi utilitas Tailwind CSS. Seluruh integrasi kode ke dalam proyek `kursusku-laravel`, penyesuaian elemen formulir (radio, checkbox, textarea), serta pengujian *payload* JSON melalui DevTools *Network* dilakukan dan diverifikasi secara mandiri untuk memastikan pemahaman menyeluruh terhadap alur data **Client (Ajax/Form) $\rightarrow$ Route $\rightarrow$ Controller $\rightarrow$ JSON/Blade Response**.