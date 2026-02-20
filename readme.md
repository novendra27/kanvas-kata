# Kanvas Kata - Sistem Manajemen Artikel

## Deskripsi Aplikasi

**Kanvas Kata** adalah sebuah aplikasi Content Management System (CMS) berbasis web yang dibangun menggunakan PHP dengan arsitektur MVC (Model-View-Controller). Aplikasi ini dirancang untuk memudahkan pengelolaan artikel atau konten blog dengan fitur-fitur yang lengkap dan user-friendly.

### Fitur Utama

1. **Sistem Autentikasi**
   - Login dan Register untuk pengguna
   - Manajemen session pengguna
   - Pembagian role (Admin dan Penulis)

2. **Manajemen Artikel**
   - Membuat artikel baru dengan editor rich text
   - Mengedit artikel yang sudah ada
   - Menghapus artikel
   - Upload gambar artikel
   - Menampilkan artikel berdasarkan kategori
   - Detail artikel dengan tampilan lengkap

3. **Manajemen Kategori**
   - Menambah kategori baru
   - Mengedit kategori
   - Menghapus kategori
   - Filter artikel berdasarkan kategori

4. **Manajemen Pengguna** (Khusus Admin)
   - Melihat daftar pengguna
   - Mengelola data pengguna
   - Mengatur role pengguna

5. **Tampilan Publik**
   - Homepage dengan daftar artikel terbaru
   - Halaman detail artikel
   - Filter artikel berdasarkan kategori
   - Navigasi yang mudah dan responsif

### Teknologi yang Digunakan

- **Backend**: PHP (Native dengan arsitektur MVC)
- **Database**: MySQL dengan PDO
- **Frontend**: 
  - Bootstrap 5 (CSS Framework)
  - jQuery
  - Various JS libraries (DataTables, ApexCharts, dll)
- **Template**: Admin template berbasis Bootstrap

### Struktur Database

Aplikasi ini menggunakan 3 tabel utama:

1. **tb_pengguna**: Menyimpan data pengguna
   - id_pengguna
   - nama
   - email
   - password
   - peran (Admin/Penulis)

2. **tb_artikel**: Menyimpan data artikel
   - id_artikel
   - id_pengguna
   - id_kategori
   - tanggal
   - judul
   - konten
   - gambar

3. **tb_kategori**: Menyimpan kategori artikel
   - id_kategori
   - nama_kategori

## Cara Instalasi

### Prasyarat

Pastikan sistem Anda sudah memiliki:
- PHP versi 7.4 atau lebih tinggi
- MySQL/MariaDB
- Web Server (Apache/Nginx)
- Laragon/XAMPP/WAMP (opsional, untuk development lokal)

### Langkah-Langkah Instalasi

#### 1. Clone atau Download Project

```bash
git clone <url-repository>
```

Atau download dan extract file ZIP project ke folder web server Anda.

#### 2. Pindahkan Project ke Folder Web Server

Untuk Laragon:
```
C:\laragon\www\kanvas-kata
```

Untuk XAMPP:
```
C:\xampp\htdocs\kanvas-kata
```

Untuk WAMP:
```
C:\wamp64\www\kanvas-kata
```

#### 3. Import Database

1. Buka **phpMyAdmin** melalui browser:
   - Laragon: `http://localhost/phpmyadmin`
   - XAMPP: `http://localhost/phpmyadmin`

2. Buat database baru dengan nama: `db_kanvas_kata`

3. Import file SQL:
   - Pilih database `db_kanvas_kata`
   - Klik menu **Import**
   - Pilih file `db_kanvas_kata.sql` dari folder project
   - Klik **Go** atau **Kirim**

#### 4. Konfigurasi Database

Edit file konfigurasi di `app/config/config.php`:

```php
<?php

define('BASEURL', 'http://localhost/kanvas-kata/public');

//DB
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_kanvas_kata');
```

**Sesuaikan**:
- `BASEURL`: Ubah sesuai dengan lokasi project Anda
- `DB_USER`: Username database MySQL (default: root)
- `DB_PASS`: Password database MySQL (default: kosong)
- `DB_NAME`: Nama database (db_kanvas_kata)

#### 5. Konfigurasi Virtual Host (Opsional)

