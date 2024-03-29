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
	Route::get('/post/create', 'hh\PostController@create');
	Route::resource('/post', 'hh\PostController',['except' => ['show']]);
	Route::resource('/user', 'hh\UserController');
	Route::resource('/tag', 'hh\TagController', ['only' => ['index','update','destroy']]);
	Route::resource('/postimage', 'hh\PostImageController', ['only' => ['store','update','destroy']]);
	Route::resource('/postmeta', 'hh\PostMetaController', ['only' => ['store','update','destroy']]);
	Route::resource('/comment', 'hh\CommentController', ['only' => ['store','destroy']]);
	Route::resource('/posttag', 'hh\PostTagController', ['only' => ['update']]);
	Route::get('login', 'Auth\LoginController@showLoginForm');
	Route::get('register', 'Auth\RegisterController@showRegistrationForm');
	Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
	Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
	Route::get('/post/{type}/{id}/{slug}', 'hh\PostController@show');
	Route::get('/tag/{slug}', 'hh\TagController@show');
	Route::get('/location/{slug}', 'hh\PostMetaController@show');
	Route::get('/location', 'hh\PostMetaController@index');
	Route::post('/post/copy', 'hh\PostController@copy');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('register', 'Auth\RegisterController@register');
	Route::post('logout', 'Auth\LoginController@logout');
/*
	Route::get('dmp/{id}', function ($id) {
		$post = App\Models\hh\Post::findOrFail($id);
		dd($content);
*/

};

$ddsRoutes = function() {
	Route::get('/', 'dds\SinglePageController@dashboard');
	Route::get('/about', 'dds\SinglePageController@about');
	Route::get('/blank', 'dds\SinglePageController@blank');
	Route::get('/drawings/pencil', 'dds\DrawingsController@index');
	Route::get('/drawings/purchased/{piece}', 'dds\DrawingsController@purchased');
	Route::get('/drawings/pencil/{category}', 'dds\DrawingsController@category')->where('category', implode("|",App\Models\dds\Drawing::SITE_CATEGORIES));
	Route::get('/drawings/pencil/{category}/{piece}', 'dds\DrawingsController@piece')->where('category', implode("|",App\Models\dds\Drawing::SITE_CATEGORIES));
#	Route::get('tmp', function () {		dd();	});
};

$ctRoutes = function() {
	Route::get('/', 'ct\SinglePageController@dashboard');
	Route::get('/blank', 'ct\SinglePageController@blank');
	Route::post('quote', 'ct\SinglePageController@quote');
	Route::post('contact', 'ct\SinglePageController@contact');
#	Route::get('tmp', function () {		dd();	});
};

$fdrRoutes = function() {
	Route::get('/', 'fdr\SinglePageController@dashboard');
	Route::resource('/post', 'fdr\PostController',['except' => ['show']]);
	Route::resource('/user', 'fdr\UserController');
};

Route::domain('HoxsieHouse.com')->name('hh.')->group($hhRoutes);
Route::domain('www.HoxsieHouse.com')->name('whh.')->group($hhRoutes);
Route::domain('127.0.11.27')->name('logout.')->group($hhRoutes);
Route::middleware(['impersonate'])->domain('127.0.11.1')->name('admin.')->group($hhRoutes);
Route::middleware(['impersonate'])->domain('127.0.11.2')->name('writer.')->group($hhRoutes);
Route::middleware(['impersonate'])->domain('127.0.11.3')->name('viewer.')->group($hhRoutes);

Route::group(['domain' => 'DelightfulDrawingsStudio.com'], $ddsRoutes);
Route::group(['domain' => 'www.DelightfulDrawingsStudio.com'], $ddsRoutes);
Route::group(['domain' => '127.0.7.10'], $ddsRoutes);

Route::group(['domain' => 'checkeredtile.com'], $ctRoutes);
Route::group(['domain' => 'www.checkeredtile.com'], $ctRoutes);
Route::group(['domain' => '127.0.3.19'], $ctRoutes);

Route::group(['domain' => '127.0.13.37'], $fdrRoutes);
#https://stackoverflow.com/questions/31847054/how-to-use-multiple-databases-in-laravel
