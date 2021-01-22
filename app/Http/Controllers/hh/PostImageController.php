<?php

namespace App\Http\Controllers\hh;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\hh\Post;
use App\Models\hh\User;
use App\Models\hh\PostImage;
use Response;
use Storage;
use Validator;
use App\Http\Controllers\Controller;

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
					$image->thumbnail = 0;
					$image->name = $file->getClientOriginalName();
					$image->post_id = $request['post'];
					$image->old_post_id = $request['post'];
					$image->save();
					\File::move(storage_path().'/app/'.$file->getClientOriginalName(), public_path().'/hh/images/blog/'.$request['post'].'/'.$file->getClientOriginalName());
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
		$post = Post::findOrFail($id);
		$this->authorize('update', $post);
		foreach ($request->all() as $key => $value) {
			if ($key=='_method' || $key=='_token'){
			}elseif(substr_compare($key, "_label", strlen($key)-strlen("_label"), strlen("_label")) === 0){
				$key = substr($key, 0, -6);
				$post_image = PostImage::findOrFail($key);
				$post_image->label = $value;
				$post_image->save();
			}elseif(substr_compare($key, "_delete", strlen($key)-strlen("_delete"), strlen("_delete")) === 0){
				$key = substr($key, 0, -6);
				$post_image = PostImage::findOrFail($key);
				$this->destroy($key);
			}elseif($key=='Thumbnail'){
				$post_image = PostImage::findOrFail($value);
				$post_image->thumbnail = '1';
				$post_image->save();
			}else{dd($key);}
		}
		return redirect($post->url);
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
