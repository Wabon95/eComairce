<?php

$router = new AltoRouter();
$router->addMatchTypes(['product-slug' => '[a-z0-9-]+']);
$router->addMatchTypes(['product-id' => '[0-9]+']);

$router->map( 'GET', '/', 'eComairce\Controllers\HomeController#homepage');
$router->map( 'GET', '/test', 'eComairce\Controllers\HomeController#test');

// Auth
$router->map( 'GET', '/register', 'eComairce\Controllers\AuthController#register_view');
$router->map( 'POST', '/register', 'eComairce\Controllers\AuthController#register_treatment');

$router->map( 'GET', '/login', 'eComairce\Controllers\AuthController#login_view');
$router->map( 'POST', '/login', 'eComairce\Controllers\AuthController#login_treatment');

$router->map( 'GET', '/profile', 'eComairce\Controllers\AuthController#profile_view');
$router->map( 'POST', '/profile', 'eComairce\Controllers\AuthController#profile_treatment');

$router->map( 'GET', '/logout', 'eComairce\Controllers\AuthController#logout');

// Products
$router->map( 'GET', '/products/add', 'eComairce\Controllers\ProductController#add_view');
$router->map( 'POST', '/products/add', 'eComairce\Controllers\ProductController#add_treatment');

$router->map( 'GET', '/products/[product-slug:slug]', 'eComairce\Controllers\ProductController#view_one');
$router->map( 'GET', '/products', 'eComairce\Controllers\ProductController#view_all');



// Cart
$router->map( 'GET', '/cart/add/[product-id:productId]', 'eComairce\Controllers\CartController#add');
$router->map( 'GET', '/cart', 'eComairce\Controllers\CartController#view');
