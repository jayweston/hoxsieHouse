<?php

namespace App\Models\dds;

use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
	protected $fillable = ["id","value","width","height","color","category","title","summary", "description","ebay","amazon","etsy","jpg"];
	public $timestamps = false;
	protected $connection = "dds";

	/*
	 * Return drawing categories.
	*/
	public function getCategories()
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
}
