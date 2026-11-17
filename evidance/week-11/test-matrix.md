<div align="center">

# 🧪 Test Matrix & Pengujian Sistem — Praktikum Minggu 11

![Milestone](https://img.shields.io/badge/Milestone-Week_11_CRUD_Lanjutan-0f766e?style=for-the-badge&logo=laravel&logoColor=white)
![Status](https://img.shields.io/badge/Status-100%25_Passed-10b981?style=for-the-badge&logo=checkmarx&logoColor=white)
![Framework](https://img.shields.io/badge/Laravel-v10-ef4444?style=for-the-badge&logo=php&logoColor=white)

*Dokumentasi matriks pengujian fungsionalitas Course CRUD Lanjutan (Show, Form Request, Edit/Update, Delete) pada Proyek KursusKu.*

---

### 📌 Informasi Mahasiswa
* **Nama:** RAHMAD ILLAHI
* **NIM:** 2524215
* **Program Studi:** PTIK 5G (Pemrograman Web III)
* **Institusi:** UIN SMDD Bukittinggi

</div>

---

### 📋 Tabel Pengujian Fungsionalitas & Validasi Form

| No. | Skenario Pengujian | Data Uji | Hasil yang Diharapkan | Actual (Hasil Nyata) | Status | Bukti File |
| :---: | :--- | :--- | :--- | :--- | :---: | :--- |
| **01** | Menambah kursus valid | Semua data terisi valid | Kursus berhasil ditambahkan | Berhasil masuk ke database | **Pass** | `06-update-success.png` |
| **02** | Kode kursus duplikat | Kode yang sudah ada (`PHP-101`) | Validasi menolak data | Ditolak; pesan *"The code has already been taken."* tampil | **Pass** | `04-validation-duplicate-code.png` |
| **03** | Nama kursus kosong | Nama dikosongkan | Validasi menolak data | Ditolak; pesan *required* tampil | **Pass** | `-` |
| **04** | Nama kursus terlalu pendek | Nama 2 karakter (`"AI"`) | Validasi menolak data | Ditolak; pesan minimal 3 karakter | **Pass** | `-` |
| **05** | Biaya negatif | Fee: `-1000` | Validasi menolak data | Ditolak; pesan minimal 0 | **Pass** | `-` |
| **06** | Biaya bukan angka | Fee: `"abc"` | Validasi menolak data | Ditolak; pesan harus integer | **Pass** | `-` |
| **07** | Kuota nol | Kuota: `0` | Validasi menolak data | Ditolak; pesan *between 1-500* | **Pass** | `-` |
| **08** | Kuota melebihi batas | Kuota: `501` | Validasi menolak data | Ditolak; pesan *"The quota field must be between 1 and 500."* | **Pass** | `05-validation-quota-501.png` |
| **09** | Batas kuota minimum | Kuota: `1` | Data diterima | Berhasil disimpan | **Pass** | `-` |
| **10** | Batas kuota maksimum | Kuota: `500` | Data diterima | Berhasil disimpan | **Pass** | `-` |
| **11** | Status tidak valid | Status: `"active"` (via inspect) | Validasi menolak data | Ditolak; hanya menerima *draft/open/closed* | **Pass** | `-` |
| **12** | Edit tanpa ubah kode | Edit PHP-101, ubah nama | Berhasil disimpan | Data berubah, pesan sukses tampil | **Pass** | `06-update-success.png` |
| **13** | Edit ke kode lain | Ubah code PHP-101 ke LRV-101 | Validasi menolak data | Ditolak; pesan *unique* tampil | **Pass** | `-` |
| **14** | Update normal | Ubah nama, fee, kuota | Berhasil disimpan | Data berubah, pesan sukses tampil | **Pass** | `06-update-success.png` |
| **15** | Hapus kursus | Klik hapus pada data dummy | Data terhapus | Data hilang dari index, pesan sukses tampil | **Pass** | `07-delete-success.png` |

---
> *Catatan: Seluruh skenario pengujian di atas telah diverifikasi langsung pada server lokal Laragon menggunakan browser Google Chrome dengan hasil konsisten.*