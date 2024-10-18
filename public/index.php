<?php

// to get out of public folder to the project base path
const BASE_PATH = __DIR__ . '/../';

// importing helper functions
require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {

  // Ex: $class = Core\Database, it will become Core/Database
  $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

  // require the classes
  require base_path("{$class}.php");
});



// create router object
$router = new \Core\Router();

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

var_dump("uri: $uri");
var_dump("method: $method");
var_dump($_POST);

$router->route($uri, $method);