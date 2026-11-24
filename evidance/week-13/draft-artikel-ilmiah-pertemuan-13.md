<div align="center">

# 📄 Kerangka Draft Artikel Ilmiah — Proyek KursusKu
### *Berbasis Bukti Pengembangan (Project Evidence) Pertemuan 13*

![Status](https://img.shields.io/badge/Stage-Draft_Awal_Evidence_Proyek-0f766e?style=for-the-badge&logo=googlescholar&logoColor=white)
![Topic](https://img.shields.io/badge/Topic-Server--Side_Pagination_%26_Progressive_Ajax-14b8a6?style=for-the-badge&logo=laravel&logoColor=white)
![Integrity](https://img.shields.io/badge/Academic_Integrity-Evidence_Driven-0d9488?style=for-the-badge&logo=checkmarx&logoColor=white)

---

### 📌 Identitas Penulis & Afiliasi
| Atribut | Detail Informasi |
| :--- | :--- |
| **Penulis** | **RAHMAD ILLAHI** (`NIM: 2524215`) |
| **Program Studi / Kelas** | Pendidikan Teknik Informatika dan Komputer (PTIK) — **Kelas 5G** |
| **Institusi** | Universitas Islam Negeri Sjech M. Djamil Djambek Bukittinggi |
| **Mata Kuliah / Tahun** | Pemrograman Web III (PHP & MySQL) — Tahun Akademik 2026 |

</div>

---

### 1. Judul Sementara
> **Implementasi Pencarian, Filter Status, dan Pagination Server-Side dengan Progressive Enhancement Ajax pada Sistem Pendaftaran Kursus Berbasis Laravel**

---

### 2. Latar Belakang & Pernyataan Masalah (*Problem Statement*)
Pada tahap pengembangan awal sistem informasi manajemen kursus (**KursusKu**), seluruh daftar program pelatihan ditampilkan dalam satu tabel tunggal tanpa pembatasan jumlah baris maupun mekanisme penyaringan. Seiring bertambahnya katalog kursus ($\ge 21$ program dengan variasi status *open*, *closed*, dan *draft*), pengguna mengalami kesulitan menemukan program kursus spesifik berdasarkan kode (`code`) maupun nama (`name`), serta terjadi pembengkakan waktu muat antarmuka (*rendering overhead*) apabila seluruh rekaman dimuat sekaligus dalam satu halaman.

---

### 3. Kesenjangan (*Gap*) Solusi
Pendekatan pencarian berbasis *client-side* murni kerap bergantung penuh pada JavaScript sehingga gagal berfungsi ketika skrip diblokir atau tidak aktif pada peramban pengguna, sedangkan pencarian *server-side* konvensional tanpa manajemen *query string* sering menghilangkan parameter filter saat pengguna berpindah halaman (*pagination*). Oleh karena itu, diperlukan arsitektur *progressive enhancement* pada framework Laravel yang menggabungkan kueri kondisional tervalidasi (`when`), persistensi parameter URL (`withQueryString`), serta pembaruan parsial asinkron (*jQuery Ajax* dengan *debounce* 300 ms).

---

### 4. Metode Pengembangan
Pengembangan dilakukan secara iteratif pada proyek Laravel **KursusKu** dengan empat tahapan utama:
1. **Identifikasi Kebutuhan Katalog:** Menentukan parameter pencarian (`q` pada kolom `code` dan `name`), daftar putih (*whitelist*) filter status (`open`, `closed`, `draft`), serta batas paginasi maksimal **10 item per halaman**.
2. **Implementasi Query Kondisional Server-Side:** Menerapkan `Course::query()->when(...)` pada `CourseController@index` untuk mencegah kueri kosong yang keliru, serta mempertahankan *state* URL saat perpindahan halaman melalui `->paginate(10)->withQueryString()`.
3. **Penerapan Progressive Enhancement:** Memisahkan komponen tabel dan navigasi halaman ke dalam *partial view* (`resources/views/courses/_results.blade.php`) yang dapat dirender baik sebagai respons halaman penuh maupun potongan blok HTML (`?partial=1`) melalui *jQuery Ajax* dengan jeda *debounce* 300 ms, sembari mempertahankan `<form method="GET">` sebagai *fallback* non-JavaScript.
4. **Pengujian Fungsional (*Black-Box*):** Menguji 5 skenario wajib (0 hasil, 1 hasil unik, $>10$ hasil, kata kunci berspasi, serta kombinasi filter + halaman 2) ditambah verifikasi *fallback* tanpa JavaScript dan pemantauan *network request* Ajax.

---

### 5. Skenario Uji & Hasil Awal
*(Catatan Integritas Akademik: Kolom **Hasil Aktual** dan **Status** diisi secara faktual setelah pengujian nyata dilakukan pada server lokal Laragon dan dibekukan dalam folder `evidence/week-13/`).*

| No. | Skenario Uji | Input / Parameter URL | Hasil yang Diharapkan (*Expected*) | Hasil Aktual (*Actual*) | Status | Bukti Evidence |
| :---: | :--- | :--- | :--- | :--- | :---: | :--- |
| **01** | **0 Hasil (*Empty State*)** | `?q=tidak-ada-xyz-999` | Pesan *empty state* tampil informatif tanpa error server | *(Diisi setelah uji nyata)* | `Pending` | `02-empty-state.png` |
| **02** | **1 Hasil Unik** | `?q=LRV-101` | Menampilkan tepat 1 record kursus yang cocok | *(Diisi setelah uji nyata)* | `Pending` | `01-course-index.png` |
| **03** | **$>10$ Hasil (*Pagination*)** | `/courses` (22 data dummy) | Halaman 1 memuat maks. 10 data + navigasi halaman 2 & 3 | *(Diisi setelah uji nyata)* | `Pending` | `01-course-index.png` |
| **04** | **Keyword dengan Spasi** | `?q=Web+Modern` | Spasi awal/akhir di-`trim()` dan hasil pencarian sesuai | *(Diisi setelah uji nyata)* | `Pending` | `-` |
| **05** | **Filter + Page 2** | `?status=open&page=2` | Parameter `status=open` tetap bertahan saat pindah ke halaman 2 | *(Diisi setelah uji nyata)* | `Pending` | `03-page2-query-state.png` |
| **06** | **Fallback Non-JavaScript** | Matikan JS di DevTools + klik **Cari** | Pencarian & filter tetap berjalan melalui reload `GET` normal | *(Diisi setelah uji nyata)* | `Pending` | `04-fallback-no-js.png` |
| **07** | **jQuery Ajax + Debounce** | Ketik keyword cepat & pantau tab *Network* | Request `partial=1` dikirim setelah jeda 300 ms tanpa full reload | *(Diisi setelah uji nyata)* | `Pending` | `05-ajax-network.png` |

---

### 6. Pembahasan Awal & Keterbatasan
* **Keandalan Akses (*Progressive Enhancement*):** Mempertahankan formulir HTML `GET` standar memastikan fitur inti penemuan data tetap dapat digunakan bahkan ketika JavaScript dimatikan, sementara lapisan *jQuery Ajax* meningkatkan responsivitas antarmuka bagi pengguna modern.
* **Stabilitas Navigasi Halaman:** Penggunaan `withQueryString()` mengatasi hilangnya parameter pencarian dan filter saat berpindah antarhalaman paginasi, sedangkan penerapan *debounce* 300 ms mencegah pengiriman kueri berlebih ke basis data MySQL ketika pengguna mengetik cepat.
* **Keterbatasan & Rencana Lanjutan:** Pengujian saat ini difokuskan pada verifikasi fungsional dengan dataset awal 22 rekaman kursus pada lingkungan lokal Laragon; pengukuran latensi kueri berskala besar dan penyempurnaan indeks komposit dijadwalkan pada tahap evaluasi berikutnya.

---

### 7. Referensi Awal
1. Laravel Documentation (10.x). *Database: Pagination & Query Builder*. Diakses dari `https://laravel.com/docs/10.x/pagination`.
2. jQuery Foundation. *jQuery.get() — Ajax API Documentation*. Diakses dari `https://api.jquery.com/jquery.get/`.
3. Tim Dosen Pemrograman Web III. (2026). *Modul Praktikum Pertemuan 13: Pagination, Searching, Filter Status & Draft Artikel Ilmiah*. Program Studi PTIK, UIN Sjech M. Djamil Djambek Bukittinggi.