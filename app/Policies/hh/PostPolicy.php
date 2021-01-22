<?php

namespace App\Policies\hh;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\hh\Post;
use App\Models\hh\User;

class PostPolicy
{
	use HandlesAuthorization;

	public function __construct()
	{
	}
	/*
	 * Allow admins and writers to view the create page. 
	*/
	public function create(User $user, Post $post)
	{
		$allowed = [
			User::TYPE_ADMIN,
			User::TYPE_WRITER
		];
		return in_array($user->type, $allowed);
	}
	/*
	 * Allow admins and writers make a new post. 
	*/
	public function store(User $user, Post $post)
	{
		$allowed = [
			User::TYPE_ADMIN,
			User::TYPE_WRITER
		];
		return in_array($user->type, $allowed);
	}
	/*
	 * Allow admins and writers that this post belongs to to view the edit page.
	*/
	public function edit(User $user, Post $post)
	{
		if ($user->id == $post->user_id && $user->type == User::TYPE_WRITER)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
	/*
	 * Allow admins and writers that this post belongs to to update it.
	*/
	public function update(User $user, Post $post)
	{
		if ($user->id == $post->user_id && $user->type == User::TYPE_WRITER)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
	/*
	 * Allow admins and writers that this post belongs to to delete it.
	*/
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
