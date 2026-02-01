# ExploreKaltim

> Platform digital untuk menjelajahi keindahan wisata alam Kalimantan Timur

Website katalog destinasi wisata alam yang memudahkan wisatawan menemukan dan mengeksplorasi keindahan alam Kalimantan Timur, dari hutan mangrove sampai pantai-pantai eksotis.

[![PHP Version](https://img.shields.io/badge/PHP-7.4+-blue.svg)](https://www.php.net/)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

---

## Tentang Project

Project ini dibangun dengan pendekatan **MVC Pattern** menggunakan PHP native sehingga memberikan kontrol penuh atas setiap aspek aplikasi sambil tetap menjaga struktur kode yang clean dan maintainable.

---

## ✨ Fitur Utama

### Untuk Pengunjung

- **🗺️ Jelajahi Destinasi** - Browse koleksi destinasi dengan filter kategori (hutan, pantai, danau, dll)
- **🔍 Pencarian** - Cari destinasi berdasarkan nama atau deskripsi
- **📍 Detail Lengkap** - Info komprehensif: deskripsi, lokasi (Google Maps), jam operasional, harga tiket, fasilitas, tips
- **🖼️ Galeri Foto** - Lightbox gallery dengan zoom untuk preview destinasi
- **🌍 Multi-bahasa** - Support Bahasa Indonesia & English
- **☁️ Info Cuaca** - Real-time weather untuk kota-kota di Kaltim
- **📱 Responsive** - Tampilan optimal di desktop, tablet, dan mobile

### Untuk Admin

- **📊 Dashboard Analytics** - Overview destinasi, kategori, dan user
- **✏️ Manajemen Destinasi** - CRUD lengkap untuk data destinasi
- **👥 Manajemen User** - Kelola akun admin dengan role-based access
- **🖼️ Upload Gambar** - Upload foto destinasi langsung dari panel
- **🌐 Kelola Translations** - Manage konten multi-bahasa via admin panel
- **🔐 Autentikasi Aman** - Login dengan password hashing (bcrypt)

---

## 🛠️ Tech Stack

### Backend

- **PHP 7.4+** - Server-side scripting (Native, no framework)
- **MySQL 5.7+** / MariaDB 10.2+ - Database
- **Composer** - Dependency management
- **phpdotenv** - Environment configuration

### Frontend

- **HTML5, CSS3, JavaScript** - Core web technologies
- **Tailwind CSS 3.x** - Utility-first CSS framework
- **Font Awesome 6.5.1** - Icon library
- **AOS** - Scroll animation library
- **Swiper.js** - Touch slider/carousel
- **Leaflet.js** - Interactive maps

### Architecture & Patterns

- **MVC Pattern** - Separation of concerns
- **Singleton Pattern** - Database connection
- **RESTful Routing** - Clean URL structure
- **Environment Variables** - Secure configuration

---

## 🚀 Quick Start

### Prerequisites

Yang harus dipersipakan yaitu:

- PHP >= 7.4
- MySQL >= 5.7 atau MariaDB >= 10.2
- Composer
- Web server (Apache/Nginx) atau XAMPP

### Installation

```bash
# 1. Clone repository
git clone <repository-url> explore-kaltim
cd explore-kaltim

# 2. Install dependencies
composer install

# 3. Setup environment
cp .env.example .env
# Edit .env sesuai konfigurasi kamu

# 4. Import database
# Via phpMyAdmin atau command line:
mysql -u root -p wisata_alam_kaltim < database/wisata_alam_kaltim.sql

# 5. Compile CSS (opsional)
npm install
npm run build

# 6. Done! Akses via browser
```

**Login Admin:**

- URL: `http://localhost/explore-kaltim/admin/login`

> 📚 **Butuh panduan lebih detail?** Lihat [SETUP-GUIDE.md](SETUP-GUIDE.md)

---

## 📁 Struktur Project

```
explore-kaltim/
├── app/
│   ├── controllers/     # Business logic & request handling
│   ├── models/          # Database operations & data logic
│   ├── views/           # UI templates
│   │   ├── admin/       # Admin panel views
│   │   ├── layouts/     # Reusable layouts (header, footer, navbar)
│   │   └── pages/       # Public pages
│   └── helpers/         # Utility functions (Auth, Language)
├── config/
│   ├── config.php       # App configuration
│   └── database.php     # Database connection class
├── database/            # SQL schema & migrations
├── public/              # Web-accessible files
│   ├── css/             # Stylesheets
│   ├── js/              # JavaScript
│   └── images/          # Uploaded images
├── vendor/              # Composer dependencies
├── .env.example         # Environment template
├── .gitignore           # Git ignore rules
├── index.php            # Front controller & router
└── README.md           # You are here!
```

---

## 🔒 Security Features

Project ini dibangun dengan security best practices:

- ✅ **SQL Injection Prevention** - PDO prepared statements di semua query
- ✅ **XSS Prevention** - `htmlspecialchars()` untuk semua user input
- ✅ **Password Security** - Bcrypt hashing dengan `password_hash()`
- ✅ **Session Security** - Proper session management
- ✅ **Environment Variables** - Credentials tidak di-commit ke Git
- ✅ **CSRF Protection** - Token validation di form (ready untuk enable)
- ✅ **Role-Based Access** - Admin dan Penulis role dengan permission berbeda

---

## 📦 Dependencies

### PHP Libraries (via Composer)

```json
{
  "vlucas/phpdotenv": "^5.5", // Environment configuration
  "graham-campbell/result-type": "*", // Type safety for phpdotenv
  "phpoption/phpoption": "*" // Optional values handling
}
```

### Frontend Libraries (via CDN)

- **Tailwind CSS** - Utility-first CSS framework
- **Font Awesome** - 1,500+ free icons
- **AOS** - Animate on scroll library
- **Swiper** - Modern mobile touch slider
- **GLightbox** - Pure JavaScript lightbox
- **Leaflet** - Mobile-friendly interactive maps

---

## 🌐 Multi-Language System

Support untuk Bahasa Indonesia dan English dengan database-driven translations:

```php
// Di view files
<?= Language::get('nav.home') ?>          // Output: "Beranda" atau "Home"
<?= Language::get('dest.search_placeholder') ?>  // Context-aware translations
```

**Fitur:**

- Session + Cookie persistence (30 hari)
- Admin panel untuk manage translations
- Easy to add new languages
- Fallback ke default language

📖 **Detail:** [TRANSLATION-FIX.md](TRANSLATION-FIX.md)

---

## 🗄️ Database Schema

### Tabel Utama

| Tabel          | Deskripsi                                              |
| -------------- | ------------------------------------------------------ |
| `destinasi`    | Data destinasi wisata (nama, deskripsi, lokasi, harga) |
| `kategori`     | Kategori wisata (hutan, pantai, danau, dll)            |
| `kabupaten`    | Master data kabupaten/kota di Kaltim                   |
| `users`        | Admin & penulis accounts                               |
| `galeri`       | Galeri foto destinasi                                  |
| `fasilitas`    | Fasilitas yang tersedia di destinasi                   |
| `tips`         | Tips berkunjung untuk setiap destinasi                 |
| `translations` | Multi-language translations (ID/EN)                    |
| `artikel`      | Blog posts / artikel tips wisata                       |

---

## 🎨 Customization

### Update Styling

```bash
# Edit file: public/css/input.css atau tailwind.config.js
npm run dev    # Development mode (watch mode)
npm run build  # Production build
```

### Add Translation

```sql
INSERT INTO translations (lang_code, translation_key, translation_value) VALUES
('id', 'footer.copyright', 'Hak Cipta © 2026'),
('en', 'footer.copyright', 'Copyright © 2026');
```

```php
<p><?= Language::get('footer.copyright') ?></p>
```

---

## 📝 Development Workflow

### Branching Strategy

```bash
main        # Production-ready code
develop     # Development branch
feature/*   # New features
fix/*       # Bug fixes
```

### Commit Convention

```
feat: Add image upload validation
fix: Resolve translation loading error
docs: Update setup guide
style: Format code with PSR-12
refactor: Optimize database queries
```

---

## 🚢 Production Deployment

Checklist sebelum deploy:

- [ ] Set `APP_ENV=production` di `.env`
- [ ] Update `BASE_URL` ke domain production
- [ ] Change admin password default
- [ ] Run `composer install --optimize-autoloader --no-dev`
- [ ] Run `npm run build` untuk optimize CSS
- [ ] Set proper file permissions (`chmod 644 .env`)
- [ ] Enable HTTPS dengan SSL certificate
- [ ] Setup automated database backup
- [ ] Configure firewall rules
- [ ] Test all features di staging environment

---

## 🤝 Contributing

Kontribusi selalu welcome! Kalau kamu mau contribute:

1. Fork repository ini
2. Buat branch baru (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'feat: Add amazing feature'`)
4. Push ke branch (`git push origin feature/amazing-feature`)
5. Open Pull Request

---

## 📄 License

Project ini open source dan available under the [MIT License](LICENSE).

---

## 👥 Tim Pengembang

Dikembangkan oleh **Tim 02** sebagai project pembelajaran web development.

---

## 📞 Support & Contact

- 🐛 **Bug Reports:** [Create an issue](../../issues)
- 💡 **Feature Requests:** [Open a discussion](../../discussions)
- 📧 **Email:** support@explorekaltim.com

---

## 🙏 Acknowledgments

Terima kasih kepada:

- OpenWeatherMap untuk weather API
- Unsplash & Pexels untuk placeholder images
- Open source community untuk amazing tools & libraries
- Semua kontributor yang telah membantu project ini

---

**📍 Jelajahi keindahan Kalimantan Timur bersama ExploreKaltim!**

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
