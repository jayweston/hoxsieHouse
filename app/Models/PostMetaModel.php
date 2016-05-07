<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
	protected $fillable = ['post_id', 'title', 'description', 'lat', 'long', 'street', 'city', 'zip', 'country'];
	/*
	 * Return a post model for the post assocaited with this meta.
	*/
	public function post()
	{
		return Post::where('id',$this->post_id)->first();
	}
}
