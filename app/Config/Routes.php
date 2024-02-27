<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->post('login-pengguna', 'Home::prosesLogin');
$routes->get('logout', 'Home::logout');

//admin
$routes->get('/halaman-admin', 'Admin::halamanAdmin', ['filter' => 'otentifikasi']);
$routes->get('/halaman-kasir', 'Admin::halamanAdmin', ['filter' => 'otentifikasi']);


//satuan
$routes->get('/satuan-produk', 'SatuanProduk::satuan');
$routes->get('/tambah-satuan', 'SatuanProduk::tambahSatuan');
$routes->post('/simpan-satuan', 'SatuanProduk::simpanSatuan');
$routes->get('/edit-satuan/(:num)', 'satuanProduk::editSatuan/$1');
$routes->post('/perbarui-satuan', 'SatuanProduk::simpanEditSatuan');
$routes->get('/hapus-satuan/(:num)', 'SatuanProduk::hapusSatuan/$1');

//kategori
$routes->get('/satuan-kategori', 'KategoriProduk::kategori');
$routes->get('/tambah-kategori', 'KategoriProduk::tambahKategori');
$routes->post('/simpan-kategori', 'KategoriProduk::simpanKategori');
$routes->get('/edit-kategori/(:num)', 'KategoriProduk::editKategori/$1');
$routes->post('/perbarui-kategori', 'KategoriProduk::simpanEditKategori');
$routes->get('/hapus-kategori/(:num)', 'KategoriProduk::hapusKategori/$1');


//produk
$routes->get('/data-produk', 'Produk::tampilproduk');
$routes->get('/tambah-produk', 'Produk::tambahProduk');
$routes->post('/simpan-produk', 'Produk::simpanProduk');
$routes->get('/edit-produk/(:num)', 'Produk::editProduk/$1');

$routes->post('/perbarui-produk', 'Produk::simpaneditProduk');
$routes->get('/hapus-produk/(:num)', 'Produk::hapusProduk/$1');

//penggguna
$routes->get('/data-pengguna', 'Pengguna::pengguna');
$routes->get('/tambah-pengguna', 'Pengguna::tambahPengguna');
$routes->post('/simpan-pengguna', 'Pengguna::simpanpengguna');
$routes->get('/edit-pengguna/(:any)', 'Pengguna::editpengguna/$1');
$routes->post('/perbarui-pengguna/(:any)', 'Pengguna::simpanEditpengguna/$1');
$routes->get('/hapus-pengguna/(:any)', 'Pengguna::hapuspengguna/$1');

//transaksi
$routes->get('/transaksi-jual', 'TransaksiPenjualan::transaksi');
$routes->post('/simpan-transaksi', 'TransaksiPenjualan::transaksiSimpan');
$routes->get('/pembayaran', 'TransaksiPenjualan::transaksiSimpan');

//laporan
$routes->get('/laporan','laporan::datalaporan');
$routes->get('/pdf', 'PdfController::index');
$routes->get('/pdf/generate', 'PdfController::generate');

