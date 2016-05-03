<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\PostMeta;
use App\Models\User;

class PostMetaPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
    }

    public function store(User $user, PostMeta $post_meta)
    {
		if ($user->id == $post_meta->post()->user_id && $user->type == User::TYPE_WRITER)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
    }

    public function update(User $user, PostMeta $post_meta)
    {
		if ($user->id == $post_meta->post()->user_id && $user->type == User::TYPE_WRITER)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
    }

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
