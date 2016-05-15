<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
	use HandlesAuthorization;

	public function __construct()
	{
	}
	/*
	 * Allow admins and writers that this post belongs to save it. 
	*/
	public function store(User $user, Comment $comment)
	{
		$allowed = [
			User::TYPE_ADMIN,
			User::TYPE_WRITER,
			User::TYPE_VIEWER,
		];
		return in_array($user->type, $allowed);
	}
}