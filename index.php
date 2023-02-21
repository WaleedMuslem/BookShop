<?php

session_start();

define('APP_VERSION', '1.0.0');
define('DEBUG', true);

if (DEBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(null);
}

require_once 'config.php';
require_once 'functions.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';


$db = db_connect();

$errors = [];

$pageView = BASE_PATH."/pages/{$page}.php";
if (file_exists($pageView)) {
    include $pageView;
} else {
    include BASE_PATH."/pages/404.php";
}
