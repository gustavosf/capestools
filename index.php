<?php

define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);

require 'cfg/config.php';
require 'lib/shared.php';

require 'routes.php';

$path = trim($_SERVER['PATH_INFO'], '/');
$method = $_SERVER['REQUEST_METHOD'];

Router::route($path);

?>
