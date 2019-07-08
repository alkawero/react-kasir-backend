<?php


$router->get('/product/{id}', 'ProductController@getProductById');
$router->post('/product/name', 'ProductController@getProductByName');
$router->post('/product', 'ProductController@store');
$router->patch('/product', 'ProductController@update');
