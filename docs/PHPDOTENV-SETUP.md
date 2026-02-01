# 🔐 Setup phpdotenv - Environment Variables

## ✅ Apa yang Sudah Diimplementasikan?

Project ini sudah menggunakan **vlucas/phpdotenv** untuk mengelola environment variables dengan aman.

### 📦 Dependencies Installed:

- `vlucas/phpdotenv ^5.6` - Environment variable loader
- Composer autoloader configured

### 🔧 Files Modified:

- ✅ `composer.json` - Created with phpdotenv dependency
- ✅ `.env` - Environment variables file (NOT committed to Git)
- ✅ `.env.example` - Template file (committed to Git)
- ✅ `index.php` - Loads dotenv before config
- ✅ `config/config.php` - Uses `$_ENV` instead of hardcoded values
- ✅ `.gitignore` - Excludes `.env` files from Git

---

## 🚀 Quick Start (First Time Setup)

### 1. Copy Environment Template

```bash
cp .env.example .env
```

### 2. Edit `.env` File

Open `.env` and update your credentials:

```env
# Database Configuration
DB_HOST=localhost
DB_NAME=wisata_alam_kaltim
DB_USER=root
DB_PASS=your_password_here

# API Keys
WEATHER_API_KEY=paste_your_api_key_here

# Application URL (adjust if needed)
BASE_URL=http://localhost/pkaltim-tim02-main/
```

### 3. Install Dependencies (if not done)

```bash
composer install
```

### 4. Test Configuration

```bash
php test-env.php
```

You should see:

```
✅ phpdotenv berhasil diload dan terintegrasi!
```

---

## 🔑 Environment Variables Reference

### Database Configuration

| Variable  | Description       | Default              |
| --------- | ----------------- | -------------------- |
| `DB_HOST` | MySQL server host | `localhost`          |
| `DB_NAME` | Database name     | `wisata_alam_kaltim` |
| `DB_USER` | Database username | `root`               |
| `DB_PASS` | Database password | _(empty)_            |

### Application Configuration

| Variable       | Description          | Default                                |
| -------------- | -------------------- | -------------------------------------- |
| `APP_NAME`     | Application name     | `Wisata Alam Kaltim`                   |
| `APP_VERSION`  | Application version  | `1.0.0`                                |
| `APP_ENV`      | Environment mode     | `development`                          |
| `BASE_URL`     | Application base URL | `http://localhost/pkaltim-tim02-main/` |
| `APP_TIMEZONE` | Application timezone | `Asia/Makassar`                        |

### API Keys

| Variable          | Description            | Where to Get                                                     |
| ----------------- | ---------------------- | ---------------------------------------------------------------- |
| `WEATHER_API_KEY` | OpenWeatherMap API Key | [https://openweathermap.org/api](https://openweathermap.org/api) |

---

## 🔒 Security Best Practices

### ✅ DO's:

- ✅ Always use `.env` for sensitive data (passwords, API keys)
- ✅ Keep `.env` in `.gitignore` (already configured)
- ✅ Share `.env.example` with team (sanitized template)
- ✅ Different `.env` for dev/staging/production
- ✅ Use strong passwords in production

### ❌ DON'Ts:

- ❌ Never commit `.env` to Git
- ❌ Never hardcode credentials in PHP files
- ❌ Never share `.env` file via chat/email
- ❌ Never use production credentials in development

---

## 🌍 Environment-Specific Setup

### Development (Local)

```env
APP_ENV=development
BASE_URL=http://localhost/pkaltim-tim02-main/
DB_HOST=localhost
```

### Staging

```env
APP_ENV=staging
BASE_URL=https://staging.wisatakaltim.com/
DB_HOST=staging-db-server
```

### Production

```env
APP_ENV=production
BASE_URL=https://wisatakaltim.com/
DB_HOST=prod-db-server
```

---

## 🐛 Troubleshooting

### Error: "Class 'Dotenv\Dotenv' not found"

**Solution:** Run `composer install`

### Error: "Unable to read any of the environment file(s)"

**Solution:** Create `.env` file from `.env.example`

```bash
cp .env.example .env
```

### Values Not Loading

**Solution:** Clear PHP opcache or restart server

```bash
# XAMPP
# Stop Apache, then Start Apache
```

### Session Warning When Running test-env.php

**Solution:** This is expected. The warning occurs because we echo before session_start(). Not a problem for testing.

---

## 📝 How It Works

### 1. Entry Point (index.php)

```php
// Load Composer Autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Now config.php can access $_ENV variables
require_once __DIR__ . '/config/config.php';
```

### 2. Configuration (config/config.php)

```php
// Load from environment with fallback
define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_NAME', $_ENV['DB_NAME'] ?? 'wisata_alam_kaltim');
define('WEATHER_API_KEY', $_ENV['WEATHER_API_KEY'] ?? '');
```

### 3. Usage in Code

```php
// Access via constants
echo BASE_URL; // http://localhost/pkaltim-tim02-main/
echo WEATHER_API_KEY; // your_api_key

// Or directly from $_ENV
echo $_ENV['DB_HOST']; // localhost
```

---

## 🚢 Deployment Checklist

Before deploying to production:

- [ ] Copy `.env.example` to `.env` on production server
- [ ] Update `.env` with production database credentials
- [ ] Update `.env` with production BASE_URL
- [ ] Set `APP_ENV=production`
- [ ] Update all API keys with production keys
- [ ] Ensure `.env` is NOT in public_html/www root (security)
- [ ] Run `composer install --no-dev --optimize-autoloader`
- [ ] Test environment variables: `php test-env.php`
- [ ] Delete `test-env.php` from production

---

## 📚 Additional Resources

- [phpdotenv Documentation](https://github.com/vlucas/phpdotenv)
- [12-Factor App Methodology](https://12factor.net/config)
- [Environment Variable Best Practices](https://www.twilio.com/blog/environment-variables-php)

---

## 🎯 Migration Notes

### Before (Hardcoded):

```php
define('DB_HOST', 'localhost');
define('DB_PASS', 'my_password'); // ❌ Committed to Git!
```

### After (phpdotenv):

```php
define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_PASS', $_ENV['DB_PASS'] ?? ''); // ✅ Secure!
```

**Benefits:**

- 🔐 Credentials no longer in source code
- 🌍 Easy environment switching (dev/staging/prod)
- 👥 Team collaboration (each dev has own .env)
- 🚀 Production-ready security

---

**Setup Complete!** 🎉

Your project now uses industry-standard environment variable management.
