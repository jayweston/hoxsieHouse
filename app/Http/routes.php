<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();
Route::get('/', 'PostController@index');
Route::get('/home', 'PostController@index');
Route::resource('/post', 'PostController');
Route::resource('/user', 'UserController');
Route::resource('/postimage', 'PostImageController', ['only' => ['store', 'update','destroy']]);
Route::resource('/postmeta', 'PostMetaController', ['only' => ['store', 'update','destroy']]);
Route::resource('/posttag', 'PostTagController', ['only' => ['update']]);

Route::get('/test', function () {

});