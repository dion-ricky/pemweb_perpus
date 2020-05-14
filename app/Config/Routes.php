<?php namespace Config;

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
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/search', 'Search::search');

$routes->get('/buku/baru', 'Buku::baru');
$routes->post('/buku/baru', 'Buku::tambahBuku');
$routes->get('/buku/ubah/(:segment)', 'Buku::edit/$1');
$routes->post('/buku/ubah/(:segment)', 'Buku::editBuku/$1');
$routes->get('/buku/pinjam/(:segment)', 'Buku::pinjam/$1');
$routes->post('/buku/pinjam/(:segment)', 'Buku::pinjamBuku/$1');
$routes->get('/buku/kembali', 'Buku::kembali/$1');
$routes->get('/buku/kembali/confirm/(:segment)', 'Buku::kembaliConfirm/$1');
$routes->post('/buku/kembali/(:segment)', 'Buku::kembaliBuku/$1');
$routes->get('/buku/(:segment)', 'Buku::detail/$1');
$routes->get('/buku/cover/(:segment)', 'Buku::coverBuku/$1');

$routes->get('/user/profile', 'User::profile');
$routes->post('/user/profile', 'User::updateGeneral');
$routes->get('/user/profile/changepass', 'User::changePass');
$routes->post('/user/profile/changepass', 'User::updatePassword');

$routes->get('/photo/profile', 'Photo::profile');

$routes->get('/auth/login', 'Auth::showLogin');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/register', 'Auth::showRegister');
$routes->post('/auth/register', 'Auth::register');
$routes->get('/auth/logout', 'Auth::logout');

// $routes->get('(:any)', 'Pages::view/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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
