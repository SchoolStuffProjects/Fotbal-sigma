<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'ArticleController::index');

$routes->get('article/(:num)', 'ArticleController::show/$1');

$routes->get('seasons', 'SeasonController::index');
$routes->get('seasons/show/(:num)', 'SeasonController::show/$1');
$routes->get('seasons/(:num)/matches', 'SeasonController::matches/$1');
$routes->get('match/(:num)', 'SeasonController::matchDetail/$1');


$routes->get('administration', 'Controller::loadAdministration');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginPost');

$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::registerPost');

$routes->get('logout', 'AuthController::logout');
