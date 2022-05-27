<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/petugas', 'PetugasController::index');
$routes->post('/petugas/login', 'PetugasController::login');
$routes->get('/logout', 'PetugasController::logout');
$routes->get('/petugas/dashboard', 'Dashboardpetugas::index', ['filter' => 'otentifikasi']);

// route CRUD Kamar
$routes->get('/kamar', 'PetugasController::tampilKamar');
$routes->get('/kamar/tambah', 'PetugasController::tambahKamar');
$routes->post('/kamar/simpan', 'PetugasController::simpanKamar');
$routes->get('/kamar/edit/(:num)', 'PetugasController::editKamar/$1');
$routes->get('/kamar/foto/(:num)', 'PetugasController::editFoto/$1');
$routes->post('/kamar/update', 'PetugasController::updateKamar');
$routes->post('/kamar/updatefoto', 'PetugasController::updateFoto');
$routes->get('/kamar/hapus/(:num)', 'PetugasController::hapusKamar/$1');

// route fasilitas kamar tamu
$routes->get('fasilitas-kamar', 'FasilitasKamarController::tampilFasilitasTamu');

//route CRUD fasilitas kamar
$routes->get('/fasilitas-kamar/tampil', 'FasilitasKamarController::tampilfasilitaskamar');
$routes->get('/fasilitas-kamar/tambah', 'FasilitasKamarController::tambahfasilitaskamar');
$routes->post('/fasilitas-kamar/simpan', 'FasilitasKamarController::simpanfasilitaskamar');
$routes->get('/fasilitas-kamar/edit/(:num)', 'FasilitasKamarController::editfasilitaskamar/$1');
$routes->post('/fasilitas-kamar/update', 'FasilitasKamarController::updatefasilitaskamar');
$routes->get('/fasilitas-kamar/hapus/(:num)', 'FasilitasKamarController::hapusfasilitaskamar/$1');

//route CRUD fasilitas hotel
$routes->get('/fasilitas-hotel/tampil', 'FasilitasHotelController::tampilfasilitashotel');
$routes->get('/fasilitas-hotel/tambah', 'FasilitasHotelController::tambahfasilitashotel');
$routes->post('/fasilitas-hotel/simpan', 'FasilitasHotelController::simpanfasilitashotel');
$routes->get('/fasilitas-hotel/edit/(:num)', 'FasilitasHotelController::editfasilitashotel/$1');
$routes->get('/fasilitas-hotel/foto/(:num)', 'FasilitasHotelController::editFoto/$1');
$routes->post('/fasilitas-hotel/update', 'FasilitasHotelController::updatefasilitashotel');
$routes->post('/fasilitas-hotel/update-foto', 'FasilitasHotelController::updateFoto');
$routes->get('/fasilitas-hotel/hapus/(:num)', 'FasilitasHotelController::hapusfasilitashotel/$1');

//route CRUD reservasi
$routes->get('/reservasi/data', 'ReservasiController::data');
$routes->get('/reservasi/form', 'ReservasiController::form');
$routes->post('/reservasi/data', 'ReservasiController::filterData');
$routes->post('/reservasi/simpan', 'ReservasiController::simpan');
$routes->get('/reservasi/cekin/(:num)', 'ReservasiController::cekIn/$1');
$routes->get('/reservasi/cekout/(:num)', 'ReservasiController::cekOut/$1');
$routes->get('/reservasi/selesai/(:num)', 'ReservasiController::selesai/$1');
// $routes->get('/reservasi/terima/(:num)', 'ReservasiController::terima/$1');
// $routes->get('/reservasi/tolak/(:num)', 'ReservasiController::tolak/$1');
// $routes->get('/reservasi/hapus/(:num)', 'ReservasiController::hapusdatareservasi/$1');

//route pesan kamar
$routes->get('reservasi', 'ReservasiController::form');
$routes->post('reservasi/submit', 'ReservasiController::simpan');

//route tampil data pesanan
$routes->get('reservasi/pemesanan/(:num)', 'ReservasiController::afterInsert/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
