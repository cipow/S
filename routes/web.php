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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/api/owners'], function($router) {
  // PROFIL ROUTING
  $router->get('/', 'OwnerController@index');
  $router->post('/', 'OwnerController@create');
  $router->put('/', 'OwnerController@updateProfil');
  $router->post('/auth', 'OwnerController@authentication');
  $router->post('/foto', 'OwnerController@uploadFoto');
  $router->put('/geo', 'OwnerController@geolocation');

  // KAMAR OWNER ROUTING
  $router->get('/kamars', 'OwnerController@listKamar');
  $router->post('/kamars', 'OwnerController@createKamar');
  $router->put('/kamars/{id}', 'OwnerController@updateKamar');
  $router->delete('/kamars/{id}', 'OwnerController@deleteKamar');
});
