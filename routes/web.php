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
	Route::resource('/tag', 'hh\TagController', ['only' => ['index','update','destroy']]);
	Route::resource('/postimage', 'hh\PostImageController', ['only' => ['store','update','destroy']]);
	Route::resource('/postmeta', 'hh\PostMetaController', ['only' => ['store','update','destroy']]);
	Route::resource('/posttag', 'hh\PostTagController', ['only' => ['update']]);
	Route::resource('/comment', 'hh\CommentController', ['only' => ['store','destroy']]);
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
	Route::get('tmp/{id}', function ($id) {
		\Tinify\setKey(env('TINIFY_APIKEY'));
		$post = App\Models\hh\Post::findOrFail($id);
		dd($post->content);
		$dir = 'hh/images/blog/'.$post->id.'/';
		$files = scandir($dir);
		unset($files[0]);
		unset($files[1]);
		foreach ($files as $file){
			$image = \Tinify\fromFile($dir.$file);
			\File::delete(public_path().$dir.$file);
			$resized = $image->resize(["method" => "scale","height" => 300]);
			$resized->toFile($dir.$file);
		}
		$compressionsThisMonth = \Tinify\compressionCount();
		dd($post->content);
	});
};
$ddsRoutes = function() {
	Route::get('/', 'dds\SinglePageController@dashboard');
	Route::get('/about', 'dds\SinglePageController@about');
	Route::get('/drawings/pencil', 'dds\DrawingsController@index');
	Route::get('/drawings/purchased/{piece}', 'dds\DrawingsController@purchased');
	Route::get('/drawings/pencil/{category}', 'dds\DrawingsController@category')->where('category', implode("|",App\Models\dds\Drawing::SITE_CATEGORIES));
	Route::get('/drawings/pencil/{category}/{piece}', 'dds\DrawingsController@piece')->where('category', implode("|",App\Models\dds\Drawing::SITE_CATEGORIES));
};

Route::group(['domain' => 'HoxsieHouse.com'], $hhRoutes);
Route::group(['domain' => 'www.HoxsieHouse.com'], $hhRoutes);
Route::group(['domain' => '127.0.11.27'], $hhRoutes);
Route::group(['middleware' => 'impersonate','domain' => '127.0.11.1'], $hhRoutes);
Route::group(['middleware' => 'impersonate','domain' => '127.0.11.2'], $hhRoutes);
Route::group(['middleware' => 'impersonate','domain' => '127.0.11.3'], $hhRoutes);
Route::group(['domain' => 'DelightfulDrawingsStudio.com'], $ddsRoutes);
Route::group(['domain' => 'www.DelightfulDrawingsStudio.com'], $ddsRoutes);
Route::group(['domain' => '127.0.7.10'], $ddsRoutes);

#https://stackoverflow.com/questions/31847054/how-to-use-multiple-databases-in-laravel
