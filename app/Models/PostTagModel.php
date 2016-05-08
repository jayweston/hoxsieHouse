<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTag extends Model
{
	use SoftDeletes;

	protected $fillable = ['post_id', 'tag_id'];
	/*
	 * Return a post model for the post assocaited with this post_tag.
	*/
	public function post()
	{
		return Post::where('id',$this->post_id)->first();
	}
	/*
	 * Return a tag model for the tag assocaited with this post_tag.
	*/
	public function tag()
	{
		return Tag::where('id',$this->tag_id)->first();
	}
}