<div align="center">

# 🧪 Test Matrix — Pertemuan 9 (KursusKu Laravel)

![Status](https://img.shields.io/badge/Test_Suite-100%25_PASSED-10b981?style=for-the-badge&logo=checkmarx&logoColor=white)
![Framework](https://img.shields.io/badge/Laravel-v10.50.4-ef4444?style=for-the-badge&logo=laravel&logoColor=white)
![UI](https://img.shields.io/badge/Tailwind_CSS-Glassmorphism-0d9488?style=for-the-badge&logo=tailwindcss&logoColor=white)

*Dokumentasi pengujian fungsionalitas antarmuka, validasi form pendaftaran, serta endpoint JSON Ajax real-time.*

</div>

---

### 📋 Matriks Skenario & Hasil Pengujian

| No | Skenario Pengujian | Metode / Aksi | Output yang Diharapkan | Status |
| :--- | :--- | :--- | :--- | :---: |
| **01** | **Home Layout & Glassmorphism** | Akses `GET /` di browser | Halaman beranda tampil utuh dengan efek *glass-card* dan palet warna *Teal/Slate*. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **02** | **Navbar & Header Responsive** | Uji tampilan *desktop* & *mobile* | Navigasi tetap lengket (*sticky*), rapi, dan tidak tumpang tindih di berbagai ukuran layar. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **03** | **Halaman Pendaftaran Dibuka** | Klik menu `Daftar Kursus` / `GET /registration` | Form pendaftaran terbuka lengkap dengan input identitas, metode belajar, radio, & checkbox. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **04** | **State Awal Dropdown Kursus** | Buka form tanpa memilih program | Dropdown berada di posisi default (`-- Pilih Kursus --`), kotak kuota menunggu pilihan. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **05** | **Pilih Web Dasar (Ajax Check)** | Pilih opsi `Web Dasar` (`WEB-01`) | Request Ajax terpicu otomatis; menampilkan sisa kursi tersedia secara *real-time*. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **06** | **Pilih PHP Dasar (Ajax Check)** | Pilih opsi `PHP Dasar` (`PHP-01`) | Sisa kuota dan biaya kursus diperbarui dinamis tanpa me-reload halaman. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **07** | **Status Kursus Penuh (`LAR-01`)** | Cek opsi `Laravel Fundamental` | Opsi berstatus *disabled* / penuh sehingga tidak dapat dipilih peserta baru. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **08** | **Submit Data & Email Valid** | Isi seluruh field wajib lalu klik `Kirim` | Request `POST` lolos token `@csrf` dan validasi server; menampilkan notifikasi sukses. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **09** | **Submit Email Tidak Valid** | Isi format email salah (tanpa `@`) | Browser & validasi Laravel menolak pengiriman dan menampilkan pesan peringatan. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **10** | **Inspeksi Network JSON (`200 OK`)** | Buka DevTools > Tab *Network* > Fetch/XHR | Endpoint `EnrollmentController@availability` mengembalikan respons JSON berstatus `200 OK`. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |

---

### 🔍 Catatan Evaluasi & Pengujian

* **Integritas Antarmuka & Blade:** Seluruh komponen UI (*Navbar*, *Hero*, *Katalog*, dan *Form Pendaftaran*) terintegrasi mulus dengan arsitektur Blade Laravel dan Tailwind CSS.
* **Desain Visual Kustom:** Menggunakan konsep *Glassmorphism* terang (`rgba(255, 255, 255, 0.90)` dengan `backdrop-filter: blur`) beraksen *Teal* (`#0f766e`), memberikan identitas visual yang bersih dan modern.
* **Performa Asynchronous (Ajax/JSON):** Fitur pengecekan sisa kursi berhasil berkomunikasi dengan method `availability()` di `EnrollmentController` dan merender respons JSON secara instan tanpa memuat ulang halaman (*zero page-reload*).