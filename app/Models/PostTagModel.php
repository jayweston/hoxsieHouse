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
	/*
	 * 
	*/
	public static function getPostTag($post_id ,$order){
		$post_tag = PostTag::where('post_id', $post_id)->where('order', $order)->first();
		if (!empty($post_tag->id))
			return $post_tag;
		else{
			$post_tag = new PostTag();
			$post_tag->id = 0;
			return $post_tag;
		}
	}
	/*
	 * 
	*/
	public static function getTag($post_id ,$order){
		$post_tag = PostTag::where('post_id', $post_id)->where('order', $order)->first();
		if (!empty($post_tag->id)){
			return Tag::where('id',$post_tag->tag_id)->first();			
		}else{
			$tag = new Tag();
			$tag->id = 0;
			return $tag;
		}

	}
}