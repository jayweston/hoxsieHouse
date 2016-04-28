<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\PostImage;
use App\Models\User;

class PostImagePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
    }

    public function store(User $user, PostImage $post_image)
    {
	$allowed = [
		User::TYPE_ADMIN,
		User::TYPE_WRITER
	];
	return in_array($user->type, $allowed);
    }

    public function update(User $user, PostImage $post_image)
    {
	if ($user->id == $post_image->post()->user_id && $user->type == User::TYPE_WRITER)
		return true;
	$allowed = [
		User::TYPE_ADMIN,
	];
	return in_array($user->type, $allowed);
    }

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
