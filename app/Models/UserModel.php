<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword;
	use SoftDeletes;
	protected $fillable = ['name', 'email', 'password'];

	const TYPE_ADMIN = 'admin';
	const TYPE_WRITER = 'writer';
	const TYPE_VIEWER = 'viewer';

	public static function isPostMine($post_id)
	{
		$post = Post::findOrFail($post_id);
		return $post->user_id == Auth::user()->id;
	}
}
