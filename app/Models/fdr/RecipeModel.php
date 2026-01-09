<?php

namespace App\Models\fdr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;


class Recipe extends Model
{
	protected $fillable = ['user_id', 'type', 'draft', 'title', 'content', 'summary', 'avialable_at'];
	/*
	 * Static array linking recipe type to blog name.
	*/
	const SITE_NAMES = ['foodie'=>'HoxsieHouse Eats','review'=>'Reviews of HoxsieHouse','travel'=>'The Adventures of HoxsieHouse'];
	/*
	 * Select the database to use.
	*/
	protected $connection = "dds";
	/*
	 * Static function that returns all of the available recipe types in dropdown
	 * form.
	*/
	public static function getRecipeTypesDropdown()
	{
		// Get all possible sql enums for type in recipe table.
		$results = \DB::select('SHOW COLUMNS FROM posts WHERE Field = "type"');
		foreach ($results as $row){
			$type = $row->Type;
		}
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
	 * Return slug for SEO URLs.
	*/
	public function getSlugAttribute()
	{
		return str_slug($this->title);
	}
	/*
	 * Return slug for SEO URLs.
	*/
	public function getUrlAttribute()
	{
		return 'recipe/'.$this->type.'/'.$this->id.'/'.$this->slug;
	}
}

