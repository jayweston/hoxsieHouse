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
     * Allow admins and writers that this post belongs to save it. 
    */
	public function store(User $user, PostMeta $post_meta)
	{
		if ($user->id == $post_meta->post()->user_id && $user->type == User::TYPE_WRITER)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
    /*
     * Allow admins and writers that this post belongs to save it. 
    */
	public function update(User $user, PostMeta $post_meta)
	{
		if ($user->id == $post_meta->post()->user_id && $user->type == User::TYPE_WRITER)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
    /*
     * Allow admins and writers that this post belongs to save it. 
    */
	public function destroy(User $user, PostMeta $post_meta)
	{
		if ($user->id == $post_meta->post()->user_id && $user->type == User::TYPE_WRITER)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
}