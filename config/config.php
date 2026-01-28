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
define('BASE_URL', 'http://localhost/pkaltim-tim02-main/');
define('APP_NAME', 'Wisata Alam Kaltim');
define('APP_VERSION', '1.0.0');
define('ENVIRONMENT', 'development'); // 'development' or 'production'

// Path Configuration
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('VIEW_PATH', APP_PATH . '/views');
define('PUBLIC_PATH', ROOT_PATH . '/public');

// Timezone
date_default_timezone_set('Asia/Makassar');

// Error Reporting (Auto-configure based on environment)
if (ENVIRONMENT === 'production') {
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', ROOT_PATH . '/logs/error.log');
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// Session Configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
