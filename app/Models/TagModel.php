<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['name'];

	/*
	 * Static function that returns a dropdown list of all of the tags in the database.
	*/
	public static function getTagDropdown()
	{
		$dropdown = [];
		$dropdown['0'] = 'N/A';
		foreach (Tag::all() as $tag){
			$dropdown[$tag->id] = $tag->name;
		}
		return $dropdown;
	}
	/*
	 * Return the number of posts that this tag was used in.
	*/
	public function getPostCount()
	{
		return PostTag::where('tag_id',$this->id)->count();
	}
	/*
	 * Return the post models assocaited with this tag.
	*/
	public function posts()
	{
		$post_ids = PostTag::where('tag_id',$this->id)->pluck('post_id')->toArray();
		return Post::find($post_ids);
	}
}
