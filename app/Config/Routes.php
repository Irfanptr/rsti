<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/pasien', 'Pasien::index');
$routes->get('/dokter', 'Dokter::index');
$routes->get('/poli', 'Poliklinik::index');
$routes->get('/pendaftaran', 'Pendaftaran::index');

$routes->get('/add', 'Pasien::tambahPasien');
$routes->get('/tambahdokter', 'Dokter::tambahDokter');
$routes->get('/editpasien/(:num)', 'Pasien::editPasien/$1');
$routes->get('/deletepasien/(:segment)', 'Pasien::destroy/$1');
$routes->get('/print', 'Pasien::printPdf');


$routes->get('/tambahpoli', 'Poliklinik::tambahPoli');


$routes->post('/', 'Auth::login');
$routes->post('/auth/logout', 'Auth::logout');
$routes->post('/create', 'Auth::create');
$routes->post('/tambahpasien', 'Pasien::add');
$routes->post('/tambahdokter', 'Dokter::addDokter');
$routes->post('/tambahpoli', 'Poliklinik::addPoli');
$routes->post('/edit/(:any)', 'Pasien::edit/$1');
$routes->post('/autofill', 'Pendaftaran::autofill');


