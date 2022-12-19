<?php

namespace App\Policies\fdr;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\fdr\Recipe;
use App\Models\fdr\User;

class RecipePolicy
{
	use HandlesAuthorization;

	public function __construct()
	{
	}
	/*
	 * Allow users to view the create page. 
	*/
	public function create(User $user, Recipe $recipe)
	{
		return true;
	}
	/*
	 * Allow users and admins make a new recipe. 
	*/
	public function store(User $user, Recipe $recipe)
	{
		if ($user->id == $recipe->user_id)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
	/*
	 * Allow admins and users that this recipe belongs to to view the edit page.
	*/
	public function edit(User $user, Recipe $recipe)
	{
		if ($user->id == $recipe->user_id)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
	/*
	 * Allow admins and users that this recipe belongs to to update it.
	*/
	public function update(User $user, Recipe $recipe)
	{
		if ($user->id == $recipe->user_id)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
	/*
	 * Allow admins and users that this recipe belongs to to delete it.
	*/
	public function destroy(User $user, Recipe $recipe)
	{
		if ($user->id == $recipe->user_id)
			return true;
		$allowed = [
			User::TYPE_ADMIN,
		];
		return in_array($user->type, $allowed);
	}
}
