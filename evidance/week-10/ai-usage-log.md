<div align="center">

# 🤖 AI Usage Log — Pertemuan 10 (KursusKu Laravel)

![Module](https://img.shields.io/badge/Praktikum-Database_%26_CRUD_I-0f766e?style=for-the-badge)
![Role](https://img.shields.io/badge/AI_Role-Tutor_%26_Code_Reviewer-6366f1?style=for-the-badge)
![Compliance](https://img.shields.io/badge/Code_Ownership-100%25_Verified-10b981?style=for-the-badge)

*Log transparansi penggunaan kecerdasan buatan (AI) sebagai mitra pembelajaran dalam perancangan migrasi database, model Eloquent, dan logika controller.*

</div>

---

### 📊 Tabel Riwayat Konsultasi & Debugging

| Masalah / Tujuan | Prompt Singkat | Saran & Solusi AI | Keputusan | Hasil Uji |
| :--- | :--- | :--- | :---: | :--- |
| **Desain Schema Migration** | *"Bagaimana struktur blueprint migration tabel courses untuk proyek kursus online?"* | Menyarankan tipe data spesifik seperti `unsignedInteger` untuk biaya, `unsignedSmallInteger` untuk kuota, dan `enum` untuk status. | **Diterima** | Tabel database tercipta optimal dan efisien dalam penggunaan memori. |
| **Konfigurasi Model & Cast Tanggal** | *"Bagaimana cara setting fillable dan cast tanggal start_date di Laravel 10/11?"* | Mengarahkan penulisan properti `$fillable` dan method `casts(): array` untuk memetakan kolom tanggal ke objek Carbon. | **Diterima** | Tanggal mulai dapat diformat dengan mudah menggunakan method `format('d/m/Y')` di Blade. |
| **Penyusunan Method Controller Store** | *"Bagaimana cara menulis validasi dan method store menggunakan Course::create di resource controller?"* | Menyediakan contoh array validasi lengkap serta eksekusi `Course::create($data)` dilanjutkan dengan `to_route()->with('success', ...)`. | **Diterima** | Data berhasil masuk ke MySQL dan pesan sukses muncul dengan baik. |
| **Penanganan Error Query Database** | *"Solusi error SQLSTATE[HY000] [1049] Unknown database saat migrate"* | Memeriksa kecocokan nama database pada file `.env` dengan nama database yang dibuat di phpMyAdmin Laragon. | **Diterima** | Koneksi kembali terhubung dan perintah migrasi berjalan sukses. |

---

### 📝 Catatan Refleksi & Etika Penggunaan AI
> AI digunakan secara bijak sebagai sarana asistensi teknis untuk mempercepat pemahaman sintaks migrasi Eloquent dan struktur aturan validasi (*validation rules*). Seluruh proses penulisan kode di dalam editor, pengujian fitur *form input*, verifikasi data di dalam database MySQL, serta analisis hasil uji dilakukan secara mandiri guna memastikan penguasaan konsep dasar pemrograman web secara utuh.