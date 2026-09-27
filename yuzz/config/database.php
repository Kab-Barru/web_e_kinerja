<?php
defined('BASEPATH') or exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => '36.66.247.67',
	'username' => 'bkpsdm',
	'password' => '//B4rru2021##',
	'database' => 'bkpsdm_yusran',
	'dbdriver' => 'mysqli',
	'port'	   => '3306',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => FALSE,//(ENVIRONMENT !== 'production'),
	'cache_on' => TRUE,
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
//
$db['finger'] = array(
	'dsn'	=>    '',
	// 'hostname' => '192.168.222.2',
	// 'username' => 'finger',
	// 'password' => 'B4rruKab?2021',
	// 'database' => 'absensi',
	'hostname' => '36.66.247.67',
	'username' => 'bkpsdm',
	'password' => '//B4rru2021##',
	'database' => 'absensi',
	'dbdriver' => 'mysqli',
	'port'	   => '3306',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => FALSE,
	'cache_on' => TRUE,
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
