<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
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