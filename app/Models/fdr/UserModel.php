<?php

namespace App\Models\fdr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Auth;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword;
	protected $fillable = ['name', 'email', 'type', 'twitter_id', 'facebook_id', 'google_id', 'live_id'];
	/*
	 * Select the database to use.
	*/
	protected $connection = "fdr";
	/*
	 * Static variables for user types. 
	*/
	const TYPE_ADMIN = 'admin';
	const TYPE_WRITER = 'superUser';
	const TYPE_VIEWER = 'viewer';
	/*
	 * Static funtion that return true if the given recipe belongs to
	 * the current logged in user.
	*/
	public static function isRecipeMine($recipe_id)
	{
		$recipe = Recipe::findOrFail($recipe_id);
		return $recipe->user_id == Auth::user()->id;
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
	 * Return the recipes associated with given user.
	*/
	public static function getUserRecipes($user_id)
	{
		$recipes = new Recipe();
		$recipes = Recipe::where('user_id',$user_id)->get(); 
		return $recipes;
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
