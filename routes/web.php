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



Route::group(['prefix'=>'api/v1'],function(){

	Route::get('/products','ProductController@index');

	Route::post('/products','ProductController@store');

	Route::get('/products/{id}','ProductController@show');

	Route::put('products/{id}','ProductController@update');

	Route::delete('products/{id}','ProductController@destroy');

});