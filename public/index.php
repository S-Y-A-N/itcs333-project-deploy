<?php

// to get out of public folder to the project base path
const BASE_PATH = __DIR__.'/../';

// importing helper functions
require BASE_PATH . 'Core/functions.php';

// to load the  without requiring in all files
spl_autoload_register(function ($class) {

  // Ex: $class = Core\Database, it will become Core/Database
  $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
  
  require base_path("{$class}.php");

});

// create router object
$router = new \Core\Router();

// get the routes from the file
$routes = require base_path('routes.php');

// hm
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

dd($_SERVER['REQUEST_URI']);