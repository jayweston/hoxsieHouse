<?php
use Illuminate\Http\Request;
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
#Route::group(['middleware' => 'impersonate'], function () {
	Route::auth();
	Route::get('/', 'SinglePageController@dashboard');
	Route::get('/latest', 'SinglePageController@latest');
	Route::get('/unread', 'SinglePageController@unread');
	Route::get('/rss', 'SinglePageController@rss');
	Route::get('/events', 'SinglePageController@events');
	Route::get('/tos', 'SinglePageController@tos');
	Route::get('/privacy', 'SinglePageController@privacy');
	Route::get('/about', 'SinglePageController@about');
	Route::get('/calendars', 'SinglePageController@calendar');
	Route::get('/post/{id}/print', 'PostController@printfriendly');
	Route::resource('/post', 'PostController',['except' => ['show']]);
	Route::resource('/user', 'UserController');
	Route::resource('/tag', 'TagController', ['only' => ['index','show','update','destroy']]);
	Route::resource('/postimage', 'PostImageController', ['only' => ['store','update','destroy']]);
	Route::resource('/postmeta', 'PostMetaController', ['only' => ['store','update','destroy']]);
	Route::resource('/posttag', 'PostTagController', ['only' => ['update']]);
	Route::resource('/comment', 'CommentController', ['only' => ['store','destroy']]);
	Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
	Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
	Route::post('/post/copy', 'PostController@copy');
	Route::get('/post/{type}/{id}/{slug}', 'PostController@show');
#});

