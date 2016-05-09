<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Models\PostTag;
use Response;

class PostTagController extends Controller
{

	/*
	 * Allows post owners and admins to create post meta data.
	*/
    public function store(Request $request)
    {
		$post = Post::findOrFail($request['post_id']);
		$post_tag = new PostTag();
		$post_tag->post_id = $post->id;
		$this->authorize($post_tag);
		PostTag::create($request->all());
		return redirect('post/'.$request['post_id'].'/edit');
    }
	/*
	 * Allows post owners and admins to update post meta data.
	*/
    public function update(Request $request, $id)
    {
		$retval = [
			'success' => false,
			'messages' => [],
		];
		if ($id=='0'){

		}else{
			if ( !empty($request['new_tag']) ){
				$tag = new Tag();
				$tag->name = $request['new_tag'];
				$tag->save();
				$post_tag = PostTag::findOrFail($id);
				$post_tag->tag_id = $tag->id;
				$retval['success'] = true;
				return Response::json($retval);
			}else{
				$post_tag = PostTag::findOrFail($id);
				$post_tag->update($request->all());
				$retval['success'] = true;
				return Response::json($retval);
			}
		}

		$retval['messages'] = $request->all();
		return Response::json($retval);
    }
	/*
	 * Allows post owners and admins to delete post meta data.
	*/
    public function destroy($id)
    {
    	$post_tag = PostTag::findOrFail($id);
    	$post_id = $post_tag->post_id;
		$this->authorize($post_tag);
		$post_tag->delete();
		return redirect('post/'.$post_id.'/edit');
    }
}
t