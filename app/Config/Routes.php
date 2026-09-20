<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('operations', 'Operations::index');
$routes->get('operations/displayinfo/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)', 'Operations::displayinfo/$1/$2/$3/$4/$5');
$routes->get('operations/compute/(:num)/(:num)', 'Operations::compute/$1/$2');
$routes->get('operations/compute', 'Operations::compute');

// POS System Routes
$routes->get('customer-accounts', 'CustomerAccounts::index');
$routes->get('user-accounts', 'UserAccounts::index');
