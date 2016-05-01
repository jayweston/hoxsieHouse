<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PostImagesTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$data = []; 
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '01.jpeg', 'label'=> 'The welcome to questival sign.'];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '02.jpeg', 'label'=> 'I learned how to say help in Hungarian from the people at Rescue.'];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '03.jpeg', 'label'=> 'The line to get the backpack and totem was super long.  Good thing I got there early.'];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '04.jpeg', 'label'=> 'Tony showed up just intime to get the backpack.'];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '05.jpeg', 'label'=> 'I loved the image of the man punching the bear so much that I bought a shirt of it.'];
		DB::table('post_images')->insert($data);

		$data = [];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '06.jpeg'];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '07.jpeg'];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '08.jpeg'];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '09.jpeg'];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '10.jpeg'];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '11.jpeg'];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '12.jpeg'];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '13.jpeg'];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '14.jpeg'];
		$data[] = ['post_id'=> '1', 'old_post_id'=> '1', 'name'=> '15.jpeg'];
		$data[] = ['post_id'=> '2', 'old_post_id'=> '2', 'name'=> '01.jpg'];
		$data[] = ['post_id'=> '2', 'old_post_id'=> '2', 'name'=> '02.jpg'];
		$data[] = ['post_id'=> '2', 'old_post_id'=> '2', 'name'=> '03.jpg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '01.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '02.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '03.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '04.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '05.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '06.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '07.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '08.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '09.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '10.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '11.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '12.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '13.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '14.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '15.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '16.jpeg'];
		$data[] = ['post_id'=> '3', 'old_post_id'=> '3', 'name'=> '17.jpeg'];
		DB::table('post_images')->insert($data);

	}
}







