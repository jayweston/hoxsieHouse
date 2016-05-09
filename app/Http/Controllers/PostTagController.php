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
		$retval['messages'] = ["Progress"];
		$retval['messages'] = $request->all();
		return Response::json($retval);
		$post_image = PostImage::findOrFail($id);
		$this->authorize($post_image);
		//If changing the post that this image belongs to then set the post order back to 0.
		if( !empty($request['post_id']) ){
			$request->request->add(['order' => '0']);
		}
		//If changing post to thumbnail then add some extr checks
		if ($request['order'] == '-1'){
			//Make sure image is a png and 250x250
			$results = $post_image->thumbnailable();
			if ($results == 'true'){
				$post_image->update($request->all());
				$retval['success'] = true;
				return Response::json($retval);
			}else{
				$retval['messages'] = [$results];
				return Response::json($retval);
			}
		}else{
			$post_image->update($request->all());
			$retval['success'] = true;
			return Response::json($retval);
		}
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
