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
		if( empty($this->id) )
			$new_image = true;
		else{
			if ( $this->old_post_id != $this->post_id ){
				\File::move(public_path().'/images/blog/'.$this->old_post_id.'/'.$this->name, public_path().'/images/blog/'.$this->post_id.'/'.$this->name);
			}
			if($this->order == -1){
				\DB::update("update `post_images` set `order`='0' where `post_id` = '".$this->post_id."' AND `id` != '".$this->id."' AND `order`='-1' ");
			}
		}
		$this->old_post_id = $this->post_id;
		parent::save($options);
	}

	public function getOrderDropdown()
	{
		$dropdown = [];
		$dropdown['-1'] = 'Thumbnail';
		$dropdown['0'] = 'Hidden';
		for($i=1;$i<=count(PostImage::where('post_id',$this->post_id)->get());$i++)
			$dropdown[$i] = $i;
		return $dropdown;
	}

	public function thumbnailable()
	{
		if ( !file_exists(public_path().'/images/blog/'.$this->post_id.'/'.$this->name) )
			return "Image was not found.";
		$image_resolution = getimagesize(public_path().'/images/blog/'.$this->post_id.'/'.$this->name);
		if ( ($image_resolution[0] != 250) || ($image_resolution[1] != 250) )
			return "Image resolution is ".$image_resolution[0]."x".$image_resolution[1]." and should be 250x250.";

		$extention = substr($this->name,-3);
		if (strtolower($extention) != 'png')
			return "Image type is ".$extention." and should be png.";
		
		return 'true';
	}
}