<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = 'menu';
$route['404_override'] = 'auth';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = "menu";
$route['logout'] = "auth/auth/logout";
$route['account'] = "users/account";
$route['account/history'] = "users/account/history";
