<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;
	protected $fillable = ['user_id', 'post_type', 'draft', 'title', 'content', 'summary', 'avialable_at'];

	public function images()
	{
		return $this->hasMany('App\Models\PostImage');
	}

	public static function isValidPostType($string)
	{
		$type = \DB::select(\DB::raw('SHOW COLUMNS FROM posts WHERE Field = "post_type"'))[0]->Type;
		preg_match('/^enum\((.*)\)$/', $type, $matches);
		$values = array();
		foreach(explode(',', $matches[1]) as $value){
		    $values[] = trim($value, "'");
		}
		return in_array($string, $values);
	}

	public static function getPostTypes()
	{
		$type = \DB::select(\DB::raw('SHOW COLUMNS FROM posts WHERE Field = "post_type"'))[0]->Type;
		preg_match('/^enum\((.*)\)$/', $type, $matches);
		$values = array();
		foreach(explode(',', $matches[1]) as $value){
		    $values[] = trim($value, "'");
		}
		return $values;
	}

	public static function arrayToDropdown($array)
	{
		$dropdown_list = [];
		foreach($array as $value){
			$dropdown_list[$value] = ucfirst($value);
		}
		return $dropdown_list;
	}

	public static function getPostTitleDropdown()
	{
		$posts = Post::all();
		$dropdown = [];
		foreach ($posts as $post)
			$dropdown[$post->id] = $post->title;
		return $dropdown;
	}
}
