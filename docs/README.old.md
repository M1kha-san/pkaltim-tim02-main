# ExploreKaltim - Platform Wisata Alam Kalimantan Timur

Sebuah website katalog destinasi wisata alam di Kalimantan Timur. Project ini dibuat untuk memudahkan wisatawan menemukan dan mengeksplorasi keindahan alam Kaltim, dari hutan mangrove sampai pantai-pantai eksotis.

## Tentang Project

Kalimantan Timur punya banyak destinasi wisata alam yang menakjubkan, tapi informasinya masih tersebar dan susah diakses. ExploreKaltim hadir sebagai solusi - sebuah platform terpusat yang menampilkan berbagai destinasi wisata lengkap dengan detail informasi, foto, lokasi, dan tips berkunjung.

Website ini dibangun menggunakan PHP native dengan pola MVC, MySQL untuk database, dan Tailwind CSS untuk tampilan. Kenapa native PHP? Karena dalam diskusi proyek tim sepakat untuk memilih php native sebagai backedn dan ingin punya kontrol penuh atas setiap aspek aplikasi.

## Fitur Utama

### Untuk Pengunjung (Public)

- **Jelajahi Destinasi** - Browse koleksi destinasi wisata dengan filter kategori (hutan, pantai, danau, dll)
- **Pencarian** - Cari destinasi berdasarkan nama atau deskripsi
- **Detail Lengkap** - Info komprehensif: deskripsi, lokasi (Google Maps), jam operasional, harga tiket, fasilitas, dan tips berkunjung
- **Galeri Foto** - Lihat foto-foto destinasi sebelum berkunjung
- **Responsive Design** - Tampilan optimal di desktop, tablet, dan mobile

### Untuk Admin

- **Dashboard Analytics** - Overview statistik destinasi, kategori, dan user
- **Manajemen Destinasi** - CRUD lengkap untuk data destinasi
- **Manajemen User** - Kelola akun admin dan penulis (role-based access)
- **Upload Gambar** - Upload foto destinasi langsung dari panel
- **Autentikasi Aman** - Login dengan password hashing (bcrypt)

## Tech Stack

**Backend:**

- PHP 7.4+ (Native, no framework)
- MySQL 5.7+ / MariaDB 10.2+
- PDO untuk database operations
- Session-based authentication
- Composer (dependency management)
- vlucas/phpdotenv (environment variables)

**Frontend:**

- HTML5, CSS3, JavaScript (Vanilla)
- Tailwind CSS 3.x
- Font Awesome 6.5.1
- Google Fonts (Inter)

**Architecture:**

- MVC Pattern (Model-View-Controller)
- Singleton pattern untuk database connection
- RESTful routing structure
- Environment variables (.env) untuk konfigurasi
- Security: Prepared statements, CSRF tokens, XSS prevention

## Struktur Project

```
pkaltim-tim02-main/
├── app/
│   ├── controllers/          # Business logic
│   │   ├── HomeController.php
│   │   ├── DestinasiController.php
│   │   ├── AdminController.php
│   │   └── ...
│   ├── models/              # Database interactions
│   │   ├── DestinasiDB.php
│   │   ├── KategoriDB.php
│   │   ├── Admin.php
│   │   └── ...
│   ├── views/               # UI templates
│   │   ├── layouts/        # Header, navbar, footer
│   │   ├── pages/          # Public pages
│   │   └── admin/          # Admin panel views
│   └── helpers/            # Utility functions
│       └── Auth.php
├── config/
│   ├── config.php          # App configuration
│   └── database.php        # Database class
├── public/
│   ├── css/               # Stylesheets
│   ├── js/                # JavaScript files
│   └── images/           # Uploaded images
├── database/
│   └── wisata_alam_kaltim.sql  # Database schema & seed
└── index.php            # Front controller
```

## Quick Start

### Prerequisites

