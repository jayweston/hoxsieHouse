<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostImage extends Model
{
	protected $fillable = ['post_id', 'label', 'order'];
	/*
	 * Return a post model of the post associated with this image.
	*/
	public function post()
	{
		return Post::where('id',$this->post_id)->first();
	}
	/*
	 * Add the following functionality to the built in save button:
	 * 1) If the post id of the images changes move the file to the location
	 * new location.  Images are stored in /public/images/blog/{blogID}/ where
	 * blogID = post id.
	 * 2) If a thumbnail is saved (image with an order of -1) then
	 * remove the thumbnail status of every other thumbnail associated
	 * with that blog.
	 * 3) If the user did not set the old post id make sure it is set. 
	*/
	public function save(array $options = [])
	{
		$new_image = false;
		if( empty($this->id) )
			$new_image = true;
		else{
			// The image was moved from one post to another post.
			if ( $this->old_post_id != $this->post_id ){
				\File::move(public_path().'/images/blog/'.$this->old_post_id.'/'.$this->name, public_path().'/images/blog/'.$this->post_id.'/'.$this->name);
			}
			// The image was set as a thumbnail.  Unset all other thumbnails for post.
			if($this->order == -1){
				\DB::update("update `post_images` set `order`='0' where `post_id` = '".$this->post_id."' AND `id` != '".$this->id."' AND `order`='-1' ");
			}
		}
		$this->old_post_id = $this->post_id;
		parent::save($options);
	}
	/*
	 * Get a dropdown that the current image can be set to. With -1 being
	 * a thumbnail, 0 being hidden from carousl, and then 1 to the number of 
	 * images.
	*/
	public function getOrderDropdown()
	{
		$dropdown = [];
		$dropdown['-1'] = 'Thumbnail';
		$dropdown['0'] = 'Hidden';
		for($i=1;$i<=count(PostImage::where('post_id',$this->post_id)->get());$i++)
			$dropdown[$i] = $i;
		return $dropdown;
	}
	/*
	 * Return true is the image meets the requirments to be a thumbnail:
	 * 1) Must be 250x250 px.
	 * 2) Must be of type png.
	 * If it is not a valid thumbnail return why.
	*/
	public function thumbnailable()
	{
		// Make sure the image is found on the server.
		if ( !file_exists(public_path().'/images/blog/'.$this->post_id.'/'.$this->name) )
			return "Image was not found.";
		// Make sure the image is 250x250.
		$image_resolution = getimagesize(public_path().'/images/blog/'.$this->post_id.'/'.$this->name);
		if ( ($image_resolution[0] != 250) || ($image_resolution[1] != 250) )
			return "Image resolution is ".$image_resolution[0]."x".$image_resolution[1]." and should be 250x250.";
		// Make sure the image ends in png.
		$extention = substr($this->name,-3);
		if (strtolower($extention) != 'png')
			return "Image type is ".$extention." and should be png.";
		// Pass
		return 'true';
	}
}