# 🏔️ Wisata Alam Kaltim - Website Sistem Informasi Wisata Alam Kalimantan Timur

> **Visi:** Menjadi pusat data wisata alam terlengkap di Kalimantan Timur yang kredibel, mudah diakses, dan informatif.

> **🚀 Quick Start:** Project ini menggunakan **Mock Data** - Tidak perlu setup database! Langsung bisa jalan!

[![PHP](https://img.shields.io/badge/PHP-Native-777BB4?logo=php)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-CSS-38B2AC?logo=tailwind-css)](https://tailwindcss.com)
![No Database Required](https://img.shields.io/badge/Database-Mock%20Data-green)

**PIC:** Widhi  
**Subtema:** Wisata Alam Kalimantan Timur

## 👥 Anggota Tim

1. Chalel (Leader)
2. Ikhsan
3. Ridho

## 📋 Deskripsi Project

Website Sistem Informasi Wisata Alam Kalimantan Timur adalah platform yang menyajikan informasi lengkap tentang destinasi wisata alam di Kalimantan Timur. Website ini dibangun dengan arsitektur **MVC (Model-View-Controller)** yang advanced namun tetap friendly untuk development.

**💡 Special Feature:** Saat ini menggunakan **Mock Data** (data dummy dalam array PHP) sehingga tidak memerlukan setup database MySQL. Perfect untuk development cepat dan demo!

### ✨ Fitur Utama

- 🗺️ **Direktori Wisata Lengkap** - Daftar destinasi per kategori (Hutan, Pantai, Sungai, Danau, dll)
- 📍 **Informasi Detail** - Lokasi, harga tiket, jam operasional, fasilitas
- 🌟 **Rating & Review** - Sistem rating untuk setiap destinasi
- 🔍 **Pencarian & Filter** - Cari berdasarkan nama, kategori, atau lokasi
- 📰 **Artikel & Tips** - Panduan perjalanan dan tips wisata
- 📱 **Responsive Design** - Tampilan optimal di semua perangkat
- 🎨 **Modern UI/UX** - Desain yang menarik dengan Tailwind CSS

## 🛠️ Tech Stack

| Teknologi         | Keterangan                                     |
| ----------------- | ---------------------------------------------- |
| **Backend**       | PHP Native (>=7.4)                             |
| **Data Storage**  | Mock Data (PHP Arrays) - No Database Required! |
| **Frontend**      | HTML5, CSS3, JavaScript                        |
| **CSS Framework** | Tailwind CSS CLI                               |
| **Architecture**  | MVC (Model-View-Controller)                    |
| **Icons**         | Font Awesome 6                                 |
| **Fonts**         | Google Fonts (Inter, Poppins)                  |

**Note:** File SQL (`database/wisata_alam_kaltim.sql`) disediakan untuk referensi jika nanti ingin upgrade ke database MySQL.

## 📁 Struktur Project

```
tim-02/
├── index.php                 # Entry point (Front Controller)
├── config/
│   ├── config.php           # Konfigurasi aplikasi
│   └── database.php         # (Not used - saved for future)
├── app/
│   ├── controllers/
│   │   ├── HomeController.php
│   │   ├── DestinasiController.php
│   │   └── ArtikelController.php
│   ├── models/ (Mock Data Version)
│   │   ├── Destinasi.php    # 6 destinasi sample
│   │   ├── Kategori.php     # 6 kategori wisata
│   │   └── Artikel.php      # 3 artikel sample
│   └── views/
│       ├── layouts/
│       │   ├── header.php
│       │   ├── navbar.php
│       │   └── footer.php
│       └── pages/
│           ├── home.php
│           ├── destinasi.php
│           ├── detail.php
│           └── artikel.php
├── public/
│   ├── css/
│   │   ├── input.css        # Tailwind source
│   │   └── output.css       # Compiled CSS
│   ├── js/
│   │   └── main.js
│   └── images/
│       ├── destinations/
│       └── articles/
├── database/
│   └── wisata_alam_kaltim.sql  # For future reference
├── package.json
├── tailwind.config.js
├── README.md
└── SETUP-MOCKDATA.md        # Panduan setup tanpa database
```

## 🚀 Cara Install & Setup

### Quick Start (3 Menit!)

```bash
# 1. Copy project ke htdocs/www

# 2. Masuk ke folder
cd C:\xampp\htdocs\pkaltim\teams\tim-02

# 3. Install & build Tailwind
npm install
npm run build

# 4. Start Apache di XAMPP/Laragon

# 5. Akses di browser
http://localhost/pkaltim/teams/tim-02/
```

**Done! No database setup needed!** 🎉

### Prerequisites

Pastikan sudah terinstall:

- ✅ PHP >= 7.4
- ✅ Web Server (Apache via XAMPP/Laragon)
- ❌ MySQL **TIDAK PERLU** (pakai mock data)
- ✅ Node.js & npm (untuk Tailwind CSS)

### Dokumentasi Lengkap

Lihat [SETUP-MOCKDATA.md](SETUP-MOCKDATA.md) untuk panduan lengkap step-by-step tanpa database.

## 📊 Mock Data

### Data yang Tersedia:

**Destinasi (6 items):**

1. Hutan Mangrove Kariangau - Balikpapan
2. Pantai Manggar Segara Sari - Balikpapan
3. Danau Selor - Berau
4. Taman Nasional Kutai - Kutai Timur
5. Pantai Amal - Kutai Kartanegara
6. Air Terjun Tanah Merah - Samarinda

**Kategori (6 items):**

- Hutan, Pantai, Sungai, Danau, Gunung, Air Terjun

**Artikel (3 items):**

- Panduan Lengkap Berkunjung ke Kalimantan Timur
- Musim Terbaik Mengunjungi Wisata Alam Kaltim
- 10 Kuliner Khas yang Wajib Dicoba di Kaltim

### Edit Mock Data

**File Locations:**

- Destinasi: `app/models/Destinasi.php` → method `getMockData()`
- Kategori: `app/models/Kategori.php` → method `getMockData()`
- Artikel: `app/models/Artikel.php` → method `getMockData()`

Tinggal edit array PHP untuk menambah/mengubah data!

## 🎨 Tailwind CSS Commands

```bash
# Development (dengan watch mode)
npm run dev

# Build untuk production (minified)
npm run build
```

Setelah compile, CSS akan tersimpan di `public/css/output.css`

## 🌐 Routing

Website menggunakan **Front Controller Pattern** dengan routing sederhana:

| URL               | Controller          | Method      | Deskripsi        |
| ----------------- | ------------------- | ----------- | ---------------- |
| `/` atau `/home`  | HomeController      | index()     | Landing page     |
| `/destinasi`      | DestinasiController | index()     | List destinasi   |
| `/destinasi/{id}` | DestinasiController | detail($id) | Detail destinasi |
| `/artikel`        | ArtikelController   | index()     | List artikel     |

## 🎯 MVP (Minimum Viable Product)

Fokus development awal pada **Landing Page** dengan fitur:

- ✅ Hero section yang menarik
- ✅ Statistik wisata
- ✅ Featured destinations (6 destinasi pilihan)
- ✅ Kategori wisata
- ✅ Artikel terbaru
- ✅ Responsive design
- ✅ Fast loading dengan Tailwind CSS
- ✅ **Mock data - No database required!**

## 🔄 Migrasi ke Database Nyata (Opsional)

Jika nanti ingin upgrade ke database MySQL:

1. Setup MySQL & import `database/wisata_alam_kaltim.sql`
2. Uncomment di `index.php`: `require_once __DIR__ . '/config/database.php';`
3. Update Models untuk menggunakan PDO (versi database tersimpan di git history)
4. Konfigurasi `config/config.php` untuk database credentials

Detail: Lihat bagian "Migrasi ke Database Nyata" di [SETUP-MOCKDATA.md](SETUP-MOCKDATA.md)

## 📝 To-Do List (Future Development)

- [ ] Sistem login admin
- [ ] CRUD destinasi dari admin panel
- [ ] Upload foto galeri
- [ ] Sistem review & rating user
- [ ] Integrasi weather API
- [ ] Google Maps integration
- [ ] Share ke social media
- [ ] Print-friendly detail page
- [ ] Export PDF panduan wisata
- [ ] Multi-language support
- [ ] **Migrasi ke database MySQL (from mock data)**

## 🤝 Tim Development

**Tim-02** - Mini Project Wisata Alam Kaltim

## 📄 License

MIT License - Bebas digunakan untuk keperluan edukasi

## 📞 Support

Jika ada pertanyaan atau masalah:

- 📧 Email: support@wisatakaltim.com
- 💬 Issues: Buat issue di repository ini

## 🚀 Live Demo

**URL:** [Coming Soon]

## 📅 Status

✅ MVP Ready - Landing Page Complete (Mock Data Version)

---

**Last Update:** 20 Januari 2026

---

**Happy Coding! 🚀**

_Jelajahi Keindahan Wisata Alam Kalimantan Timur_

_No Database, No Problem!_
