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
	/*
	 * Static variables for user types. 
	*/
	const TYPE_ADMIN = 'admin';
	const TYPE_WRITER = 'writer';
	const TYPE_VIEWER = 'viewer';
	/*
	 * Static funtion that return true if the given post belongs to
	 * the current logged in user.
	*/
	public static function isPostMine($post_id)
	{
		$post = Post::findOrFail($post_id);
		return $post->user_id == Auth::user()->id;
	}
	/*
	 * Return the comment models associated with this user
	*/
	public function comments()
	{
		$comments = Comment::where('user_id',$this->user_id)->get(); 
		if ( empty($comments[0]->id) ){
			return new Comment();
		}else{
			return $comments;
		}
	}
}
