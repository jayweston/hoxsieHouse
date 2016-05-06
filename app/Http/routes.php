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

Route::get('/', function () { return view('welcome'); });
Route::auth();
Route::get('/home', 'HomeController@index');
Route::resource('/post', 'PostController');
Route::resource('/user', 'UserController');
Route::resource('/postimage', 'PostImageController', ['only' => ['store', 'update','destroy']]);
Route::resource('/postmeta', 'PostMetaController', ['only' => ['store', 'update','destroy']]);

Route::get('/test', function () {
$old_image = App\Models\PostImage::where('post_id','3')->where('order','-1')->first();
if( !empty($old_image->id) ){
	$sql = "update `post_images` set `order`='0' where `post_id` = '".$old_image->post_id."' AND `id` != '".$old_image->id."' AND `order`='-1' ";
	dd($sql);
}
});