<div align="center">

<img src="https://img.shields.io/badge/KursusKu_Laravel-Milestone_13-0f766e?style=for-the-badge&logo=laravel&logoColor=white" alt="KursusKu Laravel" />
<img src="https://img.shields.io/badge/Course-Pemrograman_Web_III-0d9488?style=for-the-badge" alt="Course" />
<img src="https://img.shields.io/badge/Audit-Search_Filter_Pagination_Ajax-14b8a6?style=for-the-badge" alt="Audit" />

# 🤖 AI Usage Log & Audit Pengembangan — Praktikum Minggu 13

*Catatan interaksi terarah dengan AI sebagai reviewer dalam merancang fitur Data Discovery (`q`, Filter Status, Pagination `withQueryString`) & Progressive Enhancement (jQuery Ajax Debounce 300ms) pada proyek **KursusKu**.*

</div>

---

### 📌 Identitas Mahasiswa & Konteks Audit

| Atribut | Detail Informasi |
| :--- | :--- |
| **Nama Mahasiswa** | **RAHMAD ILLAHI** |
| **NIM / Kelas** | `2524215` — **PTIK 5G** |
| **Institusi** | UIN Sjech M. Djamil Djambek Bukittinggi |
| **Komponen Diaudit** | `CourseController@index`, `courses/index.blade.php`, `courses/_results.blade.php`, `AppServiceProvider.php` |
| **Batasan (*Constraints*)** | Tanpa mengubah skema database; wajib mempertahankan form `GET` sebagai fallback non-JS; pagination 10 item/halaman. |

---

### 📋 Log Interaksi & Keputusan Teknis (*AI Usage Log*)

| No. | Masalah / Prompt Terarah | Saran AI | Keputusan | Alasan & Verifikasi Pengujian |
| :---: | :--- | :--- | :---: | :--- |
| **01** | Bagaimana mempertahankan keyword `q` dan filter `status` saat berpindah ke halaman 2 pagination? | Menggunakan *method chaining* `->paginate(10)->withQueryString()` pada Eloquent query di `CourseController@index`. | ![Diterima](https://img.shields.io/badge/Diterima-0d9488?style=flat-square) | Mencegah hilangnya *state* filter saat klik *Next* / Page 2 di URL (`?status=open&page=2`). |
| **02** | Bagaimana mencegah hasil menjadi 0 data ketika parameter `status` dikirim kosong (`?status=`)? | Membungkus kondisi dengan `->when(in_array($status, ['open', 'closed', 'draft'], true), ...)` daripada `where('status', $status)` langsung. | ![Diterima](https://img.shields.io/badge/Diterima-0d9488?style=flat-square) | Menghindari query `WHERE status = ''` saat pengguna memilih opsi *Semua Status*. |
| **03** | Bagaimana menerapkan *live search* Ajax tanpa merusak aksesibilitas saat JavaScript dimatikan? | Menggunakan pola *Progressive Enhancement*: mempertahankan `<form method="GET">` standar dan menambahkan *partial view* `courses._results` dengan *debounce* 300ms. | ![Diterima](https://img.shields.io/badge/Diterima-0d9488?style=flat-square) | Aplikasi tetap berjalan normal via *reload* penuh saat JavaScript dimatikan di Chrome DevTools. |
| **04** | Bagaimana memastikan tampilan tautan pagination Laravel menyatu dengan desain Tailwind CSS proyek? | Memanggil `Paginator::useTailwind();` di dalam `AppServiceProvider@boot` dan membungkusnya di `.pagination-wrapper`. | ![Diterima](https://img.shields.io/badge/Diterima-0d9488?style=flat-square) | Navigasi halaman tampil rapi baik saat render penuh maupun saat di-intercept oleh jQuery Ajax. |

---

### 🔍 Ringkasan Audit Arsitektur & Prinsip Penerapan

* **Pencegahan N+1 & Query Aman:** Pencarian menggunakan pengelompokan `where(function ($q) ...)` untuk kolom `code` dan `name` agar operator `OR` tidak bertabrakan dengan filter `status`.
* **Efisiensi Jaringan (*Debounce* 300ms):** Penggunaan `clearTimeout` dan `setTimeout(..., 300)` mencegah pengiriman *request* berlebihan ke server saat pengguna mengetik cepat di kolom pencarian.
* **Sinkronisasi Riwayat URL (`History API`):** Setiap pembaruan parsial (`partial=1`) turut memperbarui parameter `q` dan `status` pada *address bar* browser sehingga URL tetap dapat disalin atau di-*bookmark*.

> **Komitmen Integritas Akademik:** Seluruh saran dari AI telah diaudit secara mandiri, disesuaikan dengan struktur proyek **KursusKu**, dan diverifikasi melalui pengujian nyata di lingkungan lokal Laragon sebelum dicatat pada dokumentasi ini.