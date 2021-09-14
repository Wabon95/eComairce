<?php

$router = new AltoRouter();

$router->map( 'GET', '/', 'eComairce\Controllers\HomeController#homepage');

// Auth
$router->map( 'GET', '/register', 'eComairce\Controllers\AuthController#register_view');
$router->map( 'POST', '/register', 'eComairce\Controllers\AuthController#register_treatment');

$router->map( 'GET', '/login', 'eComairce\Controllers\AuthController#login_view');
$router->map( 'POST', '/login', 'eComairce\Controllers\AuthController#login_treatment');

$router->map( 'GET', '/profile', 'eComairce\Controllers\AuthController#profile_view');
$router->map( 'POST', '/profile', 'eComairce\Controllers\AuthController#profile_treatment');

$router->map( 'GET', '/logout', 'eComairce\Controllers\AuthController#logout');

// Products
$router->map( 'GET', '/products', 'eComairce\Controllers\ProductController#view_all');
// $router->map( 'GET', '/product/[slug]', 'eComairce\Controllers\ProductController#view_one');

$router->map( 'GET', '/products/add', 'eComairce\Controllers\ProductController#add_view');
$router->map( 'POST', '/products/add', 'eComairce\Controllers\ProductController#add_treatment');