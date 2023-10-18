<?php
use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\UserController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
upload-file
// $routes->get('user/profile/(:any)/(:any)/(:any)/(:any)/(:any)/', 'UserController::class::profile');

#form
$routes->get('/user', 'UserController::index');
// $routes->get('/user/profile', 'UserController::profile');

$routes->get('/user/profile', 'UserController::profile');

$routes->get('/user/create', 'UserController::create');
$routes->post('/user/store', 'UserController::store');
$routes->get('/user/create', 'UserController::create');

$routes->get('/user/(:any)/edit', 'UserController::edit/$1');
$routes->put('/user/(:any)', 'UserController::update/$1');
$routes->delete('/user/(:any)', 'UserController::destroy/$1');

$routes->get('/user/profile/(:any)', 'UserController::show/$1');

// $routes->get('/user/profile', [UserController::class, 'profile']);
// $routes->get('/user/create', [UserController::class, 'create']);
// $routes->post('/user/store', [UserController::class, 'store']);