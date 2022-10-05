<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/instansi', 'Instansi::index');
$routes->post('/simpan_instansi/(:num)', 'Instansi::save/$1');
$routes->get('/tahun', 'Tahun::index');
$routes->get('/tahun_form', 'Tahun::form');
$routes->post('/tahun_simpan', 'Tahun::simpan');
$routes->get('/tahun_edit/(:num)', 'Tahun::form/$1');
$routes->get('/tahun_hapus/(:num)', 'Tahun::hapus/$1');

$routes->get('/bidang', 'Bidang::index');
$routes->post('/bidang_simpan', 'Bidang::simpan');
$routes->get('/bidang_hapus/(:num)', 'Bidang::hapus/$1');
$routes->get('/bidang_form', 'Bidang::form');
$routes->get('/bidang_edit/(:num)', 'Bidang::form/$1');
$routes->get('/bidang_hapus/(:num)', 'Bidang::hapus/$1');

$routes->get('/subbidang', 'Subbidang::index');
$routes->get('/subbidang_form', 'Subbidang::form');
$routes->post('/subbidang_simpan', 'Subbidang::simpan');
$routes->get('/subbidang_edit/(:num)', 'Subbidang::form/$1');
$routes->get('/subbidang_hapus/(:num)', 'Subbidang::hapus/$1');

$routes->get('/role', 'Role::index');
$routes->get('/role_form', 'Role::form');
$routes->get('/role_form/(:num)', 'Role::form/$1');
$routes->post('/role_simpan', 'Role::simpan');
$routes->get('/role_hapus/(:num)', 'Role::hapus/$1');

$routes->get('/pengguna', 'Pengguna::index');
$routes->get('/pengguna_form', 'Pengguna::form');
$routes->get('/pengguna_form/(:num)', 'Pengguna::form/$1');
$routes->post('/pengguna_simpan', 'Pengguna::simpan');
$routes->get('/pengguna_hapus/(:num)', 'Pengguna::hapus/$1');

$routes->get('/klasifikasi', 'Klasifikasi::index');
$routes->get('/klasifikasi_form', 'Klasifikasi::form');
$routes->get('/klasifikasi_form/(:num)', 'Klasifikasi::form/$1');
$routes->post('/klasifikasi_simpan', 'Klasifikasi::simpan');
$routes->get('/klasifikasi_hapus/(:num)', 'Klasifikasi::hapus/$1');

$routes->get('/dokumen', 'Dokumen::index');
$routes->post('/dokumen_save', 'Dokumen::save');
$routes->get('/dokumen_form/(:num)', 'Dokumen::index/$1');
$routes->get('/dokumen_view', 'Dokumen::list');
$routes->post('dokumen_update', 'Dokumen::update');
$routes->get('/showfile/(:any)', 'Dokumen::showfile/$1');

$routes->get('/login', 'Login::index');
$routes->post('/logincek', 'Login::logincek');





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
