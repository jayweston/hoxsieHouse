<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;
	protected $fillable = ['user_id', 'type', 'draft', 'title', 'content', 'summary', 'avialable_at'];
	/*
	 * Static array linking post type to blog name.
	*/
	const SITE_NAMES = ['foodie'=>'HoxsieHouse Eats','review'=>'Reviews of HoxsieHouse','travel'=>'The Adventures of HoxsieHouse'];
	/*
	 * Return an array of image models that are associated with this post.
	*/
	public function images()
	{
		return $this->hasMany('App\Models\PostImage')->orderBy('order', 'ASC');
	}
	/*
	 * Return the comment models associated with this post
	*/
	public function comments()
	{
		$comments = Comment::where('post_id',$this->post_id)->get(); 
		if ( empty($comments[0]->id) ){
			return new Comment();
		}else{
			return $comments;
		}
	}
	/*
	 * Returns an array of image models that are associated with this post. Images has to 
	 * have an order greater than 0 (-1 = thumbnail 0 = hidden from carousel).
	*/
	public function carouselImages()
	{
		return $this->hasMany('App\Models\PostImage')->where('order', '>','0')->orderBy('order', 'ASC');
	}
	/*
	 * Return a image model of the image in the post that is set to be the post thumbnail.
	*/
	public function thumbnail()
	{
		return PostImage::where('post_id',$this->id)->where('order', -1)->first();
	}
	/*
	 * If a thumbnail excists for the current post it will return a path to it. If
	 * it does not excists it returns the path of the default thumbnail.
	*/
	public function thumbnailPath()
	{
		$image = PostImage::where('post_id',$this->id)->where('order', -1)->first();
		if ( !empty($image->id) ){
			return \URL::to('/images/blog/'.$image->post_id.'/'.$image->name); 
		}else{
			return \URL::to('/images/blog/thumbnail.png');
		}
	}
	/*
	 * Returns the post summary for the current post.  If no summary is given it
	 * returns the first 200 charictors of the post content (minus anything between
	 * <> symbols).
	*/
	public function description()
	{	
		if ( empty($this->summary) ){
			// Remove anything between <>.  AKA remove html tags like <div> <a href=...>
			$content = preg_replace("/\<[^)]+\>/","",$this->content);
			return substr($content,0,200)."..."; 
		}else{
			return $this->summary;
		}
	}
	/*
	 * Return a model of the meta of the current post.
	*/
	public function meta()
	{
		$meta = PostMeta::where('post_id',$this->id)->first();
		if (empty($meta->id))
			return new PostMeta();
		return $meta;
	}
	/*
	 * Static function that return true if the given string is a possible post type. 
	*/
	public static function isValidPostType($string)
	{
		// Get all possible sql enums for type in post table.
		$type = \DB::select(\DB::raw('SHOW COLUMNS FROM posts WHERE Field = "type"'))[0]->Type;
		preg_match('/^enum\((.*)\)$/', $type, $matches);
		$values = array();
		foreach(explode(',', $matches[1]) as $value){
		    $values[] = trim($value, "'");
		}
		// return true if the given string is in the array of enums.
		return in_array($string, $values);
	}
	/*
	 * Static function that returns all of the available post types in dropdown
	 * form.
	*/
	public static function getPostTypesDropdown()
	{
		// Get all possible sql enums for type in post table.
		$type = \DB::select(\DB::raw('SHOW COLUMNS FROM posts WHERE Field = "type"'))[0]->Type;
		preg_match('/^enum\((.*)\)$/', $type, $matches);
		$values = array();
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
	 * Static function that returns all of the available post titles in dropdown
	 * form.
	*/
	public static function getPostTitleDropdown()
	{
		$posts = Post::all();
		$dropdown = [];
		foreach ($posts as $post)
			$dropdown[$post->id] = $post->title;
		return $dropdown;
	}
	/*
	 * Return the date when the post is avialable for viewing to normal users.
	*/
	public function isAvailable()
	{
		return $this->avialable_at < \Carbon\Carbon::now();
	}
}