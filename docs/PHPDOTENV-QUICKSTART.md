# 🎯 QUICK START - phpdotenv Setup

## ⚡ TL;DR (Too Long; Didn't Read)

```bash
# 1. Setup environment file
cp .env.example .env

# 2. Edit .env - Update your settings
notepad .env

# 3. Test
php test-env.php
```

**Done!** Your credentials are now secure. 🔒

---

## 📝 What Changed?

### Before:

❌ Credentials hardcoded in `config/config.php`  
❌ API keys visible in source code  
❌ Risk of committing secrets to Git

### After:

✅ Credentials in `.env` (ignored by Git)  
✅ `.env.example` as template for team  
✅ Production-ready security

---

## 🔧 Quick Configuration

Edit `.env` file:

```env
# Database (XAMPP default)
DB_HOST=localhost
DB_NAME=wisata_alam_kaltim
DB_USER=root
DB_PASS=

# Weather API (Get from: https://openweathermap.org/api)
WEATHER_API_KEY=your_api_key_here

# Base URL (Change if different)
BASE_URL=http://localhost/pkaltim-tim02-main/
```

---

## ✅ Verification

Run test script:

```bash
php test-env.php
```

Expected output:

```
✅ phpdotenv berhasil diload dan terintegrasi!
```

---

## 🚀 Next Steps

1. **Update Weather API Key**
   - Register: https://openweathermap.org/api
   - Copy key to `.env` file

2. **Test Website**
   - Visit: http://localhost/pkaltim-tim02-main/
   - Check database connection works

3. **For Production**
   - Create new `.env` on server
   - Use production database credentials
   - Set `APP_ENV=production`

---

## 📚 Full Documentation

For detailed info, see: [PHPDOTENV-SETUP.md](PHPDOTENV-SETUP.md)

---

**Security Tip:** Never commit `.env` file to Git! ⚠️
