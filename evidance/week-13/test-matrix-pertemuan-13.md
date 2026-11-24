<div align="center">

<img src="https://capsule-render.vercel.app/api?type=waving&color=0:134e4a,50:0f766e,100:14b8a6&height=180&section=header&text=Test%20Matrix%20—%20Week%2013&fontSize=38&fontColor=ffffff&fontAlignY=38&desc=Data%20Discovery%3A%20Search%2C%20Filter%20Status%2C%20Pagination%20%26%20Progressive%20Ajax&descAlignY=60&descSize=15" width="100%" />

# 🧪 Laporan Pengujian Sistem — KursusKu Laravel

![Milestone](https://img.shields.io/badge/Milestone-Week_13_Data_Discovery-0f766e?style=for-the-badge&logo=laravel&logoColor=white)
![Pagination](https://img.shields.io/badge/Pagination-10_Items%2FPage-14b8a6?style=for-the-badge&logo=php&logoColor=white)
![Progressive UX](https://img.shields.io/badge/UX-GET_%2B_jQuery_Ajax_300ms-0d9488?style=for-the-badge&logo=jquery&logoColor=white)
![Database](https://img.shields.io/badge/Database-MySQL_Relational-115e59?style=for-the-badge&logo=mysql&logoColor=white)

*Dokumentasi pengujian komprehensif fitur Search (`q`), Filter Status (`open/closed/draft`), Pagination (`withQueryString`), Fallback Non-JS, dan jQuery Ajax Live Search.*

</div>

---

### 📌 Identitas Mahasiswa & Lingkungan Pengujian

<table>
  <tr>
    <td width="50%" valign="top">
      <strong>👤 Profil Praktikan</strong><br><br>
      • <strong>Nama:</strong> RAHMAD ILLAHI<br>
      • <strong>NIM:</strong> 2524215<br>
      • <strong>Kelas:</strong> PTIK 5G — Pemrograman Web III<br>
      • <strong>Institusi:</strong> UIN Sjech M. Djamil Djambek Bukittinggi
    </td>
    <td width="50%" valign="top">
      <strong>⚙️ Spesifikasi & Konfigurasi Uji</strong><br><br>
      • <strong>Base URL:</strong> <code>http://127.0.0.1:8000/courses</code><br>
      • <strong>Dataset Uji:</strong> 22 Record Course (<code>12 open</code>, <code>5 closed</code>, <code>5 draft</code>)<br>
      • <strong>Limit Paginasi:</strong> <code>10 item / halaman</code> + <code>withQueryString()</code><br>
      • <strong>Debounce Ajax:</strong> <code>300 ms</code> (<code>partial=1</code>)
    </td>
  </tr>
</table>

---

### 📋 Tabel 5 Skenario Pengujian Wajib & Lanjutan

| No. | Skenario | Langkah & Data Uji | Hasil yang Diharapkan (*Expected*) | Hasil Nyata (*Actual*) | Status | Bukti Screenshot |
| :---: | :--- | :--- | :--- | :--- | :---: | :--- |
| **01** | **0 Hasil (*Empty State*)** | Cari keyword yang tidak ada: `?q=tidak-ada-xyz-999` | Empty state tampil informatif tanpa error server | *(Isi setelah test di browser)* | ![Pending](https://img.shields.io/badge/Status-Pending-f59e0b?style=flat-square) | `02-empty-state.png` |
| **02** | **1 Hasil Unik** | Cari kode/nama unik: `?q=LRV-101` | Tepat 1 record Course tampil | *(Isi setelah test di browser)* | ![Pending](https://img.shields.io/badge/Status-Pending-f59e0b?style=flat-square) | `01-course-index.png` |
| **03** | **Lebih dari 10 Hasil** | Buka `/courses` atau filter status dengan $\ge 11$ data | Page 1 menampilkan maksimal 10 item + navigasi pagination | *(Isi setelah test di browser)* | ![Pending](https://img.shields.io/badge/Status-Pending-f59e0b?style=flat-square) | `01-course-index.png` |
| **04** | **Keyword dengan Spasi** | Cari frasa berspasi: `Web Modern` (`?q=Web+Modern`) | Keyword terbaca utuh dengan `trim()` dan hasil sesuai | *(Isi setelah test di browser)* | ![Pending](https://img.shields.io/badge/Status-Pending-f59e0b?style=flat-square) | `-` |
| **05** | **Filter + Page 2** | Pilih filter `?status=open` lalu klik halaman `2` | URL menjadi `?status=open&page=2` dan filter tetap terjaga | *(Isi setelah test di browser)* | ![Pending](https://img.shields.io/badge/Status-Pending-f59e0b?style=flat-square) | `03-page2-query-state.png` |
| **06** | **Fallback Tanpa JavaScript** | Matikan JS di Chrome DevTools, isi `q` & `status`, klik **Cari** | Form `GET` tetap memfilter data melalui reload normal | *(Isi setelah test di browser)* | ![Pending](https://img.shields.io/badge/Status-Pending-f59e0b?style=flat-square) | `04-fallback-no-js.png` |
| **07** | **jQuery Ajax + Debounce 300ms** | Aktifkan JS, ketik cepat di kolom search, pantau tab *Network* | Request `partial=1` hanya dikirim setelah jeda 300ms | *(Isi setelah test di browser)* | ![Pending](https://img.shields.io/badge/Status-Pending-f59e0b?style=flat-square) | `05-ajax-network.png` |

---

### ✅ Checklist Kelengkapan Evidence & Validasi Akhir

- [ ] **01 — Course Index Normal & >10 Hasil (`01-course-index.png`):** Menampilkan 4 kartu statistik dashboard, 10 baris data per halaman, dan tombol paginasi Tailwind CSS.
- [ ] **02 — Empty State 0 Hasil (`02-empty-state.png`):** Menampilkan pesan ramah saat pencarian tidak menemukan kecocokan data tanpa memicu exception Blade.
- [ ] **03 — Pagination & Query State (`03-page2-query-state.png`):** Parameter `?status=open&page=2` tetap bertahan saat berpindah halaman.
- [ ] **04 — Fallback Tanpa JavaScript (`04-fallback-no-js.png`):** Form pencarian dan filter tetap bekerja penuh ketika JavaScript dinonaktifkan melalui DevTools.
- [ ] **05 — Network Evidence Ajax (`05-ajax-network.png`):** Tab *Network* memperlihatkan request `GET /courses?q=...&partial=1` dieksekusi setelah jeda *debounce* 300ms.

> **Catatan Integritas Akademik:** Kolom *Actual* dan *Status* diisi secara faktual setelah Anda menjalankan pengujian langsung di browser lokal Laragon. Ubah lencana status menjadi `![Passed](https://img.shields.io/badge/Status-Passed-0d9488?style=flat-square)` hanya setelah masing-masing skenario terverifikasi nyata.

<div align="center">
  <img src="https://capsule-render.vercel.app/api?type=waving&color=0:134e4a,50:0f766e,100:14b8a6&height=90&section=footer" width="100%" />
</div>