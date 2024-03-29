<?php

namespace App\Models\dds;

use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
	protected $fillable = ["id","value","width","height","color","category","title","summary", "description","ebay","amazon","etsy","jpg"];
	public $timestamps = false;
	const SITE_CATEGORIES = ['Cars','Celebrities','Charity','Nature','Animals','Other'];
	/*
	 * Select the database to use.
	*/
	protected $connection = "dds";
	/*
	 * Return drawing categories.
	*/
	public function getPieceCategories()
	{
		$categories  = $this->category;
		return explode(",", $categories);
	}
	/*
	 * Return drawing categories.
	*/
	public function getColor()
	{
		if ($this->color == 1){
			return "Color";
		}else{
			return "Greyscale";
		}
	}
	/*
	 * Return images for category.
	*/
	public static function getCategoryImages($category)
	{
		$images = Drawing::where('category','LIKE' ,'%'.$category.'%')->pluck('jpg');
		return $images;
		dd($images);
	}
}
