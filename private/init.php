<?php


// Assign the root URL to a PHP constant
$private_end = strpos($_SERVER['SCRIPT_NAME'], '/private') + 6;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $private_end);
define("WWW_ROOT", 'erhscoding.org/');
echo WWW_ROOT;
require_once('util.php');
require_once('route.php');
require_once('database.php');
require_once('validate.php');
require_once('query.php');

echo url_for('index.php');