- XAMPP / WAMP / LAMP (Apache + PHP + MySQL)
- PHP >= 7.4
- Composer (https://getcomposer.org/)
- MySQL >= 5.7 atau MariaDB >= 10.2
- Node.js & npm (untuk Tailwind CSS, optional)

### Installation

1. **Clone atau extract project ke htdocs**

   ```bash
   cd C:/xampp/htdocs/
   # atau lokasi htdocs Anda
   ```

2. **Import database**
   - Buka phpMyAdmin (http://localhost/phpmyadmin)
   - Buat database baru: `wisata_alam_kaltim`
   - Import file: `database/wisata_alam_kaltim.sql`

3. **Test environment setup**

   ```bash
   php test-env.php
   ```

   You should see: ✅ phpdotenv berhasil diload dan terintegrasi!

6 WEATHER_API_KEY=your_openweathermap_api_key

````

> 📖 **Dokumentasi lengkap:** [docs/PHPDOTENV-QUICKSTART.md](docs/PHPDOTENV-QUICKSTART.md)

4. **I
2. **Import database**
- Buka phpMyAdmin (http://localhost/phpmyadmin)
- Buat database baru: `wisata_alam_kaltim`
- Import file: `database/wisata_alam_kaltim.sql`

3. **Konfigurasi database** (jika perlu)

Edit `config/config.php`:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');  // sesuaikan password MySQL Anda
define('DB_NAME', 'wisata_alam_kaltim');
````

4. **Update BASE_URL** (jika nama folder berbeda)

   Edit `config/config.php`:

   ```php
   define('BASE_URL', 'http://localhost/pkaltim-tim02-main/');
   // ganti dengan nama folder Anda
   ```

5. **Akses website**
   - Public: http://localhost/pkaltim-tim02-main/
   - Admin: http://localhost/pkaltim-tim02-main/admin/login

### Default Admin Account

```
Username: admin
Password: admin123
```

⚠️ **Penting:** Ganti password default setelah login pertama!

## Development

### Compile Tailwind CSS (Optional)

Jika ingin modifikasi styling:

```bash
npm install
npm run dev     # development mode (watch)
npm run build   # production build
```

### Folder Permissions

Untuk production, pastikan folder upload writable:

```bash
chmod 755 public/images/destinations/
chmod 755 public/images/artikel/
```

## Fitur Keamanan

Project ini dibangun dengan security best practices:

- ✅ **SQL Injection Prevention** - PDO prepared statements di semua query
- ✅ **XSS Prevention** - `htmlspecialchars()` untuk semua user input yang ditampilkan
- ✅ **CSRF Protection** - Token validation di semua form
- ✅ **Password Security** - Bcrypt hashing dengan `password_hash()`
- ✅ **Session Security** - Proper session management dengan Auth helper
- ✅ **Role-Based Access** - Admin dan Penulis role dengan permission berbeda
- ✅ **Direct Access Protection** - .htaccess untuk protect config & source files
- ✅ **Environment Variables** - Credentials tersimpan aman di `.env` (not committed to Git)
- ✅ **Environment-Based Config** - Separate dev/production error handling

> 🔐 **Security Note:** File `.env` berisi credentials dan tidak di-commit ke Git. Setiap developer/server harus punya `.env` sendiri. Gunakan `.env.example` sebagai template.

## Database Schema

### Tabel Utama:

- **destinasi** - Data destinasi wisata
- **kategori** - Kategori wisata (hutan, pantai, danau, dll)
- **kabupaten** - Master data kabupaten/kota di Kaltim
- **users** - Admin & penulis accounts
- **artikel** - Blog posts / artikel tips wisata (future feature)
- **fasilitas** - Fasilitas yang tersedia di destinasi
- **tips** - Tips berkunjung untuk setiap destinasi

## Roadmap

Fitur yang sedang/akan dikembangkan:

- [ ] Artikel management di admin panel (sudah ada di database, UI disabled sementara)
- [ ] Upload multiple images per destinasi
- [ ] Review & rating dari user
- [ ] Integrasi social media sharing
- [ ] Peta interaktif dengan clustering
- [ ] Export data destinasi ke PDF
- [ ] Email notification system
- [ ] Advanced search dengan filter multiple

## Kontribusi

Project ini masih dalam pengembangan aktif. Silakan fork dan submit pull request untuk improvement atau bug fixes.

## Tim Pengembang

Dikembangkan oleh **Tim 02** sebagai project pembelajaran web development.

## Lisensi

Project ini dibuat untuk keperluan edukasi dan dapat digunakan secara bebas dengan mencantumkan kredit.

---

### Production Notes

Sebelum deploy ke production server:

1. Set `ENVIRONMENT` ke `'production'` di `config/config.php`
2. Update `BASE_URL` ke domain production
3. Ganti password admin default
4. Setup automated database backup
5. Review security headers di `.htaccess`
6. Test semua fitur di staging terlebih dahulu

Dokumentasi lengkap deployment ada di `PRODUCTION-CHECKLIST.md`.

---

**Selamat menjelajahi keindahan alam Kalimantan Timur! 🌿**
