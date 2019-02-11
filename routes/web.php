<?php
use Illuminate\Http\Request;

$hhRoutes = function() {
	Route::get('/', 'hh\SinglePageController@dashboard');
	Route::get('/latest', 'hh\SinglePageController@latest');
	Route::get('/unread', 'hh\SinglePageController@unread');
	Route::get('/rss', 'hh\SinglePageController@rss');
	Route::get('/events', 'hh\SinglePageController@events');
	Route::get('/tos', 'hh\SinglePageController@tos');
	Route::get('/privacy', 'hh\SinglePageController@privacy');
	Route::get('/about', 'hh\SinglePageController@about');
	Route::get('/calendars', 'hh\SinglePageController@calendar');
	Route::get('/post/{id}/print', 'hh\PostController@printfriendly');
	Route::resource('/post', 'hh\PostController',['except' => ['show']]);
	Route::resource('/user', 'hh\UserController');
	Route::resource('/tag', 'hh\TagController', ['only' => ['index','show','update','destroy']]);
	Route::resource('/postimage', 'hh\PostImageController', ['only' => ['store','update','destroy']]);
	Route::resource('/postmeta', 'hh\PostMetaController', ['only' => ['store','update','destroy']]);
	Route::resource('/posttag', 'hh\PostTagController', ['only' => ['update']]);
	Route::resource('/comment', 'hh\CommentController', ['only' => ['store','destroy']]);
	Route::get('login', 'Auth\LoginController@showLoginForm');
	Route::get('register', 'Auth\RegisterController@showRegistrationForm');
	Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
	Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
	Route::get('/post/{type}/{id}/{slug}', 'hh\PostController@show');
	Route::post('/post/copy', 'hh\PostController@copy');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('register', 'Auth\LoginController@logout');
	Route::post('logout', 'Auth\RegisterController@register');
};
Route::group(['domain' => 'HoxsieHouse.com'], $hhRoutes);
Route::group(['domain' => '127.0.11.27'], $hhRoutes);
Route::group(['middleware' => 'impersonate','domain' => '127.0.11.1'], $hhRoutes);
Route::group(['middleware' => 'impersonate','domain' => '127.0.11.2'], $hhRoutes);
Route::group(['middleware' => 'impersonate','domain' => '127.0.11.3'], $hhRoutes);
Route::group(['domain' => '127.0.7.10'], function() {
#	$users = DB::connection('foo')->select(...);
	Route::get('/', 'dds\SinglePageController@dashboard');
	Route::get('/about', 'dds\SinglePageController@about');
	Route::get('/drawings/pencil', 'dds\DrawingsController@index');
	Route::get('/drawings/pencil/{category}', 'dds\DrawingsController@category');
	Route::get('/drawings/pencil/{category}/{piece}', 'dds\DrawingsController@piece');
});
