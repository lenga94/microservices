<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/companies', 'CompaniesController@index');
$router->post('/companies', 'CompaniesController@store');
$router->get('/companies/{company}', 'CompaniesController@show');
$router->put('/companies/{company}', 'CompaniesController@update');
$router->patch('/companies/{company}', 'CompaniesController@update');
$router->delete('/companies/{company}', 'CompaniesController@destroy');
