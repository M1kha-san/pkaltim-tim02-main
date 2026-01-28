<?php
/**
 * Entry Point - Front Controller
 * Sistem Informasi Wisata Alam Kaltim
 */

// Load Configuration
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';

// Simple Router
$request = $_SERVER['REQUEST_URI'];
$basePath = '/pkaltim-tim02-main';
$path = str_replace($basePath, '', parse_url($request, PHP_URL_PATH));

// Remove trailing slash
$path = rtrim($path, '/');
if ($path === '') {
    $path = '/';
}

// ==========================================
// ADMIN ROUTES
// ==========================================

// Admin Login Form
if ($path === '/admin/login' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once APP_PATH . '/controllers/AuthController.php';
    $controller = new AuthController();
    $controller->loginForm();
}
// Admin Login Process
elseif ($path === '/admin/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once APP_PATH . '/controllers/AuthController.php';
    $controller = new AuthController();
    $controller->login();
}
// Admin Logout
elseif ($path === '/admin/logout') {
    require_once APP_PATH . '/controllers/AuthController.php';
    $controller = new AuthController();
    $controller->logout();
}
// Admin Dashboard
elseif ($path === '/admin' || $path === '/admin/dashboard') {
    require_once APP_PATH . '/controllers/AdminController.php';
    $controller = new AdminController();
    $controller->dashboard();
}
// Admin Destinasi List
elseif ($path === '/admin/destinasi') {
    require_once APP_PATH . '/controllers/AdminDestinasiController.php';
    $controller = new AdminDestinasiController();
    $controller->index();
}
// Admin Destinasi Create Form
elseif ($path === '/admin/destinasi/create') {
    require_once APP_PATH . '/controllers/AdminDestinasiController.php';
    $controller = new AdminDestinasiController();
    $controller->create();
}
// Admin Destinasi Store
elseif ($path === '/admin/destinasi/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once APP_PATH . '/controllers/AdminDestinasiController.php';
    $controller = new AdminDestinasiController();
    $controller->store();
}
// Admin Destinasi Edit Form
elseif (preg_match('/^\/admin\/destinasi\/edit\/(\d+)$/', $path, $matches)) {
    require_once APP_PATH . '/controllers/AdminDestinasiController.php';
    $controller = new AdminDestinasiController();
    $controller->edit($matches[1]);
}
// Admin Destinasi Update
elseif (preg_match('/^\/admin\/destinasi\/update\/(\d+)$/', $path, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once APP_PATH . '/controllers/AdminDestinasiController.php';
    $controller = new AdminDestinasiController();
    $controller->update($matches[1]);
}
// Admin Destinasi Delete
elseif (preg_match('/^\/admin\/destinasi\/delete\/(\d+)$/', $path, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once APP_PATH . '/controllers/AdminDestinasiController.php';
    $controller = new AdminDestinasiController();
    $controller->delete($matches[1]);
}
// Admin Artikel List
elseif ($path === '/admin/artikel') {
    require_once APP_PATH . '/controllers/AdminArtikelController.php';
    $controller = new AdminArtikelController();
    $controller->index();
}
// Admin Artikel Create Form
elseif ($path === '/admin/artikel/create') {
    require_once APP_PATH . '/controllers/AdminArtikelController.php';
    $controller = new AdminArtikelController();
    $controller->create();
}
// Admin Artikel Store
elseif ($path === '/admin/artikel/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once APP_PATH . '/controllers/AdminArtikelController.php';
    $controller = new AdminArtikelController();
    $controller->store();
}
// Admin Artikel Edit Form
elseif (preg_match('/^\/admin\/artikel\/edit\/(\d+)$/', $path, $matches)) {
    require_once APP_PATH . '/controllers/AdminArtikelController.php';
    $controller = new AdminArtikelController();
    $controller->edit($matches[1]);
}
// Admin Artikel Update
elseif (preg_match('/^\/admin\/artikel\/update\/(\d+)$/', $path, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once APP_PATH . '/controllers/AdminArtikelController.php';
    $controller = new AdminArtikelController();
    $controller->update($matches[1]);
}
// Admin Artikel Delete
elseif (preg_match('/^\/admin\/artikel\/delete\/(\d+)$/', $path, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once APP_PATH . '/controllers/AdminArtikelController.php';
    $controller = new AdminArtikelController();
    $controller->delete($matches[1]);
}
// Admin Kategori List
elseif ($path === '/admin/kategori') {
    require_once APP_PATH . '/controllers/AdminKategoriController.php';
    $controller = new AdminKategoriController();
    $controller->index();
}
// Admin Users List
elseif ($path === '/admin/users') {
    require_once APP_PATH . '/controllers/AdminUsersController.php';
    $controller = new AdminUsersController();
    $controller->index();
}
// Admin Users Create Form
elseif ($path === '/admin/users/create') {
    require_once APP_PATH . '/controllers/AdminUsersController.php';
    $controller = new AdminUsersController();
    $controller->create();
}
// Admin Users Store
elseif ($path === '/admin/users/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once APP_PATH . '/controllers/AdminUsersController.php';
    $controller = new AdminUsersController();
    $controller->store();
}
// Admin Users Edit Form
elseif (preg_match('/^\/admin\/users\/edit\/(\d+)$/', $path, $matches)) {
    require_once APP_PATH . '/controllers/AdminUsersController.php';
    $controller = new AdminUsersController();
    $controller->edit($matches[1]);
}
// Admin Users Update
elseif (preg_match('/^\/admin\/users\/update\/(\d+)$/', $path, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once APP_PATH . '/controllers/AdminUsersController.php';
    $controller = new AdminUsersController();
    $controller->update($matches[1]);
}
// Admin Users Delete
elseif (preg_match('/^\/admin\/users\/delete\/(\d+)$/', $path, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once APP_PATH . '/controllers/AdminUsersController.php';
    $controller = new AdminUsersController();
    $controller->delete($matches[1]);
}

// ==========================================
// PUBLIC ROUTES
// ==========================================

// Home
elseif ($path === '/' || $path === '/home') {
    require_once APP_PATH . '/controllers/HomeController.php';
    $controller = new HomeController();
    $controller->index();
}
// Destinasi List
elseif ($path === '/destinasi') {
    require_once APP_PATH . '/controllers/DestinasiController.php';
    $controller = new DestinasiController();
    $controller->index();
}
// Destinasi Detail
elseif (preg_match('/^\/destinasi\/(\d+)$/', $path, $matches)) {
    require_once APP_PATH . '/controllers/DestinasiController.php';
    $controller = new DestinasiController();
    $controller->detail($matches[1]);
}
// Artikel
elseif ($path === '/artikel') {
    require_once APP_PATH . '/controllers/ArtikelController.php';
    $controller = new ArtikelController();
    $controller->index();
}
// 404 Not Found
else {
    http_response_code(404);
    echo "404 - Page Not Found";
}
