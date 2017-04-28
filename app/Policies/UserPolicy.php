<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class UserPolicy
{
	use HandlesAuthorization;

	public function __construct()
	{
	}
	/*
	 * Allow admins and writers to view the create page. 
	*/
	public function create(User $current_user, User $user)
	{
		$allowed = [
			User::TYPE_ADMIN
		];
		return in_array($current_user->type, $allowed);
	}
	/*
	 * Allow admins and writers to view the create page. 
	*/
	public function store(User $current_user, User $user)
	{
		$allowed = [
			User::TYPE_ADMIN
		];
		return in_array($current_user->type, $allowed);
	}
	/*
	 * Allow all logged in users to see the list of users.
	*/
	public function index(User $current_user, User $user)
	{
		$allowed = [
			User::TYPE_ADMIN,
			User::TYPE_WRITER,
			User::TYPE_VIEWER,
		];
		return in_array($current_user->type, $allowed);
	}
	/*
	 * Allow all logged in users to see the single user page.
	*/
	public function show(User $current_user, User $user)
	{
		$allowed = [
			User::TYPE_ADMIN,
			User::TYPE_WRITER,
			User::TYPE_VIEWER,
		];
		return in_array($current_user->type, $allowed);
	}
	/*
	 * Allow admins and current user to edit their account.
	*/
	public function edit(User $current_user, User $user)
	{
		if ($current_user->id == $user->id)
			return true;
		$allowed = [
			User::TYPE_ADMIN
		];
		return in_array($current_user->type, $allowed);
	}
	/*
	 * Allow admins and current user to update their own user account.
	*/
	public function update(User $current_user, User $user)
	{
		if ($current_user->id == $user->id)
			return true;
		$allowed = [
			User::TYPE_ADMIN
		];
		return in_array($current_user->type, $allowed);
	}
	/*
	 * Allow admins and current user to delete their own user account.
	*/
	public function destroy(User $current_user, User $user)
	{
		if ($current_user->id == $user->id)
			return true;
		$allowed = [
			User::TYPE_ADMIN
		];
		return in_array($current_user->type, $allowed);
	}
}
