# Panduan 3 Fitur Baru - ExploreKaltim

Dokumen ini menjelaskan 3 fitur baru yang telah diimplementasikan: **Interactive Map**, **Gallery Lightbox**, dan **Multi-language Support**.

---

## 🚀 Langkah Instalasi

### 1. Import Database Schema

**PENTING**: Sebelum menggunakan fitur baru, Anda HARUS import database schema terlebih dahulu.

#### Opsi A: Via phpMyAdmin

1. Buka phpMyAdmin di browser: `http://localhost/phpmyadmin`
2. Pilih database `wisata_alam_kaltim` di sidebar kiri
3. Klik tab **"Import"** di menu atas
4. Klik **"Choose File"** dan pilih file: `database/new_features.sql`
5. Scroll ke bawah dan klik tombol **"Go"**
6. Tunggu hingga muncul pesan sukses: "Import has been successfully finished"

#### Opsi B: Via Command Line

```bash
cd "d:\Program Files\xampp\htdocs\pkaltim-tim02-main"
mysql -u root -p wisata_alam_kaltim < database/new_features.sql
```

(Tekan Enter saat diminta password jika tidak ada password)

### 2. Verifikasi Import

Jalankan query berikut di phpMyAdmin SQL tab untuk memastikan data ter-import:

```sql
-- Cek tabel baru
SHOW TABLES LIKE 'translations';
SHOW TABLES LIKE 'galeri';

-- Hitung data
SELECT COUNT(*) as total_translations FROM translations;  -- Harus 52
SELECT COUNT(*) as total_galeri FROM galeri;              -- Harus 20+

-- Cek koordinat destinasi
SELECT id, nama, latitude, longitude FROM destinasi WHERE latitude IS NOT NULL;
```

**Expected Results:**

- `translations`: 52 rows (26 Indonesian + 26 English)
- `galeri`: 20+ rows (4-6 photos per destination)
- `destinasi`: 4 destinations have lat/long coordinates

---

## ✨ Fitur 1: Interactive Map

### Deskripsi

Peta interaktif menggunakan Leaflet.js dengan OpenStreetMap yang menampilkan lokasi destinasi secara visual dengan marker kustom.

### Lokasi Implementasi

- **File**: `app/views/pages/detail.php` (sidebar)
- **Model**: Menggunakan data `latitude` dan `longitude` dari tabel `destinasi`
- **Library**: Leaflet 1.9.4 (sudah ter-load di `header.php`)

### Fitur Map

- ✅ Peta interaktif dengan zoom/pan
- ✅ Custom marker dengan icon custom
- ✅ Popup otomatis terbuka menampilkan nama destinasi
- ✅ Tombol navigasi ke Google Maps dan Waze
- ✅ Scroll zoom disabled by default (enabled after click)
- ✅ Responsive design

### Cara Menggunakan

1. Buka halaman detail destinasi: `http://localhost/pkaltim-tim02-main/destinasi/1`
2. Scroll ke sidebar kanan
3. Lihat section **"Lokasi di Peta"**
4. Klik dan drag untuk navigasi peta
5. Zoom in/out dengan mouse wheel (setelah klik peta)
6. Klik marker untuk melihat popup
7. Gunakan tombol "Google Maps" atau "Waze" untuk navigasi eksternal

### Koordinat yang Tersedia

| Destinasi            | Latitude | Longitude |
| -------------------- | -------- | --------- |
| Mangrove Kariangau   | -1.1556  | 116.8634  |
| Labuan Cermin        | 2.4258   | 117.6542  |
| Pulau Derawan        | 2.2833   | 118.2333  |
| Taman Nasional Kutai | 0.5167   | 117.2167  |

### Troubleshooting

**Map tidak muncul?**

- Cek browser console (F12) untuk error
- Pastikan Leaflet CSS dan JS sudah ter-load di `header.php` lines 31-32
- Pastikan latitude/longitude ada di database (jalankan UPDATE query di `new_features.sql`)

**Marker tidak muncul?**

- Periksa custom icon class `custom-map-marker` di `detail.php`
- Periksa koordinat destinasi tidak null

---

## 📸 Fitur 2: Gallery Lightbox

### Deskripsi

Gallery foto untuk menampilkan koleksi foto destinasi dengan lightbox effect menggunakan GLightbox.js. Support masonry layout dan caption hover effect.

### Lokasi Implementasi

