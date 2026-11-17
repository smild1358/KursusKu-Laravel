<div align="center">

# 🤖 AI Usage Log — Praktikum Minggu 12
### *Relational Database, Foreign Key Constraints, & Eloquent Relationships*

![Milestone](https://img.shields.io/badge/Milestone-Week_12_Relational_Core-0f766e?style=for-the-badge&logo=laravel&logoColor=white)
![Status](https://img.shields.io/badge/Verification-100%25_Verified-10b981?style=for-the-badge&logo=checkmarx&logoColor=white)
![Stack](https://img.shields.io/badge/Tech_Stack-Laravel_10_%7C_MySQL_%7C_Tailwind-14b8a6?style=for-the-badge&logo=php&logoColor=white)

*Catatan interaksi asisten AI, analisis troubleshooting, dan keputusan arsitektur selama pengembangan modul relasi database pada proyek **KursusKu**.*

---

**Nama:** RAHMAD ILLAHI &nbsp;|&nbsp; **NIM:** 2524215 &nbsp;|&nbsp; **Kelas:** PTIK 5G &nbsp;|&nbsp; **Institusi:** UIN SMDD Bukittinggi

</div>

---

### 📑 Matriks Konsultasi & Implementasi AI

| No. | Topik / Permasalahan (Prompt) | Saran & Solusi dari AI | Keputusan & Hasil Verifikasi |
| :---: | :--- | :--- | :--- |
| **01** | **Error Migrasi Tabel Sudah Ada**<br>*"Kenapa muncul error `Table 'courses' already exists` saat menjalankan `php artisan migrate`?"* | AI menyarankan agar tidak mengubah migration lama dan menjalankan migrasi spesifik atau membiarkan Laravel hanya mengeksekusi file migration baru (`create_participants_table` dan `create_enrollments_table`). | **Diterima.** Kedua tabel baru berhasil dibuat dengan status `Ran` tanpa mengganggu data `courses` yang sudah ada. |
| **02** | **Perancangan Relasi Eloquent 3 Entitas**<br>*"Bagaimana cara menghubungkan model `Course`, `Participant`, dan `Enrollment` menggunakan Eloquent?"* | AI memberikan struktur relasi `hasMany(Enrollment::class)` pada `Course` & `Participant`, `belongsTo` pada `Enrollment`, serta `belongsToMany` konseptual melalui tabel pivot `enrollments`. | **Diterima.** Diuji menggunakan `php artisan tinker` dan relasi lintas model mengembalikan koleksi data dengan akurat. |
| **03** | **Penggabungan View Form Pendaftaran**<br>*"Bagaimana menggabungkan form pendaftaran lama dengan fitur relasi `participant_id` dan `course_id` agar tampilannya selaras dengan beranda?"* | AI merancang ulang tampilan `enrollments/create.blade.php` menggunakan gaya *Glassmorphism* (*Teal/Slate*), mempertahankan kalkulator estimasi harga, dan menambahkan *dropdown* relasional dari database. | **Diterima.** Form tampil estetik, responsif, dan terintegrasi langsung ke `EnrollmentController@store`. |
| **04** | **Validasi Pencegahan Pendaftaran Ganda**<br>*"Kenapa validasi duplikasi pendaftaran perlu dibuat dua lapis di Laravel dan Database?"* | AI menyarankan kombinasi `Rule::unique('enrollments')->where(...)` di Controller (untuk pesan error UX yang ramah) dan `$table->unique(['participant_id', 'course_id'])` di level database. | **Diterima.** Saat peserta didaftarkan dua kali pada kursus yang sama, sistem menolak dengan pesan error khusus. |
| **05** | **Pengujian Integritas Referensial (`Cascade Delete`)**<br>*"Bagaimana cara membuktikan bahwa `cascadeOnDelete()` bekerja dengan aman tanpa menghapus master data lain?"* | AI memandu pengujian melalui `php artisan tinker` menggunakan data dummy (`TEST-CASCADE`), menghapus induk `Course` atau `Participant`, lalu mengecek tabel `enrollments`. | **Diterima.** Record `enrollments` terkait otomatis terhapus, sementara master entitas di sisi seberang tetap aman. |

---

> *Seluruh saran kode telah ditinjau ulang, disesuaikan dengan aturan bisnis aplikasi KursusKu, dan diuji langsung pada lingkungan server lokal Laragon.*