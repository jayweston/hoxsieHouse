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
	Route::get('dmp/{id}', function ($id) {
		$post = App\Models\hh\Post::findOrFail($id);
		$content = $post->content;
		preg_match_all('/<img[^>]+>/i',$content, $results);
		$urls = [];
		foreach ($results as $result){
			$result = str_replace('<img src="','',$result);
			foreach ($result as $string){
				$parts = explode('"',$string);
				$test = $parts['0'];
				array_push($urls,$test);
			}
		}
		foreach ($urls as $url){
			$filename = preg_replace('/^.*\/\s*/', '', $url);
			$content = str_replace($url,'/hh/images/blog/'.$post->id.'/'.$filename,$content);
		}
		echo $content;
		dd($content);
	});
	Route::get('fix/{id}', function ($id) {
		$post = App\Models\hh\Post::findOrFail($id);


		$content = $post->content;
		preg_match_all('/<img[^>]+>/i',$content, $results);
		$urls = [];
		foreach ($results as $result){
			$result = str_replace('<img src="','',$result);
			foreach ($result as $string){
				$parts = explode('"',$string);
				$test = $parts['0'];
				array_push($urls,$test);
			}
		}
		foreach ($urls as $url){
			$filename = preg_replace('/^.*\/\s*/', '', $url);
			$content = str_replace($url,'/hh/images/blog/'.$post->id.'/'.$filename,$content);
		}
		$post->content = $content;
		$post->save();
	});
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

Route::group(['domain' => 'HoxsieHouse.com'], $hhRoutes);
Route::group(['domain' => 'www.HoxsieHouse.com'], $hhRoutes);
Route::group(['domain' => '127.0.11.27'], $hhRoutes);
Route::group(['middleware' => 'impersonate','domain' => '127.0.11.1'], $hhRoutes);
Route::group(['middleware' => 'impersonate','domain' => '127.0.11.2'], $hhRoutes);
Route::group(['middleware' => 'impersonate','domain' => '127.0.11.3'], $hhRoutes);

Route::group(['domain' => 'DelightfulDrawingsStudio.com'], $ddsRoutes);
Route::group(['domain' => 'www.DelightfulDrawingsStudio.com'], $ddsRoutes);
Route::group(['domain' => '127.0.7.10'], $ddsRoutes);

Route::group(['domain' => 'checkeredtile.com'], $ctRoutes);
Route::group(['domain' => 'www.checkeredtile.com'], $ctRoutes);
Route::group(['domain' => '127.0.3.19'], $ctRoutes);

#https://stackoverflow.com/questions/31847054/how-to-use-multiple-databases-in-laravel
