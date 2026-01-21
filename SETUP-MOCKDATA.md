# 🚀 Setup Guide - Wisata Alam Kaltim

Panduan lengkap setup project dari awal hingga running.

> **💡 GOOD NEWS:** Project ini menggunakan **Mock Data** sementara, jadi **TIDAK PERLU setup database**! 🎉

## 📋 Table of Contents

- [Prerequisites](#prerequisites)
- [Quick Start](#quick-start)
- [Installation Steps](#installation-steps)
- [Troubleshooting](#troubleshooting)
- [Development Tips](#development-tips)
- [Migrasi ke Database Nyata](#migrasi-ke-database-nyata)

## Prerequisites

### Software yang Diperlukan:

1. **XAMPP / Laragon** (untuk Windows)
   - Download: https://www.apachefriends.org/
   - Atau Laragon: https://laragon.org/
   - **✅ Cukup Apache saja, MySQL tidak wajib!**

2. **Node.js & npm**
   - Download: https://nodejs.org/ (pilih versi LTS)
   - Versi minimum: Node 16+

3. **Text Editor**
   - VS Code (Recommended): https://code.visualstudio.com/
   - Atau editor favorit Anda

4. **Browser Modern**
   - Chrome, Firefox, Edge, atau Safari

## Quick Start

**Langkah Super Cepat (3 Menit!):**

```bash
# 1. Copy project ke htdocs/www

# 2. Masuk ke folder project
cd C:\xampp\htdocs\pkaltim\teams\tim-02

# 3. Install & build Tailwind CSS
npm install
npm run build

# 4. Start Apache di XAMPP/Laragon

# 5. Buka browser
# http://localhost/pkaltim/teams/tim-02/
```

**Done! Website sudah bisa diakses!** ✨

## Installation Steps

### Step 1: Setup Web Server

#### Jika menggunakan XAMPP:

1. Install XAMPP
2. **Start Apache** dari XAMPP Control Panel
   - ❌ MySQL **TIDAK PERLU** dijalankan
3. Buka `C:\xampp\htdocs\` (Windows) atau `/opt/lampp/htdocs/` (Linux)

#### Jika menggunakan Laragon:

1. Install Laragon
2. **Start Apache** saja
   - ❌ MySQL **TIDAK PERLU** dijalankan
3. Buka folder `C:\laragon\www\`

### Step 2: Copy Project

```bash
# Copy folder tim-02 ke dalam folder:
# XAMPP: C:\xampp\htdocs\pkaltim\teams\tim-02\
# Laragon: C:\laragon\www\pkaltim\teams\tim-02\

# Atau via command line
cd C:\xampp\htdocs\pkaltim\teams\
# Paste folder tim-02 di sini
```

### Step 3: ~~Setup Database~~ (SKIP!)

~~Database setup~~ - **TIDAK PERLU!** 🎉

**Kenapa tidak perlu database?**

- ✅ Project ini menggunakan **Mock Data** yang sudah ada di file PHP
- ✅ Data disimpan dalam array di Models
- ✅ Tidak perlu install MySQL
- ✅ Tidak perlu create database
- ✅ Tidak perlu import SQL
- ✅ **Langsung bisa jalan!**

File database (`database/wisata_alam_kaltim.sql`) disimpan untuk referensi nanti kalau mau upgrade ke database sungguhan.

### Step 4: Konfigurasi

**Edit config.php** (Opsional - jika URL tidak sesuai)

Buka file: `tim-02/config/config.php`

```php
// Sesuaikan BASE_URL dengan setup Anda

// Jika menggunakan XAMPP:
define('BASE_URL', 'http://localhost/pkaltim/teams/tim-02/');

// Jika menggunakan Laragon:
define('BASE_URL', 'http://localhost/pkaltim/teams/tim-02/');

// Atau jika pakai virtual host:
define('BASE_URL', 'http://wisatakaltim.test/');
```

### Step 5: Install Tailwind CSS

```bash
# Masuk ke folder project
cd C:\xampp\htdocs\pkaltim\teams\tim-02

# Atau di Linux/Mac:
cd /opt/lampp/htdocs/pkaltim/teams/tim-02

# Install dependencies
npm install

# Compile Tailwind CSS
npm run build
```

Tunggu proses install selesai (beberapa menit)

### Step 6: Jalankan Aplikasi

1. Pastikan Apache sudah running
2. Buka browser
3. Akses URL:

   ```
   http://localhost/pkaltim/teams/tim-02/
   ```

4. **Berhasil!** 🎉
   - Landing page akan muncul dengan desain yang menarik
   - Navigasi ke menu Destinasi, Artikel, dll
   - Semua data muncul dari mock data

## Troubleshooting

### ❌ Problem: CSS tidak muncul / tampilan berantakan

**Solusi:**

```bash
# 1. Pastikan Tailwind sudah di-compile
cd tim-02
npm run build

# 2. Cek file output.css sudah ada
# Lokasi: public/css/output.css

# 3. Clear browser cache (Ctrl + Shift + Del)
```

### ❌ Problem: 404 Not Found

**Solusi:**

```php
// Cek BASE_URL di config/config.php
// Harus sesuai dengan URL yang diakses

// Contoh salah:
define('BASE_URL', 'http://localhost/tim-02/');  // ❌

// Contoh benar:
define('BASE_URL', 'http://localhost/pkaltim/teams/tim-02/');  // ✅
```

### ❌ Problem: npm command not found

**Solusi:**

1. Install Node.js dari https://nodejs.org/
2. Restart terminal/CMD
3. Test: `node -v` dan `npm -v`

### ❌ Problem: Gambar tidak muncul

**Solusi:**

```
Gambar menggunakan placeholder dari via.placeholder.com
Jika ingin gambar lokal:

1. Simpan gambar di: public/images/destinations/
2. Nama file harus sesuai dengan data di Models
   Contoh: mangrove-kariangau.jpg
```

### ❌ Problem: "Database Connection Failed"

**Solusi:**

```
Jika muncul error database padahal sudah pakai mock data:
1. Cek file index.php
2. Pastikan baris require database.php sudah di-comment
3. Lihat line: // require_once __DIR__ . '/config/database.php';
```

## Development Tips

### 🔄 Live Development

```bash
# Terminal 1: Tailwind Watch Mode
cd tim-02
npm run dev

# Edit file di folder:
# - app/views/     (untuk HTML/PHP)
# - public/css/input.css  (untuk custom CSS)
# CSS akan auto-compile!
```

### 📝 Edit Mock Data

**Tambah/Edit Destinasi:**

- File: `app/models/Destinasi.php`
- Method: `getMockData()`
- Tambah array baru ke dalam return

```php
[
    'id' => 7,
    'nama' => 'Destinasi Baru',
    'slug' => 'destinasi-baru',
    'kategori_id' => 2,
    'kategori_nama' => 'Pantai',
    // ... dst
]
```

**Tambah/Edit Kategori:**

- File: `app/models/Kategori.php`
- Method: `getMockData()`

**Tambah/Edit Artikel:**

- File: `app/models/Artikel.php`
- Method: `getMockData()`

### 📝 Edit Content

**Landing Page:**

- File: `app/views/pages/home.php`
- Ubah text, layout, dsb

**Navbar:**

- File: `app/views/layouts/navbar.php`
- Tambah/ubah menu

**Footer:**

- File: `app/views/layouts/footer.php`
- Ubah informasi kontak, dsb

### 🎨 Custom Styling

```css
/* File: public/css/input.css */

/* Tambah custom class */
@layer components {
  .my-custom-button {
    @apply bg-purple-600 text-white px-6 py-3 rounded-lg;
  }
}

/* Setelah edit, save dan jalankan: npm run build */
```

## Migrasi ke Database Nyata

Kalau nanti ingin upgrade ke database sungguhan:

### Langkah 1: Setup Database

1. Start MySQL di XAMPP/Laragon
2. Buka phpMyAdmin: `http://localhost/phpmyadmin`
3. Create database: `wisata_alam_kaltim`
4. Import file: `database/wisata_alam_kaltim.sql`

### Langkah 2: Aktifkan Database Connection

Edit file `index.php`:

```php
// Uncomment baris ini:
require_once __DIR__ . '/config/database.php';
```

### Langkah 3: Update Models

Restore file models ke versi database (ada di backup atau git history):

- `app/models/BaseModel.php`
- `app/models/Destinasi.php`
- `app/models/Kategori.php`
- `app/models/Artikel.php`

Atau buat versi hybrid yang bisa switch antara mock dan database.

## Next Steps

1. ✅ Setup selesai tanpa database
2. 📚 Baca dokumentasi MVC di README.md
3. 🎨 Customize design sesuai kebutuhan
4. 💾 Edit mock data di Models
5. 📸 Upload foto destinasi ke `public/images/destinations/`
6. 🗄️ Upgrade ke database real (opsional)
7. 🚀 Deploy ke hosting

## Useful Commands

```bash
# Install dependencies
npm install

# Development (watch mode)
npm run dev

# Build for production
npm run build

# Check Node/npm version
node -v
npm -v

# Fix npm issues
npm cache clean --force
rm -rf node_modules package-lock.json
npm install
```

## Support

Jika masih ada masalah:

1. Cek error message di browser console (F12)
2. Cek error di PHP error log
3. Cek file `config/config.php`
4. Pastikan Apache sudah running
5. Clear browser cache
6. Google error messagenya
7. Tanya ke team leader 😊

---

**Good Luck & Happy Coding! 💻🚀**

_No Database, No Problem!_
