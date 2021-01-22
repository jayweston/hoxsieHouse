<?php

namespace App\Models\hh;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
	protected $fillable = ['post_id', 'title', 'description', 'lat', 'long', 'street', 'city', 'state', 'zip', 'country'];
	public $timestamps = false;
	/*
	 * Return a post model for the post assocaited with this meta.
	*/
	public function post()
	{
		$posts = Post::where('id',$this->post_id)->first();
		if ( empty($posts->id) ){
			return new Post();
		}else{
			return $posts;
		}
	}
}
