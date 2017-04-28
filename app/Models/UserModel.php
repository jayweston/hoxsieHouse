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
	protected $fillable = ['name', 'email', 'type', 'twitter_id', 'facebook_id', 'google_id', 'instagram_id', 'pinterest_id'];
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
	 * Return the comments associated with this user
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
	/*
	 * Static function that returns all of the available user types in dropdown
	 * form.
	*/
	public static function getUserTypesDropdown()
	{
		// Get all possible sql enums for type in user table.
		$type = \DB::select(\DB::raw('SHOW COLUMNS FROM users WHERE Field = "type"'))[0]->Type;
		preg_match('/^enum\((.*)\)$/', $type, $matches);
		$values = [];
		foreach(explode(',', $matches[1]) as $value){
		    $values[] = trim($value, "'");
		}
		// Create dropdown list of the enums.
		$dropdown_list = [];
		foreach($values as $value){
			$dropdown_list[$value] = ucfirst($value);
		}
		return $dropdown_list;		
	}
	/*
	 * Return the posts associated with given user.
	*/
	public static function getUserPosts($user_id)
	{
		$posts = new Post();
		$posts = Post::where('user_id',$user_id)->get(); 
		return $posts;
	}
	/*
	 * Return the comments associated with given user.
	*/
	public static function getUserComments($user_id)
	{
		$comments = new Comment();
		$comments = Comment::where('user_id',$user_id)->get(); 
		return $comments;
	}
}