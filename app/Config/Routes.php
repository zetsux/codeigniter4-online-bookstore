<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'BooksController::index', ['as' => 'home.index']);
$routes->get('/register', 'Home::register', ['as' => 'home.register']);
$routes->get('/login', 'Home::login', ['as' => 'home.login']);

$routes->group('user', function ($routes) {
  $routes->get('', 'UsersController::index');
  $routes->get('me/(:segment)', 'UsersController::me/$1');
  $routes->post('login', 'UsersController::login', ['as' => 'user.login']);
  $routes->post('register', 'UsersController::create', ['as' => 'user.create']);
  $routes->put('update/(:segment)', 'UsersController::update/$1');
  $routes->delete('delete/(:segment)', 'UsersController::delete/$1');
});

$routes->group('book', function ($routes) {
  $routes->get('', 'BooksController::index');
  $routes->get('(:segment)', 'BooksController::show/$1');
  $routes->post('create', 'BooksController::create');
  $routes->put('update/(:segment)', 'BooksController::update/$1');
  $routes->delete('delete/(:segment)', 'BooksController::delete/$1');
});
