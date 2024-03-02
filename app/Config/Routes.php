<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  Dummy Menus Routes
$routes->setAutoRoute(true);
$routes->get('/', 'Dashboard::index');
$routes->get('/setting', 'Setting::index');
$routes->get('/profile', 'Profile::index');

// For Job CRUD Routes
$routes->get('/job', 'Job::index');
$routes->post('job/store', 'Job::store');
$routes->get('job/edit/(:num)', 'Job::edit/$1');
$routes->get('job/delete/(:num)', 'Job::delete/$1');
$routes->post('job/update', 'Job::update');
$routes->get('job/report', 'Job::report');

service('auth')->routes($routes);
