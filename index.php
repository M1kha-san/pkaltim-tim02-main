<?php
/**
 * Entry Point - Front Controller
 * Sistem Informasi Wisata Alam Kaltim
 */

// Load Configuration
require_once __DIR__ . '/config/config.php';
// Database not needed for mock data version
// require_once __DIR__ . '/config/database.php';

// Simple Router
$request = $_SERVER['REQUEST_URI'];
$basePath = '/pkaltim-tim02-main';
$path = str_replace($basePath, '', parse_url($request, PHP_URL_PATH));

// Remove trailing slash
$path = rtrim($path, '/');
if ($path === '') {
    $path = '/';
}

// Routing Logic
switch ($path) {
    case '/':
    case '/home':
        require_once APP_PATH . '/controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
        
    case '/destinasi':
        require_once APP_PATH . '/controllers/DestinasiController.php';
        $controller = new DestinasiController();
        $controller->index();
        break;
        
    case (preg_match('/^\/destinasi\/(\d+)$/', $path, $matches) ? true : false):
        require_once APP_PATH . '/controllers/DestinasiController.php';
        $controller = new DestinasiController();
        $controller->detail($matches[1]);
        break;
        
    case '/artikel':
        require_once APP_PATH . '/controllers/ArtikelController.php';
        $controller = new ArtikelController();
        $controller->index();
        break;
        
    default:
        http_response_code(404);
        echo "404 - Page Not Found";
        break;
}
