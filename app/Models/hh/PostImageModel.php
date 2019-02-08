<?php

namespace App\Models\hh;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostImage extends Model
{
	protected $fillable = ['post_id', 'label', 'thumbnail'];
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
	 * new location.  Images are stored in /public/hh/images/blog/{blogID}/ where
	 * blogID = post id.
	 * 2) If a thumbnail is saved then remove the thumbnail status of every
	 * other thumbnail associated with that blog.
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
				\File::move(public_path().'/hh/images/blog/'.$this->old_post_id.'/'.$this->name, public_path().'/hh/images/blog/'.$this->post_id.'/'.$this->name);
			}
			// The image was set as a thumbnail.  Unset all other thumbnails for post.
			if($this->thumbnail == 1){
				\DB::update("update `post_images` set `thumbnail`='0' where `post_id` = '".$this->post_id."' AND `id` != '".$this->id."' AND `thumbnail`='1' ");
			}
		}
		$this->old_post_id = $this->post_id;
		parent::save($options);
	}
}
