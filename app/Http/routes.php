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
Route::get('/', 'DashboardController@index');
Route::resource('/post', 'PostController');
Route::resource('/user', 'UserController');
Route::resource('/tag', 'TagController', ['only' => ['index','show', 'update','destroy']]);
Route::resource('/postimage', 'PostImageController', ['only' => ['store', 'update','destroy']]);
Route::resource('/postmeta', 'PostMetaController', ['only' => ['store', 'update','destroy']]);
Route::resource('/posttag', 'PostTagController', ['only' => ['update']]);
Route::resource('/comment', 'CommentController', ['only' => ['store','destroy']]);

Route::get('/test', function () {
	dd("test");
});