<?php
/**
 * Configuration File
 * Sistem Informasi Wisata Alam Kaltim
 */

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'wisata_alam_kaltim');

// Application Configuration
define('BASE_URL', 'http://localhost/toyourkaltim/');
define('APP_NAME', 'Wisata Alam Kaltim');
define('APP_VERSION', '1.0.0');

// Path Configuration
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('VIEW_PATH', APP_PATH . '/views');
define('PUBLIC_PATH', ROOT_PATH . '/public');

// Timezone
date_default_timezone_set('Asia/Makassar');

// Error Reporting (Set to 0 in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Session Configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
