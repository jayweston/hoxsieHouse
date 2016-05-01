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
    public function store(Request $request)
    {
		$post = Post::findOrFail($request['post']);
		$post_image = new PostImage();
		$post_image->post_id = $post->id;
		$this->authorize($post_image);
		$files = $request->file('images');
		$rules = ['image' => 'required','image' => 'image']; 
		if( !empty($files[0]) ){
			foreach ($files as $file) {
				$validator = Validator::make(['image' => $file], $rules);
				if ($validator->fails()) {

				}else{
					Storage::put($file->getClientOriginalName(),file_get_contents($file));
					$image = new PostImage();
					$image->order = $post->numberOfImages()+1;
					$image->name = $file->getClientOriginalName();
					$image->post_id = $request['post'];
					$image->save();
					\File::move(storage_path().'/app/'.$file->getClientOriginalName(), public_path().'/images/blog/'.$request['post'].'/'.$file->getClientOriginalName());
				}
			}
		}
		return redirect('post/'.$request['post'].'/edit');
    }

    public function update(Request $request, $id)
    {
		$retval = [
			'success' => false,
			'messages' => [],
		];
		$post_image = PostImage::findOrFail($id);
		$this->authorize($post_image);
		$post_image->update($request->all());
		$retval['success'] = true;
		return Response::json($retval);
    }

    public function destroy($id)
    {
		$post_image = PostImage::findOrFail($id);
		$this->authorize($post_image);
		$post_image->delete();
		return redirect('post/'.$post_image->post()->id.'/edit');
    }
}
