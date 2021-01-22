<?php

namespace App\Models\ct;

use Illuminate\Database\Eloquent\Model;

class Tile extends Model
{
	/*
	 * Get the foler name of a path.
	*/
	public static function getFolderName($path)
	{
		$path = explode('/',$path);
		return end($path);
	}
	/*
	 * Get the foler name of a path without spaces.
	*/
	public static function getFolder($path)
	{
		$path = explode('/',$path);
		$path = end($path);
		return str_replace(' ', '', $path);
	}
}
