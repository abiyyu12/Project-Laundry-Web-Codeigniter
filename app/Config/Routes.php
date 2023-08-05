<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/admin', 'Login::logAdmin');
$routes->get('/admin/logout', 'Login::logoutAdmin');
$routes->post('/admin', 'Login::loginProsesAdmin');
$routes->get('/admin/dashboard', 'Dashboard::index');
// Kasir Routes
$routes->get('/admin/kasir','Kasir::index');
$routes->post('/admin/kasir','Kasir::create');
$routes->get('/admin/kasir/new','Kasir::new');
$routes->get('/admin/kasir/(:num)/edit','Kasir::edit/$1');
$routes->post('/admin/kasir/update','Kasir::update');
$routes->delete('/admin/kasir/(:num)/delete','Kasir::delete/$1');
// Pelanggan Routes
$routes->get('/admin/pelanggan','Pelanggan::index');
$routes->post('/admin/pelanggan','Pelanggan::create');
$routes->get('/admin/pelanggan/new','Pelanggan::new');
$routes->get('/admin/pelanggan/(:num)/edit','Pelanggan::edit/$1');
$routes->post('/admin/pelanggan/update','Pelanggan::update');
$routes->delete('/admin/pelanggan/(:num)/delete','Pelanggan::delete/$1');
// Pegawai Routes
$routes->get('/admin/pegawai','Pegawai::index');
$routes->post('/admin/pegawai','Pegawai::create');
$routes->get('/admin/pegawai/new','Pegawai::new');
$routes->get('/admin/pegawai/(:num)/edit','Pegawai::edit/$1');
$routes->post('/admin/pegawai/update','Pegawai::update');
$routes->delete('/admin/pegawai/(:num)/delete','Pegawai::delete/$1');
// Cabang Routes
$routes->get('/admin/cabang','Cabang::index');
$routes->post('/admin/cabang','Cabang::create');
$routes->get('/admin/cabang/new','Cabang::new');
$routes->get('/admin/cabang/(:num)/edit','Cabang::edit/$1');
$routes->post('/admin/cabang/update','Cabang::update');
$routes->delete('/admin/cabang/(:num)/delete','Cabang::delete/$1');

// Barang Routes
$routes->get('/admin/barang','Barang::index');
$routes->post('/admin/barang','Barang::create');
$routes->get('/admin/barang/new','Barang::new');
$routes->get('/admin/barang/(:num)/edit','Barang::edit/$1');
$routes->post('/admin/barang/update','Barang::update');
$routes->delete('/admin/barang/(:num)/delete','Barang::delete/$1');

// Routes layanan Satuan
$routes->get('/admin/layanan-satuan','LayananSatuan::index');
$routes->post('/admin/layanan-satuan','LayananSatuan::create');
$routes->get('/admin/layanan-satuan/new','LayananSatuan::new');
$routes->get('/admin/layanan-satuan/(:num)/edit','LayananSatuan::edit/$1');
$routes->post('/admin/layanan-satuan/update','LayananSatuan::update');
$routes->delete('/admin/layanan-satuan/(:num)/delete','LayananSatuan::delete/$1');

// Routes Transaksi Satuan
$routes->get('/admin/transaksi-satuan','TransaksiSatuan::index');
$routes->post('/admin/transaksi-satuan','TransaksiSatuan::create');
$routes->get('/admin/transaksi-satuan/export-excel','TransaksiSatuan::export_excel');
$routes->get('/admin/transaksi-satuan/export-pdf','TransaksiSatuan::export_pdf');
$routes->get('/admin/transaksi-satuan/new','TransaksiSatuan::new');
$routes->get('/admin/transaksi-satuan/(:num)/edit','TransaksiSatuan::edit/$1');
$routes->post('/admin/transaksi-satuan/update','TransaksiSatuan::update');
$routes->delete('/admin/transaksi-satuan/(:num)/delete','TransaksiSatuan::delete/$1');