Jika menggunakan Laragon, virtual host akan dibuat otomatis.
Akses melalui: `http://kanvas-kata.test/public`

Untuk Apache manual, tambahkan di `httpd-vhosts.conf`:

```apache
<VirtualHost *:80>
    ServerName kanvas-kata.local
    DocumentRoot "C:/laragon/www/kanvas-kata/public"
    <Directory "C:/laragon/www/kanvas-kata/public">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Jangan lupa tambahkan di file `hosts`:
```
127.0.0.1 kanvas-kata.local
```

#### 6. Akses Aplikasi

Buka browser dan akses:
```
http://localhost/kanvas-kata/public
```

Atau jika menggunakan virtual host:
```
http://kanvas-kata.test/public
```
atau
```
http://kanvas-kata.local
```

### Akun Default

Setelah instalasi berhasil, Anda dapat login menggunakan akun berikut:

**Admin:**
- Email: `admin@gmail.com`
- Password: `admin`

**Penulis:**
- Email: `adi.novendra.p@gmail.com`
- Password: `novendra`

**Penulis Lain:**
- Email: `adino@gmail.com`
- Password: `adi`

## Struktur Folder

```
kanvas-kata/
├── app/
│   ├── config/          # Konfigurasi aplikasi
│   ├── controllers/     # Controller MVC
│   ├── core/           # Core system (App, Controller, Database)
│   ├── models/         # Model MVC
│   └── views/          # View/Template
├── public/
│   ├── assets/         # CSS, JS, Images
│   │   ├── css/
│   │   ├── js/
│   │   ├── images/
│   │   └── libs/
│   └── index.php       # Entry point aplikasi
├── db_kanvas_kata.sql  # File database
└── README.md           # Dokumentasi
```

## Cara Penggunaan

### Untuk Admin

1. Login menggunakan akun admin
2. Akses dashboard admin
3. Kelola kategori artikel di menu **Kategori**
4. Kelola pengguna di menu **Pengguna**
5. Kelola artikel di menu **Artikel**

### Untuk Penulis

1. Login menggunakan akun penulis
2. Akses halaman artikel
3. Buat artikel baru dengan mengklik **Tambah Artikel**
4. Upload gambar artikel
5. Pilih kategori artikel
6. Publish atau edit artikel Anda

### Untuk Pengunjung

1. Akses homepage untuk melihat daftar artikel
2. Klik artikel untuk membaca detail
3. Filter artikel berdasarkan kategori
4. Navigasi antar halaman menggunakan menu

## Troubleshooting

### Error: Database Connection Failed

**Solusi:**
- Pastikan MySQL/MariaDB sudah berjalan
- Periksa konfigurasi database di `app/config/config.php`
- Pastikan nama database, username, dan password sudah benar

### Error: 404 Not Found

**Solusi:**
- Pastikan mengakses melalui folder `public`
- Periksa konfigurasi `BASEURL` di `app/config/config.php`
- Pastikan mod_rewrite Apache sudah aktif

### Error: Permission Denied saat Upload Gambar

**Solusi:**
- Berikan permission write pada folder `public/assets/images/foto_artikel`
- Untuk Linux/Mac: `chmod 777 public/assets/images/foto_artikel`
- Untuk Windows: Klik kanan folder → Properties → Security → Edit permissions

### CSS/JS Tidak Muncul

**Solusi:**
- Periksa path `BASEURL` di `app/config/config.php`
- Pastikan folder `public/assets` dapat diakses
- Clear cache browser (Ctrl + F5)

## Pengembangan Lebih Lanjut

Beberapa fitur yang dapat dikembangkan:

- Sistem komentar artikel
- Fitur like/favorite artikel
- Search/pencarian artikel
- Tag artikel
- Export artikel ke PDF
- Integrasi dengan social media
- Dashboard analytics
- Multi-language support
- API REST untuk mobile app

## Keamanan

Untuk deployment ke production, pastikan:

1. Ubah semua password default
2. Gunakan password yang kuat
3. Enkripsi password dengan `password_hash()`
4. Validasi dan sanitasi semua input pengguna
5. Gunakan prepared statements (sudah diterapkan dengan PDO)
6. Batasi akses ke folder sensitif
7. Aktifkan HTTPS
8. Regular backup database

