<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

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
		return redirect('post/'.$request['post_id']);
	}
	/*
	 * Allow admins to dete comments.
	*/
	public function destroy($id)
	{
		$comment = Comment::findOrFail($id);
		$post_id = $comment->post_id;
		$this->authorize('destroy', $comment);
		$comment->delete();
		return redirect('post/'.$post_id);
	}
}
