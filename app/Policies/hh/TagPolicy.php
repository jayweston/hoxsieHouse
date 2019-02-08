<?php

namespace App\Policies\hh;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\hh\User;
use App\Models\hh\Tag;

class TagPolicy
{
	use HandlesAuthorization;

	public function __construct()
	{
	}
	/*
	 * Allow admins to update a tag.
	*/
	public function update(User $current_user, Tag $tag)
	{
		$allowed = [
			User::TYPE_ADMIN
		];
		return in_array($current_user->type, $allowed);
	}
	/*
	 * Allow admins to delete a tag.
	*/
	public function destroy(User $current_user, Tag $tag)
	{
		$allowed = [
			User::TYPE_ADMIN
		];
		return in_array($current_user->type, $allowed);
	}
}
