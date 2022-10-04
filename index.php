<?php
// i'm using Router from de MyApp/Services folder
use MyApp\Services\Router;
// i need to autoload my classes
require "autoload.php";
// instantiate and start the routing system
$router = new Router();
$router->start();