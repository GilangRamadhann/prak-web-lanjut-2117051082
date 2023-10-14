<?php
use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
<<<<<<< read-data
$routes->get('user/profile/(:any)/(:any)/(:any)/(:any)/(:any)/', 'UserController::class::profile');

#form
$routes->get('/user', 'UserController::index');
=======
// $routes->get('user/profile/(:any)/(:any)/(:any)/(:any)/(:any)/', 'UserController::class::profile');

#form
>>>>>>> dev
$routes->get('/user/profile', 'UserController::profile');
$routes->get('/user/create', 'UserController::create');
$routes->post('/user/store', 'UserController::store');

// $routes->get('/user/profile', [UserController::class, 'profile']);
// $routes->get('/user/create', [UserController::class, 'create']);
// $routes->post('/user/store', [UserController::class, 'store']);