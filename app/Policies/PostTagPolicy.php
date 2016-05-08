<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\PostTag;
use App\Models\User;

class PostTagPolicy
{
	use HandlesAuthorization;

	public function __construct()
	{
	}
    /*
     * Allow admins and post others to save tags to this post. 
    */
	public function store(User $user, PostTag $post_tag)
	{
		if ($user->id == $post_tag->post()->user_id && $user->type == User::TYPE_WRITER)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
    /*
     * Allow admins and post others to update tags to this post. 
    */
	public function update(User $user, PostTag $post_tag)
	{
		if ($user->id == $post_tag->post()->user_id && $user->type == User::TYPE_WRITER)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
    /*
     * Allow admins and post others to delete tags to thid post. 
    */
	public function destroy(User $user, PostTag $post_tag)
	{
		if ($user->id == $post_tag->post()->user_id && $user->type == User::TYPE_WRITER)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
}