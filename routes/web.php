<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/{id}', ['uses' => 'AdsController@showAds']);

$router->get('/api/test', ['uses' => 'AdsController@testAds']);


$router->group(['prefix' => '/api'], function () use ($router) {
    $router->get('/ads/{id}',  ['uses' => 'AdsController@showAds']);
    $router->get('/ads',  ['uses' => 'AdsController@testAds']);
});
