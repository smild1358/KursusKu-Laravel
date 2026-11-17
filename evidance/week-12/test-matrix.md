<div align="center">

# 🧪 Test Matrix — Praktikum Minggu 12
### *Pengujian Relasi Database, Validasi Duplikasi, & Cascade Delete*

![Status](https://img.shields.io/badge/Test_Suite-100%25_PASSED-10b981?style=for-the-badge&logo=checkmarx&logoColor=white)
![Database](https://img.shields.io/badge/Database-MySQL_Relational-0f766e?style=for-the-badge&logo=mysql&logoColor=white)
![Framework](https://img.shields.io/badge/Laravel-v10-ef4444?style=for-the-badge&logo=laravel&logoColor=white)

*Dokumentasi pengujian end-to-end untuk memastikan integritas foreign key, laporan relasional, dan proteksi duplikasi pada proyek **KursusKu**.*

---

**Nama:** RAHMAD ILLAHI &nbsp;|&nbsp; **NIM:** 2524215 &nbsp;|&nbsp; **Kelas:** PTIK 5G &nbsp;|&nbsp; **Mata Kuliah:** Pemrograman Web III

</div>

---

### 📋 Daftar Skenario Pengujian (End-to-End Test Cases)

| No. | Skenario Pengujian | Langkah & Data Uji | Hasil yang Diharapkan | Hasil Aktual (Actual) | Status | Bukti Dokumentasi |
| :---: | :--- | :--- | :--- | :--- | :---: | :--- |
| **01** | **Struktur Skema & Foreign Key DB** | Menjalankan `php artisan migrate` dan memeriksa tabel `enrollments` di HeidiSQL. | Terbentuk FK `participant_id` & `course_id` dengan `ON DELETE CASCADE` dan `UNIQUE` composite. | Struktur kolom, indeks unik, dan relasi FK sesuai rancangan ERD. | **PASS** | `02-migration.png`<br>`03-foreign-key.png` |
| **02** | **Akses Form Tambah Enrollment** | Membuka URL `/enrollments/create` di browser. | Form tampil dengan dropdown daftar `Participant` dan daftar `Course` berstatus *open*. | Seluruh data master dari database muncul rapi pada masing-masing dropdown. | **PASS** | `08-pesan-duplicate.png` |
| **03** | **Validasi Input Kosong** | Mengirim form tanpa memilih peserta atau kursus. | Sistem menolak submit dan menampilkan pesan validasi *required*. | Submit ditolak; pesan peringatan validasi tampil di bagian atas form. | **PASS** | `-` |
| **04** | **Simpan Pendaftaran Valid (Kasus 1)** | Memilih **Alya Rahma** dan kursus **Laravel Dasar**, lalu klik *Simpan Enrollment*. | Data tersimpan ke tabel `enrollments` dengan status default `registered`. | Data berhasil disimpan dan dialihkan ke halaman laporan dengan flash message sukses. | **PASS** | `09-laporan-enrollment.png` |
| **05** | **Proteksi Pendaftaran Ganda (Duplikat)** | Mendaftarkan kembali **Alya Rahma** ke kursus **Laravel Dasar** untuk kedua kalinya. | Validasi menolak input dan menampilkan pesan bahwa peserta sudah terdaftar. | Ditolak dengan pesan: *"Peserta ini sudah terdaftar pada program kursus tersebut."* | **PASS** | `08-pesan-duplicate.png` |
| **06** | **Peserta Sama ke Kursus Berbeda** | Mendaftarkan **Alya Rahma** ke kursus lain (**PHP Fundamental**). | Diperbolehkan tersimpan karena kombinasi `(participant_id, course_id)` berbeda. | Berhasil tersimpan sebagai baris enrollment baru di database. | **PASS** | `09-laporan-enrollment.png` |
| **07** | **Peserta Berbeda ke Kursus Sama** | Mendaftarkan **Bima Putra** ke kursus **Laravel Dasar**. | Diperbolehkan tersimpan karena `participant_id` berbeda. | Berhasil tersimpan dan tampil pada laporan pendaftaran. | **PASS** | `09-laporan-enrollment.png` |
| **08** | **Tampilan Laporan Relasional** | Membuka halaman `/enrollments` (menggunakan Eager Loading `with()`). | Menampilkan gabungan nama peserta, nama kursus, `start_date` dari Course, dan status. | Seluruh kolom lintas tabel tampil akurat tanpa error relasi *null*. | **PASS** | `09-laporan-enrollment.png` |
| **09** | **Uji Cascade Delete (Hapus Course)** | Membuat data dummy `Course` + `Enrollment` via Tinker, lalu menjalankan `$course->delete()`. | Record `Enrollment` terkait ikut terhapus otomatis; data `Participant` tetap utuh. | `Enrollment::count()` untuk course tersebut menjadi `0`; `Participant` tetap ada. | **PASS** | `10-test-cascade-course.png` |
| **10** | **Uji Cascade Delete (Hapus Participant)** | Membuat data dummy `Participant` + `Enrollment` via Tinker, lalu menjalankan `$participant->delete()`. | Record `Enrollment` terkait ikut terhapus otomatis; data `Course` tetap utuh. | `Enrollment::count()` untuk participant tersebut menjadi `0`; `Course` tetap ada. | **PASS** | `10-test-cascade-course.png` |

---

### 🔍 Verifikasi Query SQL Database
```sql
SELECT id, participant_id, course_id, status, created_at 
FROM enrollments 
ORDER BY id DESC;
```
> **Kesimpulan:** Seluruh 10 skenario pengujian relasi database, validasi bisnis, dan *referential integrity* berjalan **100% sukses** tanpa kendala.