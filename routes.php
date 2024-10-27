<?php

// Get Main Pages
$router->get('/', 'controllers/index.php');
$router->get('/login', 'controllers/login.php');
$router->get('/register', 'controllers/register.php');
$router->get('/home', 'controllers/home.php');
$router->get('/logout', 'controllers/logout.php');

// Get Rooms Pages
$router->get('/rooms', 'controllers/rooms/index.php');
$router->get('/rooms/is', 'controllers/rooms/index.php');
$router->get('/rooms/cs', 'controllers/rooms/index.php');
$router->get('/rooms/ce', 'controllers/rooms/index.php');

// Show details for a single room
$router->get('/room', 'controllers/rooms/show.php');

// Post Requests
$router->post('/login', 'controllers/login.php');
$router->post('/register', 'controllers/register.php');