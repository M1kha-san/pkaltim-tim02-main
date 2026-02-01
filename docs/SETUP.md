# 🚀 Setup Guide - Wisata Alam Kaltim

Panduan lengkap setup project dari awal hingga running.

## 📋 Table of Contents

- [Prerequisites](#prerequisites)
- [Installation Steps](#installation-steps)
- [Troubleshooting](#troubleshooting)
- [Development Tips](#development-tips)

## Prerequisites

### Software yang Diperlukan:

1. **XAMPP / Laragon** (untuk Windows)
   - Download: https://www.apachefriends.org/
   - Atau Laragon: https://laragon.org/

2. **Node.js & npm**
   - Download: https://nodejs.org/ (pilih versi LTS)
   - Versi minimum: Node 16+

3. **Text Editor**
   - VS Code (Recommended): https://code.visualstudio.com/
   - Atau editor favorit Anda

4. **Browser Modern**
   - Chrome, Firefox, Edge, atau Safari

## Installation Steps

### Step 1: Setup Web Server

#### Jika menggunakan XAMPP:

1. Install XAMPP
2. Start Apache dan MySQL dari XAMPP Control Panel
3. Buka `C:\xampp\htdocs\` (Windows) atau `/opt/lampp/htdocs/` (Linux)

#### Jika menggunakan Laragon:

1. Install Laragon
2. Start All services
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

### Step 3: Setup Database

1. **Buka phpMyAdmin**

   ```
   http://localhost/phpmyadmin
   ```

2. **Create Database Baru**
   - Klik "New" di sidebar
   - Nama database: `wisata_alam_kaltim`
   - Collation: `utf8mb4_unicode_ci`
   - Klik "Create"

3. **Import Data**
   - Pilih database `wisata_alam_kaltim`
   - Klik tab "Import"
   - Klik "Choose File"
   - Pilih file: `tim-02/database/wisata_alam_kaltim.sql`
   - Klik "Go" di bagian bawah
   - Tunggu sampai muncul pesan sukses

### Step 4: Konfigurasi

1. **Edit config.php**

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

2. **Cek Database Config** (optional, default sudah benar)

   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');  // Kosongkan jika default
   define('DB_NAME', 'wisata_alam_kaltim');
   ```

### Step 5: Install Tailwind CSS

1. **Buka Terminal/CMD**

   ```bash
   # Masuk ke folder project
   cd C:\xampp\htdocs\pkaltim\teams\tim-02

   # Atau di Linux/Mac:
   cd /opt/lampp/htdocs/pkaltim/teams/tim-02
   ```

2. **Install Dependencies**

   ```bash
   npm install
   ```

   Tunggu proses install selesai (beberapa menit)

3. **Compile Tailwind CSS**

   ```bash
   # Mode Development (dengan auto-reload)
   npm run dev

   # Biarkan terminal tetap terbuka!
   # CSS akan otomatis compile setiap ada perubahan
   ```

   Atau untuk production:

   ```bash
   npm run build
   ```

### Step 6: Jalankan Aplikasi

1. Pastikan Apache & MySQL sudah running
2. Buka browser
3. Akses URL:

   ```
   http://localhost/pkaltim/teams/tim-02/
   ```

4. **Berhasil!** 🎉
   - Landing page akan muncul dengan desain yang menarik
   - Navigasi ke menu Destinasi, Artikel, dll

## Troubleshooting

### ❌ Problem: Database Connection Failed

**Solusi:**

```php
// Cek config/config.php
// Pastikan username & password MySQL benar
define('DB_USER', 'root');
define('DB_PASS', '');  // atau password MySQL Anda

// Test koneksi MySQL via terminal:
mysql -u root -p
```

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
2. Nama file harus sesuai dengan database
   Contoh: mangrove-kariangau.jpg
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

### 🗄️ Manage Database

```sql
-- Tambah destinasi baru
INSERT INTO destinasi (nama, slug, kategori_id, kabupaten_id, ...)
VALUES ('Nama Wisata', 'nama-wisata', 1, 1, ...);

-- Update data
UPDATE destinasi SET nama = 'New Name' WHERE id = 1;

-- Lihat semua destinasi
SELECT * FROM destinasi;
```

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

/* Setelah edit, save dan Tailwind akan auto-compile */
```

## Next Steps

1. ✅ Setup selesai
2. 📚 Baca dokumentasi MVC di README.md
3. 🎨 Customize design sesuai kebutuhan
4. 💾 Tambah data destinasi ke database
5. 📸 Upload foto destinasi ke `public/images/destinations/`
6. 🚀 Deploy ke hosting

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
rm -rf node_modules
npm install
```

## Support

Jika masih ada masalah:

1. Cek error message di browser console (F12)
2. Cek error di PHP error log
3. Cek file `config/config.php`
4. Google error messagenya
5. Tanya ke team leader 😊

---

**Good Luck & Happy Coding! 💻🚀**
