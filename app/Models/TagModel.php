<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	public static function getTagDropdown()
	{
		$dropdown = [];
		$dropdown['0'] = 'N/A';
		foreach (Tag::all() as $tag){
			$dropdown[$tag->id] = $tag->name;
		}
		return $dropdown;
	}
}
