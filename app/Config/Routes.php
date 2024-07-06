<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'LoginController::index');
$routes->post('/login/authenticate', 'LoginController::authenticate');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/dashboard', 'DashboardController::index');

$routes->get('/users', 'UserController::index', ['filter' => 'auth']);
$routes->get('/users/create', 'UserController::create', ['filter' => 'auth']);
$routes->post('/users/store', 'UserController::store', ['filter' => 'auth']);
$routes->get('/users/edit/(:num)', 'UserController::edit/$1', ['filter' => 'auth']);
$routes->post('/users/update/(:num)', 'UserController::update/$1', ['filter' => 'auth']);
$routes->get('/users/delete/(:num)', 'UserController::delete/$1', ['filter' => 'auth']);

$routes->get('/employees', 'EmployeeController::index', ['filter' => 'auth']);
$routes->get('/employees/create', 'EmployeeController::create', ['filter' => 'auth']);
$routes->post('/employees/store', 'EmployeeController::store', ['filter' => 'auth']);
$routes->get('/employees/edit/(:num)', 'EmployeeController::edit/$1', ['filter' => 'auth']);
$routes->post('/employees/update/(:num)', 'EmployeeController::update/$1', ['filter' => 'auth']);
$routes->get('/employees/delete/(:num)', 'EmployeeController::delete/$1', ['filter' => 'auth']);

$routes->get('/uploads/(:any)', 'App\Controllers\UploadController::serveFile/$1');
