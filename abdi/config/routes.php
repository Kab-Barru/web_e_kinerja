<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'log';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
|--------------------------------------------------------------------------
| RESTful API v1 Routes (E-Kinerja Kabupaten Barru)
|--------------------------------------------------------------------------
*/

// A. Autentikasi & Akun
$route['api/v1/auth/login']                       = 'api/v1/auth/login';
$route['api/v1/profile']                          = 'api/v1/auth/profile';

// B. Kinerja Harian Pegawai
$route['api/v1/kinerja']                          = 'api/v1/kinerja/index';
$route['api/v1/kinerja/(:num)/items']             = 'api/v1/kinerja/add_item/$1';
$route['api/v1/kinerja/items/(:num)']             = 'api/v1/kinerja/item/$1';
$route['api/v1/kinerja/(:num)/submit']            = 'api/v1/kinerja/submit/$1';
$route['api/v1/kinerja/(:num)']                   = 'api/v1/kinerja/detail/$1';

// C. Approval & Evaluasi Atasan
$route['api/v1/approval/bawahan']                 = 'api/v1/approval/bawahan';
$route['api/v1/approval/pending']                 = 'api/v1/approval/pending';
$route['api/v1/approval/(:num)/review']           = 'api/v1/approval/review/$1';
$route['api/v1/approval/(:num)/decide']           = 'api/v1/approval/decide/$1';

// D. Master Data & Integrasi
$route['api/v1/master/skor-penilaian']            = 'api/v1/master/skor_penilaian';
$route['api/v1/integrasi/fingerprint/sync-daily'] = 'api/v1/master/sync_daily';
