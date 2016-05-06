<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;
use App\Models\User;
use App\Models\PostMeta;

class PostMetaController extends Controller
{
    public function store(Request $request)
    {
		$post = Post::findOrFail($request['post_id']);
		$post_meta = new PostMeta();
		$post_meta->post_id = $post->id;
		$this->authorize($post_meta);
		PostMeta::create($request->all());
		return redirect('post/'.$request['post_id'].'/edit');
    }

    public function update(Request $request, $id)
    {
		$post_meta = PostMeta::findOrFail($id);
		$this->authorize($post_meta);
		$post_meta->update($request->all());
		return redirect('post/'.$post_meta->post_id.'/edit');
    }

    public function destroy($id)
    {
    	$post_meta = PostMeta::findOrFail($id);
    	$post_id = $post_meta->post_id;
		$this->authorize($post_meta);
		$post_meta->delete();
		return redirect('post/'.$post_id.'/edit');
    }
}
