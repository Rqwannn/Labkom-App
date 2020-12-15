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
$routes->setDefaultController('Home');
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
$routes->get('/', 'Home::index');
$routes->get('/logout', 'Login::logout');
$routes->get('/admin', 'admin\Home::index');
$routes->get('/admin/updateBarang/(:num)', 'admin\UpdateBarang::index/$1');
$routes->post('/pinjamAlat', 'Home::pinjamAlat');
$routes->post('/pinjamKomputer', 'Home::pinjamKomputer');
$routes->post('/belanja', 'Home::belanja');
$routes->post('/loginProses', 'Login::loginProses');
$routes->post('/kembali', 'History::kembali');
$routes->post('/admin/confirm', 'admin\Borrow::confirmOrder');
$routes->post('/admin/kembali', 'admin\Borrow::kembali');
$routes->post('/admin/lunas', 'admin\Buy::lunas');
$routes->post('/admin/addStuffProgress', 'admin\AddStuff::addStuffProgress');
$routes->post('/admin/editStuffProgress', 'admin\UpdateBarang::editStuffProgress');
$routes->delete('/admin/hapusBarang/(:num)', 'admin\Stuff::deleteStuff/$1');

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
