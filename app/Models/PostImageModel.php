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

	public function save(array $options = [])
	{
		$new_image = false;
		if($this->id === NULL)
			$new_image = true;
		else
			if ($this->old_post_id != $this->post_id)
				\File::move(public_path().'/images/blog/'.$this->old_post_id.'/'.$this->name, public_path().'/images/blog/'.$this->post_id.'/'.$this->name);
		$this->old_post_id = $this->post_id;
		parent::save($options);
	}
}
