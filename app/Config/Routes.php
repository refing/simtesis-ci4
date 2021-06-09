<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'controller::index');
$routes->get('/dashboard', 'controller::dashboard');
$routes->get('/pendaftaran', 'controller::pendaftaran');
$routes->get('/pendaftaran/sempro', 'controller::daftarsempro');
$routes->get('/pendaftaran/sidang', 'controller::daftarsidang');
$routes->get('/pendaftaran/yudisium', 'controller::daftaryudisium');
$routes->get('/datadiri', 'controller::datadiri');
$routes->get('/jadwal', 'controller::jadwal');
$routes->get('/jadwal/sempro', 'controller::jadwalsempro');
$routes->get('/jadwal/sidang', 'controller::jadwalsidang');
$routes->get('/berkas', 'controller::berkas');
$routes->get('/berkas/sempro', 'controller::berkassempro');
$routes->get('/berkas/sidang', 'controller::berkassidang');
$routes->get('/nilai', 'controller::nilai');
$routes->get('/nilai/sempro', 'controller::nilaisempro');
$routes->get('/nilai/sidang', 'controller::nilaisidang');
$routes->get('/nilai/yudisium', 'controller::nilaiyudisium');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
