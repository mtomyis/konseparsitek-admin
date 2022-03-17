<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('C_login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'C_login::index');
// $routes->get('/about', 'C_home::about');
// $routes->get('/project', 'C_home::project');
// $routes->get('/detail/(:segment)', 'C_home::detail/$1');
// $routes->get('/contact', 'C_home::contact');

$routes->get('/login', 'C_login::index');
$routes->get('/logout', 'C_login::logout');

//milik dashboard
// $routes->get('/dashboard', 'C_dashboard::index', ['filter' => 'auth']);

$routes->get('/beranda_carousel', 'C_dashboard::carousel', ['filter' => 'auth']);
$routes->get('/beranda_carousel/create', 'C_dashboard::carousel_create', ['filter' => 'auth']);
$routes->get('/beranda_carousel/edit/(:segment)', 'C_dashboard::carousel_edit/$1', ['filter' => 'auth']);
$routes->delete('/beranda_carousel/delete/(:segment)', 'C_dashboard::carousel_delete/$1', ['filter' => 'auth']);

$routes->get('/beranda_bidang', 'C_dashboard::bidang', ['filter' => 'auth']);
$routes->get('/beranda_bidang/create', 'C_dashboard::bidang_create', ['filter' => 'auth']);
$routes->get('/beranda_bidang/edit/(:segment)', 'C_dashboard::bidang_edit/$1', ['filter' => 'auth']);
$routes->delete('/beranda_bidang/delete/(:segment)', 'C_dashboard::bidang_delete/$1', ['filter' => 'auth']);

$routes->get('/beranda_ringkasan', 'C_dashboard::ringkasan', ['filter' => 'auth']);
$routes->get('/beranda_ringkasan/create', 'C_dashboard::ringkasan_create', ['filter' => 'auth']);
$routes->get('/beranda_ringkasan/edit/(:segment)', 'C_dashboard::ringkasan_edit/$1', ['filter' => 'auth']);
$routes->delete('/beranda_ringkasan/delete/(:segment)', 'C_dashboard::ringkasan_delete/$1', ['filter' => 'auth']);
//milik dashboard

//milik tentang
$routes->get('/tentang_carousel', 'C_tentang::carousel', ['filter' => 'auth']);
$routes->get('/tentang_carousel/create', 'C_tentang::carousel_create', ['filter' => 'auth']);
$routes->get('/tentang_carousel/edit/(:segment)', 'C_tentang::carousel_edit/$1', ['filter' => 'auth']);
$routes->delete('/tentang_carousel/delete/(:segment)', 'C_tentang::carousel_delete/$1', ['filter' => 'auth']);

$routes->get('/tentang_keluarga', 'C_tentang::keluarga', ['filter' => 'auth']);
$routes->get('/tentang_keluarga/create', 'C_tentang::keluarga_create', ['filter' => 'auth']);
$routes->get('/tentang_keluarga/edit/(:segment)', 'C_tentang::keluarga_edit/$1', ['filter' => 'auth']);
$routes->delete('/tentang_keluarga/delete/(:segment)', 'C_tentang::keluarga_delete/$1', ['filter' => 'auth']);
//milik tentang

//milik proyek
$routes->get('/proyek_carousel', 'C_proyek::carousel', ['filter' => 'auth']);
$routes->get('/proyek_carousel/create', 'C_proyek::carousel_create', ['filter' => 'auth']);
$routes->get('/proyek_pekerjaan/create_csv', 'C_proyek::pekerjaan_create_csv', ['filter' => 'auth']);
$routes->get('/proyek_carousel/edit/(:segment)', 'C_proyek::carousel_edit/$1', ['filter' => 'auth']);
$routes->delete('/proyek_carousel/delete/(:segment)', 'C_proyek::carousel_delete/$1', ['filter' => 'auth']);

$routes->get('/proyek_pekerjaan', 'C_proyek::pekerjaan', ['filter' => 'auth']);
$routes->get('/proyek_pekerjaan/create', 'C_proyek::pekerjaan_create', ['filter' => 'auth']);
$routes->get('/proyek_pekerjaan/edit/(:segment)', 'C_proyek::pekerjaan_edit/$1', ['filter' => 'auth']);
$routes->delete('/proyek_pekerjaan/delete/(:segment)', 'C_proyek::pekerjaan_delete/$1', ['filter' => 'auth']);
//milik proyek

//milik kontak
$routes->get('/kontak_carousel', 'C_kontak::carousel', ['filter' => 'auth']);
$routes->get('/kontak_carousel/create', 'C_kontak::carousel_create', ['filter' => 'auth']);
$routes->get('/kontak_carousel/edit/(:segment)', 'C_kontak::carousel_edit/$1', ['filter' => 'auth']);
$routes->delete('/kontak_carousel/delete/(:segment)', 'C_kontak::carousel_delete/$1', ['filter' => 'auth']);

$routes->get('/kontak_datadiri', 'C_kontak::datadiri', ['filter' => 'auth']);
$routes->get('/kontak_datadiri/create', 'C_kontak::datadiri_create', ['filter' => 'auth']);
$routes->get('/kontak_datadiri/edit/(:segment)', 'C_kontak::datadiri_edit/$1', ['filter' => 'auth']);
$routes->delete('/kontak_datadiri/delete/(:segment)', 'C_kontak::datadiri_delete/$1', ['filter' => 'auth']);
//milik kontak

//milik lain
$routes->get('/lain_testimoni', 'C_lain::testimoni', ['filter' => 'auth']);
$routes->get('/lain_testimoni/create', 'C_lain::testimoni_create', ['filter' => 'auth']);
$routes->get('/lain_testimoni/edit/(:segment)', 'C_lain::testimoni_edit/$1', ['filter' => 'auth']);
$routes->delete('/lain_testimoni/delete/(:segment)', 'C_lain::testimoni_delete/$1', ['filter' => 'auth']);

// $routes->get('/kontak_datadiri', 'C_kontak::datadiri', ['filter' => 'auth']);
// $routes->get('/kontak_datadiri/create', 'C_kontak::datadiri_create', ['filter' => 'auth']);
// $routes->get('/kontak_datadiri/edit/(:segment)', 'C_kontak::datadiri_edit/$1', ['filter' => 'auth']);
// $routes->delete('/kontak_datadiri/delete/(:segment)', 'C_kontak::datadiri_delete/$1', ['filter' => 'auth']);
//milik lain

// $routes->get('/beranda_carousel/create',
// function () {
// 	return view('admin/beranda/v_create');
// },
// ['filter' => 'auth']);
/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
