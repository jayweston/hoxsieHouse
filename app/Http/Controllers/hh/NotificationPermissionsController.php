<?php

namespace App\Http\Controllers\hh;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\hh\User;
use Response;
use App\Http\Controllers\Controller;

class NotificationPermissionsController extends Controller
{
	/*
	 * Allows post owners and admins to update post tag data.
	 * This includes adding a new tag and deleting a post tag.
	 * Each post can have a maximum of 10 post tags when submitting
	 * a update requesr 10 new tags (some blank) are given.
	 * $id is the post id and not the post_tag id
	*/
	public function update(Request $request, $id)
	{
		// Remove unused information.
		//$inputs contains an array of 10 arrays with the following key value pairs
		// 0=>order 1=>tag 2=>new_tag
		$inputs = $request->except(['_method','_token']);
		//Delete all post tags associated with this post.
		PostTag::where('post_id',$id)->delete();
		//Itterate through the 10 posts tags and input each one.
		foreach($inputs as $input){
			// Skip if the order is set to 0.
			if ($input[0] != '0'){
				//Skip if the only the order is set.
				if($input[1] == '0' && $input[2] == ''){
					continue;
				}
				// Create a new tag if the new tag field has a value.
				// This will do nothing if the new tag value already exsists.
				if($input[1] == '0'){
					$tag = Tag::firstOrNew( [ 'name'=>$input[2] ] );
					$tag->name = $input[2];
					$tag->save();
					$input[1] = $tag->id;
				}
				// Delete the old tag if the user sets two tags to have the same tag id
				$post_tag = PostTag::where('post_id',$id)->where('tag_id',$input[1])->first();
				if ( !empty($post_tag->id) ){
					$post_tag->delete();
				}
				// Delete the old tag if the user sets two tags to have the same order
				$post_tag = PostTag::where('post_id',$id)->where('order',$input[0])->first();
				if ( !empty($post_tag->id) ){
					$post_tag->delete();
				}
				// Create and save new post tag
				$post_tag = new PostTag();
				$post_tag->tag_id = $input[1];
				$post_tag->post_id = $id;
				$post_tag->order = $input[0];
				$post_tag->save();
			}
		}
		return redirect('post/'.$id.'/edit');
	}
}