- **File**: `app/views/pages/detail.php` (setelah Tips section)
- **Model**: `app/models/Galeri.php` (CRUD operations)
- **Controller**: `app/controllers/DestinasiController.php` (load gallery data)
- **Library**: GLightbox 3.2.0 (sudah ter-load di `header.php` & `footer.php`)

### Fitur Gallery

- ✅ Masonry grid layout (foto pertama 2x2, sisanya 1x1)
- ✅ Lightbox dengan zoom, swipe navigation
- ✅ Caption overlay on hover
- ✅ Loading animation saat buka lightbox
- ✅ Keyboard navigation (arrow keys, ESC)
- ✅ Touch/swipe support untuk mobile
- ✅ Fallback image jika foto tidak ditemukan

### Cara Menggunakan

1. Buka halaman detail destinasi: `http://localhost/pkaltim-tim02-main/destinasi/1`
2. Scroll ke section **"Galeri Foto"**
3. Hover over foto untuk lihat caption
4. Klik foto untuk buka lightbox
5. Gunakan arrow keys atau swipe untuk navigasi
6. Klik X atau tekan ESC untuk tutup lightbox

### Gallery Data

| Destinasi            | Jumlah Foto |
| -------------------- | ----------- |
| Mangrove Kariangau   | 4 photos    |
| Labuan Cermin        | 5 photos    |
| Pulau Derawan        | 6 photos    |
| Taman Nasional Kutai | 5 photos    |

### Model Methods (Galeri.php)

```php
$galeriModel = new Galeri();

// Get all photos for destination
$photos = $galeriModel->getByDestinasi($destinasiId);

// Create new photo
$galeriModel->create([
    'destinasi_id' => 1,
    'nama_file' => 'photo.jpg',
    'caption' => 'Beautiful view',
    'urutan' => 1
]);

// Update photo
$galeriModel->update($id, ['caption' => 'New caption']);

// Delete photo
$galeriModel->delete($id);

// Count photos
$count = $galeriModel->countByDestinasi($destinasiId);
```

### Troubleshooting

**Gallery tidak muncul?**

- Pastikan `new_features.sql` sudah di-import
- Cek database query: `SELECT * FROM galeri WHERE destinasi_id = 1;`
- Pastikan DestinasiController load Galeri model (line 54-57)

**Lightbox tidak berfungsi?**

- Pastikan GLightbox JS ter-load di `footer.php` lines 79-91
- Cek class `glightbox` ada di anchor tag
- Cek browser console untuk JavaScript errors

**Foto tidak tampil?**

- Pastikan file foto ada di `public/images/destinations/`
- Periksa nama file di database match dengan file fisik
- Fallback image akan tampil jika foto tidak ditemukan

---

## 🌐 Fitur 3: Multi-language Support

### Deskripsi

Sistem multi-bahasa (Indonesia & English) dengan database-driven translations, session persistence, dan cookie fallback (30 hari).

### Lokasi Implementasi

- **Helper**: `app/helpers/Language.php` (translation system)
- **Route**: `index.php` line 198-207 (POST `/language/switch`)
- **UI**: `app/views/layouts/navbar.php` (language switcher)
- **Database**: Tabel `translations` (lang_code, category, key, value)

### Fitur Language

- ✅ Dropdown switcher di navbar (desktop + mobile)
- ✅ Flag icons (🇮🇩 Indonesia, 🇬🇧 English)
- ✅ Session + Cookie persistence (30 hari)
- ✅ Database-driven (mudah add language baru)
- ✅ Default fallback ke Indonesian
- ✅ Active language indicator (checkmark icon)
- ✅ Smooth transition tanpa page reload

### Cara Menggunakan

#### End User (Ganti Bahasa)

1. Klik icon globe (🌐) di navbar
2. Pilih bahasa dari dropdown:
   - 🇮🇩 **Indonesia**
   - 🇬🇧 **English**
3. Halaman akan reload dengan bahasa yang dipilih
4. Preference tersimpan di session dan cookie (30 hari)

#### Developer (Gunakan Translation)

```php
// Di any view file
<?= Language::get('nav.home') ?>           // Output: "Beranda" or "Home"
<?= Language::get('common.welcome') ?>     // Output: "Selamat Datang" or "Welcome"
<?= Language::get('detail.location') ?>    // Output: "Lokasi" or "Location"

// Get current language
$currentLang = Language::getCurrentLanguage(); // "id" or "en"

// Set language programmatically
Language::setLanguage('en');
```

