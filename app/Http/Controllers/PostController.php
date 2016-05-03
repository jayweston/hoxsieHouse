<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;
use App\Models\User;
use App\Models\PostImage;

class PostController extends Controller
{
    public function index()
    {
		$post_type = \Request::input('type');
		if (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER)
			if (Post::isValidPostType($post_type))
				$posts = Post::where('post_type', $post_type)->where('draft', false)->where('avialable_at','<' ,\Carbon\Carbon::now())->paginate(10);
			else
				$posts = Post::where('avialable_at','<' ,\Carbon\Carbon::now())->where('draft', false)->paginate(10);
		else
			if (Post::isValidPostType($post_type))
				$posts = Post::where('post_type', $post_type)->paginate(10);
			else
				$posts = Post::paginate(10);
		$view_data['posts'] = $posts;
		return view('pages.post.index', $view_data);
    }

    public function create()
    {
		$post = new Post();
		$this->authorize($post);
		return view('pages.post.create');
    }

    public function store(Request $request)
    {
		$post = new Post();
		$this->authorize($post);
		$request->request->add(['user_id' => \Auth::user()->id]);
		$post = Post::create($request->all());
		return redirect('post/'.$post->id);
    }

    public function show($id)
    {
		$post = Post::findOrFail($id);
		if( ($post->avialable_at > \Carbon\Carbon::now()) && (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER) ){
			abort("404");
		}
		if( ($post->draft == true) && (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER) ){
			abort("404");
		}
		$view_data['post'] = $post;
		return view('pages.post.show', $view_data);
    }

    public function edit($id)
    {
		$post = Post::findOrFail($id);
		$this->authorize($post);
		$view_data['post'] = $post;
		return view('pages.post.edit', $view_data);
    }

    public function update(Request $request, $id)
    {
		$post = Post::findOrFail($id);
		$this->authorize($post);
		$post->update($request->all());
		return redirect('post/'.$id);
    }

    public function destroy($id)
    {
		$post = Post::findOrFail($id);
		$this->authorize($post);
		$post->delete();
		return redirect('post/');
    }
}
