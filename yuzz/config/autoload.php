<?php
defined('BASEPATH') or exit('No direct script access allowed');


$autoload['packages'] = array();



$autoload['libraries'] = array('session', 'database', 'form_validation', 'pagination', 'table', 'user_agent');


$autoload['helper'] = array('url', 'form', 'array', 'string', 'html');


$autoload['drivers'] = array();


$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array();
