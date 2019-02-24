<?php

namespace App\Http\Controllers\hh;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\hh\Post;
use App\Models\hh\User;
use App\Models\hh\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
	/*
	 * Allows logged in users to create comments.
	*/
	public function store(Request $request)
	{
		$comment = new Comment();
		$comment->parent_id = $request->input('parent_id');
		$this->authorize('store', $comment);
		$this->validate($request, [
			'comment' => 'required|min:3|string',
		]);
		$request->request->add(['user_id' => \Auth::id()]);
		Comment::create($request->all());
		$post = Post::findOrFail($request['post_id']);
		return redirect($post->url);
	}
	/*
	 * Allow admins to dete comments.
	*/
	public function destroy($id)
	{
		$comment = Comment::findOrFail($id);
		$post = Post::findOrFail($comment->post_id);
		$this->authorize('destroy', $comment);
		$comment->delete();
		return redirect($post->url);
	}
}
