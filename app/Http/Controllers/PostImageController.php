<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;
use App\Models\User;
use App\Models\PostImage;

class PostImageController extends Controller
{
    public function store(Request $request)
    {
	dd($request->all());
	$post_image = new PostImage();
	$this->authorize($post_image);
	$post_image = PostImage::create($request->all());
	return redirect('post/');
    }

    public function update(Request $request, $id)
    {
	dd($request->all());
	$post_image = new PostImage();
	$this->authorize($post_image);
	$post_image->update($request->all());
	return redirect('post/');
    }

    public function destroy($id)
    {
	$post_image = PostImage::findOrFail($id);
	$this->authorize($post_image);
	$post_image->delete();
	return redirect('post/'.$post_image->post()->id.'/edit');
    }
}
