<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Rutas GET
$routes->get('/', 'Home::index');
$routes->get('tabla/vista', 'Resultados::index');
$routes->get('tabla/mostrar', 'Resultados::mostrar');

//Rutas POST
$routes->post('home/enviarCorreo', 'Home::enviarCorreo');
$routes->post('home/registrar', 'Home::registrar');
