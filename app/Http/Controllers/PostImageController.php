<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;
use App\Models\User;
use App\Models\PostImage;
use Response;
use Storage;
use Validator;

class PostImageController extends Controller
{
	/*
	 * Save new images to post.
	*/
	public function store(Request $request)
	{
		$post = Post::findOrFail($request['post']);
		$post_image = new PostImage();
		$post_image->post_id = $post->id;
		$this->authorize('store', $post_image);
		$files = $request->file('images');
		$rules = ['image' => 'required','image' => 'image']; 
		if( !empty($files[0]) ){
			// Ability to upload multiple files.
			foreach ($files as $file) {
				$validator = Validator::make(['image' => $file], $rules);
				if ($validator->fails()) {
					//If the image is not valid just skip to the next one (like a .doc was uploaded).
				}else{
					// Save image and move it to proper directory.
					Storage::put($file->getClientOriginalName(),file_get_contents($file));
					$image = new PostImage();
					$image->order = 0;
					$image->name = $file->getClientOriginalName();
					$image->post_id = $request['post'];
					$image->old_post_id = $request['post'];
					$image->save();
					\File::move(storage_path().'/app/'.$file->getClientOriginalName(), public_path().'/images/blog/'.$request['post'].'/'.$file->getClientOriginalName());
				}
			}
		}
		return redirect('post/'.$request['post'].'/edit');
	}
	/*
	 * Alow admins and post creaters to update current post.
	*/
	public function update(Request $request, $id)
	{
		$retval = [
			'success' => false,
			'messages' => [''],
		];
		$post_image = PostImage::findOrFail($id);
		$this->authorize('update', $post_image);
		//If changing the post that this image belongs to then set the post order back to 0.
		if( !empty($request['post_id']) ){
			$request->request->add(['order' => '0']);
		}
		//If changing post to thumbnail then add some extra checks
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
	 * Alow admins and post creaters to delete current post.
	*/
	public function destroy($id)
	{
		$post_image = PostImage::findOrFail($id);
		$this->authorize('destroy', $post_image);
		$post_image->delete();
		return redirect('post/'.$post_image->post()->id.'/edit');
	}
}