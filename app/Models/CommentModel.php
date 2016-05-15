<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
	protected $fillable = ['user_id', 'post_id', 'parent_id', 'comment'];
	/*
	 * Static array defining comment depth for each user.
	*/
	const DEPTH = [User::TYPE_ADMIN=>'2',User::TYPE_WRITER=>'2',User::TYPE_VIEWER=>'1'];
	/*
	 * Return the user associated with this comment
	*/
	public function user()
	{
		return User::where('id',$this->user_id)->first();
	}
	/*
	 * Return the post model associated with this comment
	*/
	public function post()
	{
		return Post::where('id',$this->post_id)->first();
	}
	/*
	 * Return the parent comment model associated with this comment
	*/
	public function parrent()
	{
		if ( empty($this->parent_id) ){
			return new Comment();
		}else{
			return Comment::where('id',$this->parent_id)->first();
		}
	}
	/*
	 * Return the child models associated with this comment
	*/
	public function children()
	{
		$comments = Comment::where('parent_id',$this->id)->get();
		if ( empty($comments[0]->id) ){
			return new Comment();
		}else{
			return $comments;
		}
	}
}