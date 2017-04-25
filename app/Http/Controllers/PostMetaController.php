<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;
use App\Models\User;
use App\Models\PostMeta;

class PostMetaController extends Controller
{
	/*
	 * Allows post owners and admins to create post meta data.
	*/
	public function store(Request $request)
	{
		$post = Post::findOrFail($request['post_id']);
		$post_meta = new PostMeta();
		$post_meta->post_id = $post->id;
		$this->authorize($post_meta);
		$this->validate($request, [
			'title' => 'min:1|max:255|string',
			'description' => 'min:1|max:255|string',
			'lat' => 'min:1|max:20|string',
			'long' => 'max:20|string',
			'street' => 'min:1|max:255|string',
			'city' => 'min:1|max:255|string',
			'zip' => 'digits:5|integer',
			'country' => 'min:1|max:50|string',
		]);
		PostMeta::create($request->all());
		return redirect('post/'.$request['post_id'].'/edit');
	}
	/*
	 * Allows post owners and admins to update post meta data.
	*/
	public function update(Request $request, $id)
	{
		$post_meta = PostMeta::findOrFail($id);
		$this->authorize($post_meta);
		$this->validate($request, [
			'title' => 'min:1|max:255|string',
			'description' => 'min:1|max:255|string',
			'lat' => 'min:1|max:20|string',
			'long' => 'max:20|string',
			'street' => 'min:1|max:255|string',
			'city' => 'min:1|max:255|string',
			'zip' => 'digits:5|integer',
			'country' => 'min:1|max:50|string',
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
		$this->authorize($post_meta);
		$post_meta->delete();
		return redirect('post/'.$post_id.'/edit');
	}
}