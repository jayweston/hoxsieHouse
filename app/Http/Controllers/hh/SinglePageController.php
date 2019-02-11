<?php

namespace App\Http\Controllers\hh;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\hh\Post;
use App\Models\hh\User;
use App\Models\hh\PostImage;
use App\Http\Controllers\Controller;

class SinglePageController extends Controller
{
	public function dashboard()
	{
		//URL param of wanted post type.
		$type = strtolower( \Request::input('type') );
		// Non logged in users and viewers do not see deaft and unpublished posts
		if (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER)
			// If the URL param is a valid post type (foodie, review, travel...) add it to sql query.
			if (Post::isValidPostType($type)){
				$posts = Post::where('type', $type)->where('draft', false)->where('avialable_at','<' ,\Carbon\Carbon::now())->orderBy('avialable_at', 'desc')->paginate(12);
			}
			// if not valif post type then send all posts.
			else{
				$type="all";
				$posts = Post::where('avialable_at','<' ,\Carbon\Carbon::now())->where('draft', false)->orderBy('avialable_at', 'desc')->paginate(12);
			}
		else{
			// Same logic from above but with admins/writers.  Also they can see draft and future posts.
			if (Post::isValidPostType($type)){
				$posts = Post::where('type', $type)->orderBy('avialable_at', 'desc')->paginate(12);
			}
			else{
				$type="all";
				$posts = Post::where('id', '>', 0)->orderBy('avialable_at', 'desc')->paginate(12);
			}
		}
		$view_data['posts'] = $posts;
		$view_data['post_type'] = $type;
		return view('hh.pages.single.dashboard', $view_data);
	}
	public function latest()
	{
		return view('hh.pages.single.latest');
	}
	public function unread()
	{
		if (\Auth::guest())
			$posts = Post::where('draft', false)->where('avialable_at','<' ,\Carbon\Carbon::now())->orderBy('avialable_at', 'desc')->paginate(12);
		elseif (\Auth::user()->type == User::TYPE_VIEWER)
			$posts = Post::whereNotIn('id',function($query) {$query->select('post_id')->from('user_posts')->where('user_id','=',\Auth::user()->id);})->where('draft', false)->where('avialable_at','<' ,\Carbon\Carbon::now())->orderBy('avialable_at', 'desc')->paginate(12);
		else
			$posts = Post::whereNotIn('id',function($query) {$query->select('post_id')->from('user_posts')->where('user_id','=',\Auth::user()->id);})->orderBy('avialable_at', 'desc')->paginate(12);
		$view_data['posts'] = $posts;
		return view('hh.pages.single.unread', $view_data);
	}
	public function rss()
	{
		$posts = Post::where('draft', false)->where('avialable_at','<' ,\Carbon\Carbon::now())->get();
		
		$view_data['posts'] = $posts;
		return view('hh.pages.single.rss', $view_data);
	}
	public function events(Request $request)
	{
		$posts = Post::where('draft', false)->where('avialable_at','>' ,$request->input('start'))->where('avialable_at','<' ,$request->input('end'))->where('avialable_at','<' ,\Carbon\Carbon::now())->get();
		$view_data['posts'] = $posts;
		return view('hh.pages.single.events', $view_data);
	}
	public function tos()
	{
		return view('hh.pages.single.tos');
	}
	public function privacy()
	{
		return view('hh.pages.single.privacy');
	}
	public function about()
	{
		return view('hh.pages.single.about');
	}
	public function calendar()
	{
		return view('hh.pages.single.calendar');
	}
}
