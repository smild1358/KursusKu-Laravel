# AI Usage Log - Pertemuan 7 (Laravel KursusKu)

Dokumentasi ini mencatat riwayat konsultasi dan bantuan kecerdasan buatan (AI) yang digunakan sebagai asisten virtual / *debugger* dalam merancang arsitektur Laravel pada Pertemuan 7.

| Masalah / Tujuan | Prompt Singkat | Saran AI | Keputusan Saya | Hasil Uji |
| :--- | :--- | :--- | :--- | :--- |
| **Error Git Push** <br>(`Repository not found`) | "Cara mengatasi error Repository not found di Git?"[cite: 70] | Gunakan Personal Access Token (PAT) sebagai password, dan hapus kredensial Git lama di Windows[cite: 70]. | Diterima[cite: 70] | Berhasil push ke GitHub menggunakan Token autentikasi[cite: 70]. |
| **Terminal VS Code Error** <br>(`php is not recognized`) | "Kenapa php artisan serve error di VS Code?"[cite: 70] | Tambahkan folder PHP Laragon ke PATH Windows, atau panggil path lengkap `C:\laragon\bin\...`[cite: 70]. | Diterima[cite: 70] | Tabel `route:list` berhasil muncul di terminal VS Code[cite: 70]. |
| **Penyesuaian Tampilan CSS** | "Cara menambahkan kotak Alur MVC tanpa menghilangkan background partikel?"[cite: 70] | Tambahkan HTML `.mvc-grid` di Blade, dan tambahkan CSS baru di bagian bawah tanpa menghapus CSS lama[cite: 70]. | Diterima[cite: 70] | Web tampil dengan background biru gelap, partikel, dan ada kotak Alur MVC[cite: 70]. |
| **Kustomisasi Tombol** <br>(Tombol "Lihat Program") | "Cara memaksa tombol CSS jadi putih bersih?"[cite: 70] | Gunakan properti `background-color: #ffffff !important;` dan `text-decoration: none !important;`[cite: 70]. | Diterima[cite: 70] | Tombol berubah menjadi kotak putih dengan teks biru[cite: 70]. |
| **Konfigurasi Git Identity** <br>(`Author identity unknown`) | "Git error author identity unknown"[cite: 70] | Jalankan `git config --global user.name` dan `user.email` sesuai akun GitHub[cite: 70]. | Diterima[cite: 70] | Commit berhasil dilakukan dan dikenali oleh Git[cite: 70]. |

> **Catatan Tambahan:** Saya menggunakan AI sebagai tutor dan *debugger* saat menemui jalan buntu atau error[cite: 70]. Saya tetap mengerjakan kodingan utamanya secara manual di VS Code, menyesuaikan CSS agar desainnya berbeda dari teman (tema gelap + partikel), dan memastikan saya paham alur MVC-nya (`Route -> Controller -> Blade`)[cite: 70].