<?php

namespace App\Policies\hh;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\hh\PostImage;
use App\Models\hh\User;

class PostImagePolicy
{
	use HandlesAuthorization;

	public function __construct()
	{
	}
	/*
	 * Allow admins and writers that this post belongs to save it. 
	*/
	public function store(User $user, PostImage $post_image)
	{
		if ($user->id == $post_image->post()->user_id && $user->type == User::TYPE_WRITER)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
	/*
	 * Allow admins and writers that this post belongs to update it.
	*/
	public function update(User $user, PostImage $post_image)
	{
		if ($user->id == $post_image->post()->user_id && $user->type == User::TYPE_WRITER)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
	/*
	 * Allow admins and writers that this post belongs to delete it.
	*/
	public function destroy(User $user, PostImage $post_image)
	{
		if ($user->id == $post_image->post()->user_id && $user->type == User::TYPE_WRITER)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
}
