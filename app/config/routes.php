<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// Halaman Administrator
$route['default_controller'] = 'home';
$route['404_override'] = 'home/home/error';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = "menu";
$route['administrator'] = "menu";
$route['logout'] = "auth/auth/logout";
$route['account'] = "users/account";
$route['account/history'] = "users/account/history";
$route['pemesanan_konsumen'] = 'pembelian/pembelian/pemesanan_konsumen';
/*MENU FAKTUR AGEN*/ 
$route['faktur'] = 'penjualan/faktur';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $route['faktur/add'] = 'penjualan/faktur/storedfaktur';
    $route['faktur/detail'] = 'penjualan/faktur/detail';
    $route['faktur/pangkalan_verifikasi'] = 'penjualan/faktur/verifikasi';
} else {
    $route['faktur/add'] = 'penjualan/faktur/add';
}

$route['faktur/add/load-item'] = 'penjualan/faktur/loaditem';
$route['faktur/add/item-add'] = 'penjualan/faktur/additem';
$route['faktur/add/item-remove'] = 'penjualan/faktur/removeitem';


/*MENU FAKTUR PANGKALAN*/
$route['laporan/laporan-faktur'] = 'penjualan/faktur/faktur_pangkalan';

// Halaman Frontend
$route['product'] = "home/product";
$route['product/(:num)'] = "home/product/product_detail/$1";
$route['client_area'] = "home/client_area";
$route['client_area/register'] = "home/client_area/register";
$route['client_area/register_client'] = "home/client_area/register_client";
$route['client_area/aktivasi'] = "home/client_area/aktivasi";
$route['hubungi_kami'] = "home/hubungi_kami";
$route['hubungi_kami/send_message'] = "home/hubungi_kami/send_message";
$route['about'] = "home/home/about";

