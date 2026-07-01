# Ekskul Manager — CRUD UAS Rekayasa Web

Aplikasi manajemen Data Kegiatan Ekstrakurikuler berbasis Laravel 12. Frontend publik pakai Bootstrap 5, backend CRUD lengkap dengan proteksi login manual (session-based, tanpa Breeze/Filament/Jetstream/dll).

## Fitur

- Halaman publik (tanpa login) menampilkan daftar kegiatan ekstrakurikuler
- Login admin (session-based, tabel `users` custom: `username`, `password`)
- CRUD lengkap Data Kegiatan Ekstrakurikuler (Create, Read, Update, Delete)
- Validasi input + pesan error Bahasa Indonesia
- Upload gambar dengan kompresi otomatis (resize max 800px lebar)
- Export laporan ke PDF (DomPDF)
- Filter data per Hari, pencarian & pagination (DataTables)
- Konfirmasi hapus & notifikasi pakai SweetAlert2

## Cara Setup (Laragon / XAMPP)

1. **Clone / extract project**, lalu masuk ke folder project:
   ```bash
   cd crud_uas_nim
   ```

2. **Install dependency PHP**:
   ```bash
   composer install
   ```

3. **Copy environment file** dan generate app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Buat database** bernama `db_uas_nim` (lewat phpMyAdmin/HeidiSQL), lalu sesuaikan kredensial di `.env`:
   ```
   DB_DATABASE=db_uas_nim
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Migrasi database + seed data awal** (termasuk akun login default):
   ```bash
   php artisan migrate --seed
   ```

6. **Link storage** biar gambar yang diupload bisa diakses publik:
   ```bash
   php artisan storage:link
   ```

7. **Jalankan server**:
   ```bash
   php artisan serve
   ```
   Buka `http://127.0.0.1:8000`

## Akun Login Default

| Username | Password  |
|----------|-----------|
| admin    | admin123  |

## Struktur Data — Kegiatan Ekstrakurikuler

| Kolom          | Tipe   |
|----------------|--------|
| id_kegiatan    | id (PK)|
| gambar         | string (path, nullable) |
| nama_kegiatan  | string |
| hari           | string |
| waktu          | time   |
| pembina        | string |

## Catatan

- Backend murni dibuat manual sesuai ketentuan soal (dilarang pakai Filament, Livewire, Jetstream, Breeze, Nova, Voyager).
- Semua asset frontend (Bootstrap, FontAwesome, DataTables, SweetAlert2) di-load lewat CDN, jadi butuh koneksi internet aktif saat aplikasi dijalankan/diuji.
