<?php

use Guirod\MvcTp\Router;
use Guirod\MvcTp\Controllers\UserController;

const ROUTE_PREFIX = '/back/mvc-tp';

$router = new Router();

$router->addRoute(ROUTE_PREFIX . '/', UserController::class, 'index');
$router->addRoute(ROUTE_PREFIX . '/user', UserController::class, 'view');
$router->addRoute(ROUTE_PREFIX . '/user/add', UserController::class, 'add');
$router->addRoute(ROUTE_PREFIX . '/user/remove', UserController::class, 'remove');
$router->addRoute(ROUTE_PREFIX . '/json', UserController::class, 'viewAllAjax');
