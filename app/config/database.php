<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $hostname = "localhost"; //localhost;
// $username = "pasteurt_scm"; //users;
// $password = "mediahutama123"; //password;
// $database = "pasteurt_scm"; // database;


$hostname = "localhost"; //localhost;
$username = "root"; //users;
$password = ""; //password;
$database = "scm"; // database;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => $hostname,
	'username' => $username,
	'password' => $password,
	'database' => $database,
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$active_group = 'default';
$query_builder = TRUE;
