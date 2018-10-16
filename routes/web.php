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
    return view('search/index', []);
});

$router->get('api/tips', ['uses' => 'SearchController@apiTips', 'as' => 'api.tips']);
$router->get('logs', ['uses' => 'SearchController@getLogs', 'as' => 'get.logs']);