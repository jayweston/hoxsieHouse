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

    public function index(User $current_user, User $user)
    {
	$allowed = [
		User::TYPE_ADMIN
	];
	return in_array($current_user->type, $allowed);
    }

    public function create(User $current_user, User $user)
    {
	$allowed = [
		User::TYPE_ADMIN
	];
	return in_array($current_user->type, $allowed);
    }

    public function store(User $current_user, User $user)
    {
	$allowed = [
		User::TYPE_ADMIN
	];
	return in_array($current_user->type, $allowed);
    }

    public function show(User $current_user, User $user)
    {
	if ($current_user->id == $user->id)
		return true;
	$allowed = [
		User::TYPE_ADMIN
	];
	return in_array($current_user->type, $allowed);
    }

    public function edit(User $current_user, User $user)
    {
	if ($current_user->id == $user->id)
		return true;
	$allowed = [
		User::TYPE_ADMIN
	];
	return in_array($current_user->type, $allowed);
    }

    public function update(User $current_user, User $user)
    {
	if ($current_user->id == $user->id)
		return true;
	$allowed = [
		User::TYPE_ADMIN
	];
	return in_array($current_user->type, $allowed);
    }

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
