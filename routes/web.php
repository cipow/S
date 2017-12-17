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
  $router->get('/kamars', 'KamarController@listKamar');
  $router->post('/kamars', 'KamarController@createKamar');
  $router->get('/kamars/{id}', 'KamarController@getKamar');
  $router->put('/kamars/{id}', 'KamarController@updateKamarInfo');
  $router->post('/kamars/cover/{id}', 'KamarController@updateKamarCover');
  $router->put('/kamars/penginap/{id}', 'KamarController@updateKamarPenginap');
  $router->delete('/kamars/{id}', 'KamarController@deleteKamar');
});

$router->group(['prefix' => '/api/kamars'], function($router) {
  $router->get('/', 'KamarController@getAll');
  $router->post('/{id}', 'KamarController@postPreview');
  $router->delete('/{id}', 'KamarController@deletePreview');
});
