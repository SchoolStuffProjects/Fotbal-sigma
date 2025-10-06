<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'ArticleController::index');
$routes->get('article/(:num)', 'ArticleController::show/$1');

$routes->get('article/add', 'ArticleController::add');
$routes->post('article/save', 'ArticleController::save');

$routes->get('article/edit/(:num)', 'ArticleController::edit/$1');
$routes->post('article/update/(:num)', 'ArticleController::update/$1');

$routes->post('article/delete/(:num)', 'ArticleController::delete/$1');

$routes->get('seasons', 'SeasonController::index');
$routes->get('seasons/(:num)', 'SeasonController::games/$1');
$routes->get('game/(:num)', 'SeasonController::matchDetail/$1');
$routes->get('teams', 'TeamController::index');

$routes->get('administration', 'Controller::loadAdministration');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginPost');

$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::registerPost');

$routes->get('logout', 'AuthController::logout');


