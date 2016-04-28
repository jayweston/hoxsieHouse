<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
    }

    public function create(User $user, Post $post)
    {
	$allowed = [
		User::TYPE_ADMIN,
		User::TYPE_WRITER
	];
	return in_array($user->type, $allowed);
    }

    public function store(User $user, Post $post)
    {
	$allowed = [
		User::TYPE_ADMIN,
		User::TYPE_WRITER
	];
	return in_array($user->type, $allowed);
    }

    public function edit(User $user, Post $post)
    {
	if ($user->id == $post->user_id)
		return true;
	$allowed = [
		User::TYPE_ADMIN,
	];
	return in_array($user->type, $allowed);
    }

    public function update(User $user, Post $post)
    {
	if ($user->id == $post->user_id && $user->type == User::TYPE_WRITER)
		return true;
	$allowed = [
		User::TYPE_ADMIN,
	];
	return in_array($user->type, $allowed);
    }

    public function destroy(User $user, Post $post)
    {
	if ($user->id == $post->user_id && $user->type == User::TYPE_WRITER)
		return true;
	$allowed = [
		User::TYPE_ADMIN,
	];
	return in_array($user->type, $allowed);
    }
}
