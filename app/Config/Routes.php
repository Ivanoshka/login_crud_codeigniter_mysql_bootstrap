<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/inicio', 'Home::inicio');

//ruta del login
$routes->post('/login', 'Home::login');

//ruta salir
$routes->get('/salir', 'Home::salir');

//RUTAS CRUD

//ruta de obtenerNombre, va recibir un parametro
$routes->get('/obtenerNombre/(:any)', 'Home::obtenerNombre/$1');

//ruta de obtenerNombre, va recibir un parametro
$routes->get('/eliminar/(:any)', 'Home::eliminar/$1');

//ruta crear empleado
$routes->post('/crear', 'Home::crear');

//ruta actualizar
$routes->post('/actualizar', 'Home::actualizar');






