<?php

$router->get('', 'PagesController@landing');
$router->get('about', 'PagesController@about');
$router->get('design', 'PagesController@design');

$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');
