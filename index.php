<?php

/**
* Define CONSTANT OF DIRECTORY SEPARATOR (DS)
**/
define('DS',DIRECTORY_SEPARATOR);
/**
* Define CONSTANT OF ROOT DIRECTORY (ROOT)
**/
define('ROOT',dirname(__FILE__));
/**
* Call the bootstrap.php on core folder
**/
require_once(ROOT . DS . 'core' . DS . 'bootstrap.php');