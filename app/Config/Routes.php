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
$routes->setDefaultController('Hotel');
$routes->setDefaultMethod('lamanDepan');
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

//user
$routes->get('/laman_depan', 'Hotel::lamanDepan');
$routes->get('/', 'Hotel::lamanDepan');
$routes->get('/room/(:any)', 'Hotel::lamanKamar/$1');
$routes->get('/kamar/tipe', 'Hotel::tipeKamar');
$routes->get('/kamar/tipe/vip', 'Hotel::vipKamar');
$routes->get('/kamar/tipe/biasa', 'Hotel::biasaKamar');
$routes->get('/kontak', 'Hotel::kontak');
$routes->get('/services', 'Hotel::services');
$routes->post('/bayar', 'Hotel::bayar');
$routes->post('/contact/kirim', 'Hotel::kontakKirim');


$routes->group('', ['filter' => 'auth'], function($routes){
    //user
    $routes->get('/profile', 'Hotel::profile');
    $routes->get('/profile/edit/(:any)', 'Hotel::profileEdit/$1');
    $routes->put('/profile/update', 'Hotel::profileUpdate');
    $routes->get('/profile/pesanan/(:any)', 'Hotel::profilePesanan/$1');
    $routes->get('/pesanan/print/(:any)', 'Hotel::printPesananSaya/$1');

    //staff
    $routes->get('/dashboard', 'Dashboard::index');
    $routes->get('/user/view','Dashboard::tampilUser');
    $routes->get('/profile/staff','Dashboard::profile');
    $routes->get('/profile/staff/edit/(:any)','Dashboard::editProfileStaff/$1');
    $routes->get('/user/detail/(:any)','Dashboard::detailUser/$1');
    $routes->put('/profile/staff/update', 'Dashboard::profileUpdate');


    //admin
        //kamar
        $routes->get('/createRoom', 'Admin::buatKamar');
        $routes->get('/dataHotel', 'Admin::tampilHotel');
        $routes->post('/saveBuat', 'Admin::buatHotel');
        $routes->get('/kamar/(:any)/delete', 'Admin::delete/$1');
        $routes->get('/kamar/(:any)/edit', 'Admin::edit/$1');
        $routes->get('/kamar/(:any)/detail', 'Admin::detailKamar/$1');
        $routes->put('/editKamar/(:any)', 'Admin::update/$1');
        
        //fasilitas
        $routes->get('/fasilitas/kamar' , 'Admin::viewFasilitas');
        $routes->get('/fasilitas/tambah' , 'Admin::addFasilitas');
        $routes->post('/fasilitas/insert' , 'Admin::insertFasilitas');
        $routes->get('/fasilitas/(:any)/edit' , 'Admin::editFasilitas/$1');
        $routes->put('/fasilitas/update' , 'Admin::updateFasilitas');
        $routes->get('/fasilitas/(:any)/delete' , 'Admin::deleteFasilitas/$1');

        //services
        $routes->get('/list/services' , 'Admin::listServices');
        $routes->get('/services/tambah' , 'Admin::tambahServices');
        $routes->get('/services/hapus/(:any)' , 'Admin::hapusServices/$1');
        $routes->get('/services/edit/(:any)' , 'Admin::editServices/$1');
        $routes->post('/insert/services' , 'Admin::insertServices');
        $routes->put('/update/services/(:any)' , 'Admin::updateServices/$1');

        //user
        $routes->get('/user/(:any)/edit', 'Admin::userEdit/$1');
        $routes->put('/user/update', 'Admin::userUpdate');
        

    //resepsionis
    $routes->get('/konfirmasiRoom', 'Resepsionis::konfirKamar');
    $routes->get('/konfirmasi/(:any)/edit', 'Resepsionis::edit/$1');
    $routes->put('/editPesanan/(:any)', 'Resepsionis::update/$1');
    $routes->get('/print/(:any)', 'Resepsionis::printPesan/$1');
    $routes->get('/rekap/print/semua', 'Resepsionis::printSemua');
    $routes->get('/pesan/pengunjung', 'Resepsionis::tampilPesan');
    $routes->get('/pesan/hapus/(:any)', 'Resepsionis::hapusPesan/$1');
});

//auth
$routes->get('/register', 'Auth::index');
$routes->get('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->post('/cek_login','Auth::cek_login');
$routes->post('/daftar','Auth::register');


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
