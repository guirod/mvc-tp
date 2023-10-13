<?php

require 'vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
var_dump($uri);


require 'src/routes.php';

$router->dispatch($uri);