// Routes Detail Transaksi
$routes->get('/admin/(:num)/detail-satuan','DetailSatuan::index/$1');
$routes->post('/admin/detail-satuan','DetailSatuan::create');
$routes->get('/admin/(:num)/detail-satuan/new','DetailSatuan::new/$1');
$routes->get('/admin/detail-satuan/(:num)/edit','DetailSatuan::edit/$1');
$routes->post('/admin/detail-satuan/update','DetailSatuan::update');
$routes->post('/admin/detail-satuan/export-pdf','DetailSatuan::export_pdf');
$routes->delete('/admin/detail-satuan/(:num)/delete','DetailSatuan::delete/$1');

// Routes Layanan Kiloan
$routes->get('/admin/layanan-kiloan','LayananKiloan::index');
$routes->post('/admin/layanan-kiloan','LayananKiloan::create');
$routes->get('/admin/layanan-kiloan/new','LayananKiloan::new');
$routes->get('/admin/layanan-kiloan/(:num)/edit','LayananKiloan::edit/$1');
$routes->post('/admin/layanan-kiloan/update','LayananKiloan::update');
$routes->delete('/admin/layanan-kiloan/(:num)/delete','LayananKiloan::delete/$1');

// Routes Transaksi Satuan
$routes->get('/admin/transaksi-kiloan','TransaksiKiloan::index');
$routes->post('/admin/transaksi-kiloan','TransaksiKiloan::create');
$routes->get('/admin/transaksi-kiloan/export-excel','TransaksiKiloan::export_excel');
$routes->get('/admin/transaksi-kiloan/export-pdf','TransaksiKiloan::export_pdf');
$routes->get('/admin/transaksi-kiloan/new','TransaksiKiloan::new');
$routes->get('/admin/transaksi-kiloan/(:num)/edit','TransaksiKiloan::edit/$1');
$routes->post('/admin/transaksi-kiloan/update','TransaksiKiloan::update');
$routes->delete('/admin/transaksi-kiloan/(:num)/delete','TransaksiKiloan::delete/$1');
// Detail transaksi Kiloan
// Routes Detail Transaksi
$routes->get('/admin/(:num)/detail-kiloan','DetailKiloan::index/$1');
$routes->post('/admin/detail-kiloan','DetailKiloan::create');
$routes->get('/admin/(:num)/detail-kiloan/new','DetailKiloan::new/$1');
$routes->get('/admin/detail-kiloan/(:num)/edit','DetailKiloan::edit/$1');
$routes->post('/admin/detail-kiloan/update','DetailKiloan::update');
$routes->post('/admin/detail-kiloan/export-pdf','DetailKiloan::export_pdf');
$routes->delete('/admin/detail-kiloan/(:num)/delete','DetailKiloan::delete/$1');

// Dashboard Routes
$routes->get('admin/profile','Admin::profile');
$routes->post('admin/profile','Admin::profile_update');

// User Routes
$routes->get('/', 'User::index');
$routes->get('/login','User::login');
$routes->post('/login','User::userLoginProcess');
$routes->get('/register','User::register');
$routes->post('/register','User::userRegisterProcess');
$routes->get('/logout','User::logout');
$routes->get('/laundry-satuan','User::laundrySatuan');
$routes->post('/laundry-satuan','User::laundrySatuanProses');
$routes->get('/(:num)/detail-satuan','User::detailSatuanProses/$1');
$routes->get('/laundry-kiloan','User::laundryKiloan');
$routes->post('/laundry-kiloan','User::laundryKiloanProses');
$routes->get('/(:num)/detail-kiloan','User::detailKiloanProses/$1');
$routes->get('/profile','User::getProfile');
$routes->post('/profile','User::saveProfile');
$routes->post('/export-kiloan','User::exportKiloan');
$routes->post('/export-satuan','User::exportSatuan');


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
