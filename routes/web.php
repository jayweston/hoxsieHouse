<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
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