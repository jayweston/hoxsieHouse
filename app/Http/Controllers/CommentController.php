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
		$this->authorize($comment);
		Comment::create($request->all());
		return redirect('post/'.$request['post_id']);
	}
}