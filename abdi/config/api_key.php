<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| E-Kinerja API Key Configuration
|--------------------------------------------------------------------------
|
| Daftar API Key yang diizinkan untuk mengakses modul RESTful API v1.
| Klien wajib menyertakan salah satu kunci ini pada header HTTP 'X-API-KEY'.
|
*/

$config['api_keys'] = [
    'barru_ekinerja_api_key_2026_secret_mobile',
    'barru_ekinerja_api_key_2026_secret_integrasi',
    'barru_ekinerja_dev_key_2026',
];

/*
| Header name configuration
*/
$config['api_key_header'] = 'X-API-KEY';
$config['user_nip_header'] = 'X-USER-NIP';
