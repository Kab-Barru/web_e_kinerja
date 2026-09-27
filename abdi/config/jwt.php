<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| JWT Configuration
|--------------------------------------------------------------------------
|
| Configuration settings for JSON Web Token generation and validation.
|
*/

$config['jwt_secret_key'] = 'eKinerja_B4rruKab_JWT_Secr3t_K3y_2026!#*';
$config['jwt_algorithm']  = 'HS256';
$config['jwt_issuer']     = 'https://e-kinerja.barrukab.go.id';
$config['jwt_audience']   = 'e-kinerja-client';
$config['jwt_ttl']        = 86400 * 7; // 7 hari masa aktif token
