<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;
	protected $fillable = ['user_id', 'type', 'draft', 'title', 'content', 'summary', 'avialable_at'];
	const SITE_NAMES = ['foodie'=>'HoxsieHouse Eats','review'=>'Reviews of HoxsieHouse','travel'=>'The Adventures of HoxsieHouse'];

	public function images()
	{
		return $this->hasMany('App\Models\PostImage')->orderBy('order', 'ASC');
	}

	public function carouselImages()
	{
		return $this->hasMany('App\Models\PostImage')->where('order', '>','0')->orderBy('order', 'ASC');
	}

	public function thumbnail()
	{
		return PostImage::where('post_id',$this->id)->where('order', -1)->first();
	}

	public function thumbnailPath()
	{
		$image = PostImage::where('post_id',$this->id)->where('order', -1)->first();
		if ( !empty($image->id) ){
			return \URL::to('/images/blog/'.$image->post_id.'/'.$image->name); 
		}else{
			return \URL::to('/images/blog/thumbnail.png');
		}
	}

	public function description()
	{
		
		if ( empty($this->summary) ){
			$content = preg_replace("/\<[^)]+\>/","",$this->content);
			return substr($content,0,200)."..."; 
		}else{
			return $this->summary;
		}
	}

	public function meta()
	{
		$meta = PostMeta::where('post_id',$this->id)->first();
		if (empty($meta->id))
			return new PostMeta();
		return $meta;
	}

	public static function isValidPostType($string)
	{
		$type = \DB::select(\DB::raw('SHOW COLUMNS FROM posts WHERE Field = "type"'))[0]->Type;
		preg_match('/^enum\((.*)\)$/', $type, $matches);
		$values = array();
		foreach(explode(',', $matches[1]) as $value){
		    $values[] = trim($value, "'");
		}
		return in_array($string, $values);
	}

	public static function getPostTypes()
	{
		$type = \DB::select(\DB::raw('SHOW COLUMNS FROM posts WHERE Field = "type"'))[0]->Type;
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

	public function numberOfImages()
	{
		return count(PostImage::where('post_id',$this->id)->get());
	}

	public function isAvailable()
	{
		return $this->avialable_at < \Carbon\Carbon::now();
	}
}
