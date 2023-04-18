<?php

require_once __DIR__ .'./../includes/app.php';

use Controllers\LoginControllers;
use MVC\Router;
use Controllers\PropiedadControllers;
use Controllers\VendedorControllers;
use Controllers\PaginaControllers;

$router = new Router;

//paginas que requieren estar autenticados

$router->get('/admin', [PropiedadControllers::class , 'index']);// con el otodo class le decimos que busque en esa clase el metodo en ''
$router->get('/propiedades/crear', [PropiedadControllers::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadControllers::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadControllers::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadControllers::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadControllers::class, 'eliminar']);

$router->get('/vendedores/crear', [VendedorControllers::class, 'crear']);
$router->post('/vendedores/crear', [VendedorControllers::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorControllers::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorControllers::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorControllers::class, 'eliminar']);

//paginas publicas

$router->get('/', [PaginaControllers::class, 'index']);
$router->get('/nosotros', [PaginaControllers::class, 'nosotros']);
$router->get('/propiedades', [PaginaControllers::class, 'propiedades']);
$router->get('/propiedad', [PaginaControllers::class, 'propiedad']);
$router->get('/blog', [PaginaControllers::class, 'blog']);
$router->get('/entrada', [PaginaControllers::class, 'entrada']);
$router->get('/contacto', [PaginaControllers::class, 'contacto']);
$router->post('/contacto', [PaginaControllers::class, 'contacto']);

// login y autenticacion

$router->get('/login', [LoginControllers::class,'login']);
$router->post('/login', [LoginControllers::class,'login']);
$router->get('/logout', [LoginControllers::class,'logout']);


$router->comprobandoRutas();


?>