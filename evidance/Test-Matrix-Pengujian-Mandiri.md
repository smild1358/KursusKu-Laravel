# 🧪 Test Matrix - Pengujian Mandiri (Pertemuan 7)

**Aplikasi:** KursusKu-Laravel  
**Penguji:** Rahmad Illahi  
**Tanggal Pengujian:** 28 Oktober 2026  

---

## 📊 Matriks Kasus Uji (Minimal 12 Kasus)

| No | Modul / Fitur | Skenario Pengujian | Input / Aksi | Ekspektasi Hasil | Status (Pass/Fail) |
| :---: | :--- | :--- | :--- | :--- | :---: |
| **1** | Routing Beranda | Akses URL Beranda Utama | Buka `http://127.0.0.1:8000/` | Berhasil menampilkan halaman Landing Page | **PASS** |
| **2** | Routing Kursus | Akses URL Daftar Kursus | Buka `http://127.0.0.1:8000/courses` | Menampilkan daftar pilihan program kursus | **PASS** |
| **3** | Routing Detail | Akses URL Detail Availability | Buka `http://127.0.0.1:8000/courses/laravel/availability` | Menampilkan status ketersediaan kuota kursus | **PASS** |
| **4** | Form Pendaftaran | Akses Form Pendaftaran | Buka `http://127.0.0.1:8000/pendaftaran` | Halaman form pendaftaran terbuka dengan rapi | **PASS** |
| **5** | Form Pendaftaran | Input Data Pendaftaran Valid | Mengisi nama, email, dan memilih kursus valid | Sistem berhasil memproses dan lanjut ke preview | **PASS** |
| **6** | Form Pendaftaran | Submit Form Tanpa Nama (Kosong) | Mengosongkan kolom nama lalu klik Submit | Muncul pesan eror validasi input wajib diisi | **PASS** |
| **7** | Form Pendaftaran | Submit Email Format Salah | Mengisi email `rahmad@` (tanpa domain) | Validasi menolak input email tidak valid | **PASS** |
| **8** | Controller Logic | Pemrosesan Data di Controller | Mengirim request via POST `pendaftaran/preview` | Data dari form berhasil ditangkap dan dikirim ke Blade | **PASS** |
| **9** | Blade Layout | Komponen Layout Header & Footer | Berpindah antar halaman aplikasi | Header dan Footer tetap konsisten di semua halaman | **PASS** |
| **10**| Responsive View | Tampilan Layar Mobile (HP) | Mengaktifkan mode Inspect Mobile (375px) | Layout beranda menyesuaikan secara responsif | **PASS** |
| **11**| Route List Check | Pengecekan Daftar Route via CLI | Jalankan `php artisan route:list` di terminal | Menampilkan seluruh daftar route yang terdaftar | **PASS** |
| **12**| Route Handling | Akses Route Tidak Dikenal (404) | Buka `http://127.0.0.1:8000/halaman-salah` | Menampilkan halaman eror 404 Not Found | **PASS** |

---

### 📝 Catatan Hasil Pengujian:
* Seluruh 12 kasus uji telah dijalankan secara mandiri pada lingkungan lokal (Laragon + PHP 8.2).
* Aplikasi berhasil memenuhi standar alur *Request Lifecycle* Laravel (Route -> Controller -> View/Blade).