### Translation Keys Available

Total: 52 translation keys (26 per language)

**Categories:**

- `nav.*` - Navbar items (home, about, destination, gallery)
- `common.*` - Common words (welcome, search, filter, etc)
- `detail.*` - Detail page labels (price, hours, location, etc)

**Contoh Keys:**

```
nav.home          → "Beranda" / "Home"
nav.about         → "Tentang" / "About"
nav.destination   → "Destinasi" / "Destination"
common.welcome    → "Selamat Datang" / "Welcome"
common.search     → "Cari" / "Search"
detail.location   → "Lokasi" / "Location"
detail.price      → "Harga Tiket" / "Ticket Price"
```

### Database Schema

```sql
CREATE TABLE translations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lang_code VARCHAR(5) NOT NULL,      -- 'id' or 'en'
    category VARCHAR(50) NOT NULL,      -- 'nav', 'common', 'detail'
    translation_key VARCHAR(100) NOT NULL,
    translation_value TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_translation (lang_code, category, translation_key)
);
```

### Add New Language

#### Step 1: Insert Translations

```sql
-- Add French translations (example)
INSERT INTO translations (lang_code, category, translation_key, translation_value) VALUES
('fr', 'nav', 'home', 'Accueil'),
('fr', 'nav', 'about', 'À propos'),
('fr', 'common', 'welcome', 'Bienvenue');
```

#### Step 2: Update Navbar Switcher

Edit `app/views/layouts/navbar.php`:

```php
<!-- Desktop dropdown -->
<button type="submit" name="lang" value="fr" class="...">
    <span class="text-xl">🇫🇷</span>
    <span class="text-sm font-medium text-gray-700">Français</span>
    <?php if (Language::getCurrentLanguage() === 'fr'): ?>
    <i class="fas fa-check ml-auto text-custom-secondary"></i>
    <?php endif; ?>
</button>
```

### Troubleshooting

**Language tidak ganti?**

- Pastikan tabel `translations` sudah ada dan ter-isi
- Cek session: `var_dump($_SESSION['language']);`
- Cek cookie di browser DevTools → Application → Cookies
- Periksa Language::init() dipanggil di `index.php` line 14

**Translation tidak tampil?**

- Pastikan key ada di database: `SELECT * FROM translations WHERE translation_key = 'nav.home';`
- Periksa Language::get() dipanggil dengan key yang benar
- Default value akan return key jika translation tidak ditemukan

**Dropdown tidak muncul?**

- Cek JavaScript di `navbar.php` untuk language toggle
- Pastikan Tailwind classes berfungsi (opacity-0, invisible)
- Periksa z-index dropdown tidak tertutup element lain

---

## 🧪 Testing Checklist

### Pre-Testing

- [ ] Import `new_features.sql` berhasil
- [ ] Verify 2 tabel baru exist (translations, galeri)
- [ ] Verify data ter-import (52 translations, 20+ gallery)
- [ ] Clear browser cache (Ctrl + F5)

### Test Interactive Map

- [ ] Buka destinasi detail page
- [ ] Map container tampil di sidebar
- [ ] Marker muncul di koordinat yang benar
- [ ] Popup terbuka otomatis dengan nama destinasi
- [ ] Zoom in/out berfungsi (setelah klik peta)
- [ ] Pan/drag peta berfungsi
- [ ] Tombol "Google Maps" redirect ke Google Maps
- [ ] Tombol "Waze" redirect ke Waze app/web
- [ ] Map responsive di mobile (test dengan F12 → Device mode)

### Test Gallery Lightbox

- [ ] Gallery section tampil di detail page
- [ ] Grid layout correct (foto pertama 2x2, sisanya 1x1)
- [ ] Hover effect tampil caption
- [ ] Klik foto → lightbox terbuka
- [ ] Foto tampil full size di lightbox
- [ ] Arrow navigation berfungsi (next/prev)
- [ ] Keyboard arrow keys berfungsi
- [ ] ESC key menutup lightbox
- [ ] Zoom in/out berfungsi
- [ ] Touch swipe berfungsi di mobile

### Test Multi-language

- [ ] Globe icon tampil di navbar (desktop)
- [ ] Klik globe → dropdown muncul
- [ ] Flag icons tampil (🇮🇩 🇬🇧)
- [ ] Active language memiliki checkmark
- [ ] Klik "Indonesia" → halaman reload dalam Bahasa Indonesia
- [ ] Klik "English" → halaman reload dalam English
- [ ] Preference tersimpan setelah close browser (test cookie)
- [ ] Mobile language switcher tampil di mobile menu
- [ ] Mobile switcher berfungsi sama dengan desktop

