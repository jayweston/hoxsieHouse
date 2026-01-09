<?php

namespace App\Http\Controllers\hh;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\hh\Post;
use App\Models\hh\User;
use App\Models\hh\PostMeta;
use App\Http\Controllers\Controller;

class PostMetaController extends Controller
{
	/*
	 * List all tags used.  Avialable to all admins and writers.
	*/
	public function index()
	{
		$metas_city = \DB::raw('SELECT city as name, COUNT(*) AS cnt FROM post_metas GROUP BY name ORDER BY cnt DESC');
		$metas_state = \DB::raw('SELECT state as name, COUNT(*) AS cnt FROM post_metas GROUP BY name ORDER BY cnt DESC');
		$metas_country = \DB::raw('SELECT country as name, COUNT(*) AS cnt FROM post_metas GROUP BY name ORDER BY cnt DESC');
		$view_data['meta_city'] = $metas_city;
		$view_data['meta_state'] = $metas_state;
		$view_data['meta_country'] = $metas_country;
		return view('hh.pages.meta.index', $view_data);
	}
	/*
	 * Show all uses of a given tag.
	*/
	public function show($slug)
	{
		$ids = PostMeta::where('city','=' ,$slug)->orWhere('state','=' ,$slug)->orWhere('zip','=' ,$slug)->orWhere('country','=' ,$slug)->pluck('post_id');
		$posts = Post::whereIn('id',$ids)->orderBy('avialable_at', 'desc')->get();
		$view_data['posts'] = $posts;
		$view_data['slug'] = $slug;
		return view('hh.pages.meta.show', $view_data);
	}	/*
	 * Allows post owners and admins to create post meta data.
	*/
	public function store(Request $request)
	{
		$post = Post::findOrFail($request['post_id']);
		$post_meta = new PostMeta();
		$post_meta->post_id = $post->id;
		$this->authorize('store', $post_meta);
		$this->validate($request, [
			'title' => 'nullable|max:255|string',
			'description' => 'nullable|max:255|string',
			'lat' => 'nullable|max:20|string',
			'long' => 'nullable|max:20|string',
			'street' => 'nullable|max:255|string',
			'city' => 'nullable|max:255|string',
			'state' => 'nullable|max:255|string',
			'zip' => 'nullable|digits:5|integer',
			'country' => 'nullable|max:50|string',
		]);
		$post_meta->title = $request->title;
		$post_meta->description = $request->description;
		$post_meta->lat = $request->lat;
		$post_meta->long = $request->long;
		$post_meta->street = $request->street;
		$post_meta->city = $request->city;
		$post_meta->state = $request->state;
		$post_meta->zip = $request->zip;
		$post_meta->country = $request->country;
		$post_meta->save();
		return redirect('post/'.$request['post_id'].'/edit');
	}
	/*
	 * Allows post owners and admins to update post meta data.
	*/
	public function update(Request $request, $id)
	{
		$post_meta = PostMeta::findOrFail($id);
		$this->authorize('update', $post_meta);
		$this->validate($request, [
			'title' => 'nullable|max:255|string',
			'description' => 'nullable|max:255|string',
			'lat' => 'nullable|max:20|string',
			'long' => 'nullable|max:20|string',
			'street' => 'nullable|max:255|string',
			'city' => 'nullable|max:255|string',
			'state' => 'nullable|max:255|string',
			'zip' => 'nullable|digits:5|integer',
			'country' => 'nullable|max:50|string',
		]);
		$post_meta->update($request->all());
		return redirect('post/'.$post_meta->post_id.'/edit');
	}
	/*
	 * Allows post owners and admins to delete post meta data.
	*/
	public function destroy($id)
	{
		$post_meta = PostMeta::findOrFail($id);
		$post_id = $post_meta->post_id;
		$this->authorize('destroy', $post_meta);
		$post_meta->delete();
		return redirect('post/'.$post_id.'/edit');
	}
}
