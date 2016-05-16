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
	
	public function children()
	{
		$comments = Comment::where('parent_id',$this->id)->get();
		if ( empty($comments[0]->id) ){
			return new Comment();
		}else{
			return $comments;
		}
	}
	*/
	private static function children($current){
		$children = Comment::where('parent_id',$current->id)->orderBy('created_at', 'ASC')->get();
		$tree = [];
		if( !empty($children[0]) ){
			foreach($children as $child){
				$child['level'] = $current->level + 1;
				$tree[]=$child;
				$tree=array_merge($tree,Comment::children($child));
			}
		}
		return $tree;
	}

	public static function comments($post_id){
		$comments=Comment::where('post_id',$post_id)->where('parent_id',null)->orderBy('created_at', 'ASC')->get();
		$comments_array=[];
		if( !empty($comments[0]) ){
			foreach($comments as $comment){
				$comment['level'] = 1;
				$comments_array[]=$comment;
				$comments_array=array_merge($comments_array,Comment::children($comment));
			}
		}else{
			return new Comment();
		}
		
		return $comments_array;
	}






















	/*
	 * Return the time elapsed since this date was posted
	*/
	public function timeElapsed()
	{
		return \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
	}
}