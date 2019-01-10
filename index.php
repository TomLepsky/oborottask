<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

session_start();

require_once(ROOT . '/components/DB.php');
require_once(ROOT . '/components/Autoloader.php');

Autoloader::run();

$router = new Router();
$router->run();

/*
echo "<pre>";
print_r(User::getUserIdByEmail("author1@mail.ru"));
echo "</pre>";
*/

?>