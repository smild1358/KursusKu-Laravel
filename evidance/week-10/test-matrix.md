<div align="center">

# 🧪 Test Matrix — Pertemuan 10 (Laravel Database & CRUD I)

![Status](https://img.shields.io/badge/Milestone_10-100%25_PASSED-10b981?style=for-the-badge&logo=checkmarx&logoColor=white)
![Framework](https://img.shields.io/badge/Laravel-v10.50.4-ef4444?style=for-the-badge&logo=laravel&logoColor=white)
![Database](https://img.shields.io/badge/MySQL-Laragon-0d9488?style=for-the-badge&logo=mysql&logoColor=white)

*Dokumentasi pengujian fungsionalitas basis data, migrasi, validasi form, serta operasi Create & Read (Eloquent ORM).*

</div>

---

### 📋 Matriks Pengujian Fungsional (Test Cases)

| No | Skenario Pengujian | Input / Aksi | Output yang Diharapkan | Status |
| :--- | :--- | :--- | :--- | :---: |
| **01** | **Koneksi Database & Migrasi** | `php artisan migrate` | Tabel `courses` berhasil terbentuk di database `kursusku` tanpa error. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **02** | **Akses Halaman Index** | `GET /courses` | Halaman daftar kursus terbuka dan menampilkan data dari database MySQL. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **03** | **Akses Form Tambah Kursus** | `GET /courses/create` | Form input lengkap dengan `@csrf`, field teks, angka, tanggal, dan select status. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **04** | **Simpan Data Valid (Create)** | Isi semua field valid, klik *Simpan* | Data masuk ke MySQL, redirect ke indeks, dan muncul pesan sukses (*flash message*). | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **05** | **Validasi Field Kosong** | Kosongkan field `code` atau `name` | Validasi server menolak proses dan menampilkan pesan error di bawah input. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **06** | **Validasi Unique Code** | Input kode kursus (`WEB-101`) duplikat | Ditolak oleh aturan `unique:courses,code` agar tidak terjadi duplikasi data. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **07** | **Validasi Batas Angka (Min/Max)** | Masukkan `fee` negatif atau `quota` 0 | Ditolak oleh rule validasi (`min:0` / `min:1`) pada controller. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |
| **08** | **Persistensi Data (Read)** | Reload halaman atau buka ulang aplikasi | Data tetap tersimpan secara permanen karena bersumber langsung dari MySQL. | ![PASS](https://img.shields.io/badge/PASS-10b981?style=flat-square) |

---

### 🔍 Catatan Evaluasi Pengujian
* **Integritas ORM:** Model `Course` menggunakan properti `$fillable` secara tepat untuk mencegah *mass assignment vulnerability*, serta *cast* tanggal otomatis.
* **Alur Request:** Implementasi pola RESTful Resource Route menyederhanakan pemetaan URL standar ke dalam method `CourseController`.