### Browser Compatibility

- [ ] Chrome/Edge (recommended)
- [ ] Firefox
- [ ] Safari (Mac/iOS)
- [ ] Mobile Chrome (Android)
- [ ] Mobile Safari (iOS)

### Performance Check

- [ ] Page load < 3 seconds dengan semua fitur
- [ ] No console errors di browser DevTools (F12)
- [ ] No PHP errors di XAMPP error log
- [ ] Images load dengan lazy loading
- [ ] Map initialization tidak block page render

---

## 📊 Technical Details

### File Changes Summary

#### New Files Created (4)

1. `app/models/Galeri.php` - 89 lines - Gallery CRUD model
2. `app/helpers/Language.php` - 106 lines - Translation system
3. `database/new_features.sql` - ~180 lines - Database schema + data
4. `docs/NEW_FEATURES_GUIDE.md` - This file

#### Files Modified (4)

1. `index.php` - Added Language::init() + language switch route
2. `app/controllers/DestinasiController.php` - Load gallery data in detail()
3. `app/views/pages/detail.php` - Added gallery section + interactive map
4. `app/views/layouts/navbar.php` - Added language switcher (desktop + mobile)

### Database Tables

#### `galeri` Table

```sql
CREATE TABLE galeri (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destinasi_id INT NOT NULL,
    nama_file VARCHAR(255) NOT NULL,
    caption TEXT,
    urutan INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (destinasi_id) REFERENCES destinasi(id) ON DELETE CASCADE
);
```

#### `translations` Table

```sql
CREATE TABLE translations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lang_code VARCHAR(5) NOT NULL,
    category VARCHAR(50) NOT NULL,
    translation_key VARCHAR(100) NOT NULL,
    translation_value TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY (lang_code, category, translation_key)
);
```

### Libraries Used

| Library      | Version | Purpose          | CDN Link                                          |
| ------------ | ------- | ---------------- | ------------------------------------------------- |
| GLightbox    | 3.2.0   | Gallery lightbox | cdn.jsdelivr.net/npm/glightbox@3.2.0              |
| Leaflet      | 1.9.4   | Interactive maps | unpkg.com/leaflet@1.9.4                           |
| Font Awesome | 6.5.1   | Icons            | cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1 |
| Tailwind CSS | 3.x     | Styling          | Already compiled in output.css                    |

---

## 🔧 Maintenance

### Add New Gallery Photos

1. Upload foto ke `public/images/destinations/`
2. Insert ke database:

```sql
INSERT INTO galeri (destinasi_id, nama_file, caption, urutan) VALUES
(1, 'new-photo.jpg', 'Beautiful sunset view', 10);
```

### Update Coordinates

```sql
UPDATE destinasi
SET latitude = -1.2345, longitude = 116.5678
WHERE id = 5;
```

### Add Translation Keys

```sql
-- Indonesian
INSERT INTO translations (lang_code, category, translation_key, translation_value) VALUES
('id', 'common', 'contact', 'Hubungi Kami');

-- English
INSERT INTO translations (lang_code, category, translation_key, translation_value) VALUES
('en', 'common', 'contact', 'Contact Us');
```

### Backup Database

```bash
mysqldump -u root wisata_alam_kaltim > backup_$(date +%Y%m%d).sql
```

---

## 📞 Support

Jika menemukan masalah:

1. Check browser console (F12) untuk JavaScript errors
2. Check XAMPP error log untuk PHP errors
3. Verify database import successful
4. Clear browser cache dan cookies
5. Test di browser lain

---

## ✅ Success Criteria

Implementasi dianggap sukses jika:

- ✅ Semua data ter-import tanpa error
- ✅ Map tampil dengan marker di koordinat yang benar
- ✅ Gallery lightbox berfungsi dengan smooth animation
- ✅ Language switcher ganti bahasa dengan benar
- ✅ No JavaScript errors di console
- ✅ No PHP errors di XAMPP log
- ✅ Responsive design di mobile dan desktop
- ✅ Page load time < 3 detik

---

**Version**: 1.0.0  
**Last Updated**: 2024  
**Author**: GitHub Copilot  
**Project**: ExploreKaltim - Tourism Website
