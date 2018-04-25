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
//Route::group(['middleware' => 'impersonate'], function () {
	Route::auth();
	Route::get('/', 'SinglePageController@dashboard');
	Route::get('/latest', 'SinglePageController@latest');
	Route::get('/unread', 'SinglePageController@unread');
	Route::get('/rss', 'SinglePageController@rss');
	Route::get('/tos', 'SinglePageController@tos');
	Route::get('/privacy', 'SinglePageController@privacy');
	Route::get('/about', 'SinglePageController@about');
	Route::resource('/post', 'PostController');
	Route::resource('/user', 'UserController');
	Route::resource('/tag', 'TagController', ['only' => ['index','show','update','destroy']]);
	Route::resource('/postimage', 'PostImageController', ['only' => ['store','update','destroy']]);
	Route::resource('/postmeta', 'PostMetaController', ['only' => ['store','update','destroy']]);
	Route::resource('/posttag', 'PostTagController', ['only' => ['update']]);
	Route::resource('/comment', 'CommentController', ['only' => ['store','destroy']]);
	Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
	Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
//});
Route::get('/test', function () { 
	$test='http://localhost:8000/post/1#_=_';
	dd(trim($test, "#_=_"));

});
