<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostImage extends Model
{
	protected $fillable = ['post_id', 'label', 'order'];

	public function post()
	{
		return Post::where('id',$this->post_id)->first();
	}

}
