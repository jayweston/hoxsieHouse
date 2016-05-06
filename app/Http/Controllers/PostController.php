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
		$type = strtolower( \Request::input('type') );
		if (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER)
			if (Post::isValidPostType($type)){
				$posts = Post::where('type', $type)->where('draft', false)->where('avialable_at','<' ,\Carbon\Carbon::now())->paginate(10);
			}
			else{
				$type="all";
				$posts = Post::where('avialable_at','<' ,\Carbon\Carbon::now())->where('draft', false)->paginate(10);
			}
		else{
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
