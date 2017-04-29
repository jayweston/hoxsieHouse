<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;


class SinglePageController extends Controller
{
	public function dashboard()
	{
		return view('pages.single.dashboard');
	}
	public function latest()
	{
		return view('pages.single.latest');
	}
	public function unread()
	{
		return view('pages.single.unread');
	}
	public function rss()
	{
		$posts = Post::where('draft', false)->where('avialable_at','<' ,\Carbon\Carbon::now())->get();
		
		$view_data['posts'] = $posts;
		return view('pages.single.rss', $view_data);
	}
	public function tos()
	{
		return view('pages.single.tos');
	}
	public function privacy()
	{
		return view('pages.single.privacy');
	}

}
