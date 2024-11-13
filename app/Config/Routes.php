<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home/mostrar', 'Home::mostrar');
$routes->post('home/enviarCorreo', 'Home::enviarCorreo');
$routes->post('home/registrar', 'Home::registrar');
