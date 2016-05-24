<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;
use App\Models\User;
use App\Models\PostImage;

class PostController extends Controller
{
	/*
	 * Send a paginated array of given posts.
	*/
	public function index()
	{
		//URL param of wanted post type.
		$type = strtolower( \Request::input('type') );
		// Non logged in users and viewers do not see deaft and unpublished posts
		if (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER)
			// If the URL param is a valid post type (foodie, review, travel...) add it to sql query.
			if (Post::isValidPostType($type)){
				$posts = Post::where('type', $type)->where('draft', false)->where('avialable_at','<' ,\Carbon\Carbon::now())->paginate(10);
			}
			// if not valif post type then send all posts.
			else{
				$type="all";
				$posts = Post::where('avialable_at','<' ,\Carbon\Carbon::now())->where('draft', false)->paginate(10);
			}
		else{
			// Same logic from above but with admins/writers.  Also they can see draft and future posts.
			if (Post::isValidPostType($type)){
				$posts = Post::where('type', $type)->paginate(10);
			}
			else{
				$type="all";
				$posts = Post::paginate(10);
			}
		}
		$view_data['posts'] = $posts;
		$view_data['post_type'] = $type;
		return view('pages.post.index', $view_data);
	}
	/*
	 * Allow admins and writers to view create post page.
	*/
	public function create()
	{
		$post = new Post();
		$this->authorize($post);
		return view('pages.post.create');
	}
	/*
	 * Allow admins and writers to create post.
	*/
	public function store(Request $request)
	{
		$post = new Post();
		$this->authorize($post);
		$request->request->add(['user_id' => \Auth::user()->id]);
		$post = Post::create($request->all());
		return redirect('post/'.$post->id);
	}
	/*
	 * Allow anyone to view posts that are not in draft mode or not published yet.
	*/
	public function show($id)
	{
		$post = Post::findOrFail($id);
		//Only allow admins and writers to see posts that are scheduled for future dates.
		if( ($post->avialable_at > \Carbon\Carbon::now()) && (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER) ){
			abort("404");
		}
		//Only allow admins and writers to see posts that are in draft mode.
		if( ($post->draft == true) && (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER) ){
			abort("404");
		}
		$view_data['post'] = $post;
		return view('pages.post.show', $view_data);
	}
	/*
	 * Allow admins and writers to see edit post page.
	*/
	public function edit($id)
	{
		$post = Post::findOrFail($id);
		$this->authorize($post);
		$view_data['post'] = $post;
		return view('pages.post.edit', $view_data);
	}
	/*
	 * Allow admins and writers to edit post.
	*/
	public function update(Request $request, $id)
	{
		$post = Post::findOrFail($id);
		$this->authorize($post);
		$post->update($request->all());
		return redirect('post/'.$id);
	}
	/*
	 * Allow admins and writers to dete post.
	*/
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$this->authorize($post);
		$post->delete();
		return redirect('post/');
	}
}
