<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

// -------------------------
// Rutas para el registro (Signup)
// -------------------------
$routes->get('signup', 'Signup::new');
$routes->post('signup/create', 'Signup::create');

// -------------------------
// Rutas para el inicio de sesión (Login / Logout)
// -------------------------
$routes->get('login', 'Login::new');
$routes->post('login/attempt', 'Login::attempt');
$routes->get('logout', 'Login::logout');

// -------------------------
// Rutas para las tareas
// -------------------------
$routes->get('tasks', 'Tasks::index');
$routes->get('tasks/show/(:num)', 'Tasks::show/$1');
$routes->get('tasks/new', 'Tasks::new');
$routes->post('tasks/create', 'Tasks::create');
$routes->get('tasks/edit/(:num)', 'Tasks::edit/$1');
$routes->post('tasks/update/(:num)', 'Tasks::update/$1');
$routes->get('tasks/delete/(:num)', 'Tasks::deleteConfirm/$1');
$routes->post('tasks/destroy/(:num)', 'Tasks::destroy/$1');

// Ruta principal
$routes->get('/', 'Tasks::index');