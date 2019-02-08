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
Route::group(['domain' => '127.0.7.10'], function() {
#	$users = DB::connection('foo')->select(...);
	Route::get('/', 'dds\SinglePageController@dashboard');
	Route::get('/drawings/pencil', 'dds\DrawingsController@index');
	Route::get('/drawings/pencil/{category}', 'dds\DrawingsController@category');
	Route::get('/drawings/pencil/{category}/{piece}', 'dds\DrawingsController@piece');
});
Route::group(['middleware' => 'impersonate','domain' => '127.0.11.27'], function () {
	Route::auth();
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
	Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
	Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
	Route::post('/post/copy', 'hh\PostController@copy');
	Route::get('/post/{type}/{id}/{slug}', 'hh\PostController@show');
	Route::get('/tmp', function () {
		$posts = App\Models\hh\Post::all();
		foreach ($posts as $post){
			$post->delete();
		}
		
	});
});
Route::auth();
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
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('/post/copy', 'hh\PostController@copy');
Route::get('/post/{type}/{id}/{slug}', 'hh\PostController@show');


