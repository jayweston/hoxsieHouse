<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostTagTableSeeder extends Seeder
{
	public function run()
	{
		$data = [];
		$data[] = ['id'=> '1', 'name'=>'tag_1' ];
		$data[] = ['id'=> '2', 'name'=>'tag_2' ];
		$data[] = ['id'=> '3', 'name'=>'tag_3' ];
		$data[] = ['id'=> '4', 'name'=>'tag_4' ];
		$data[] = ['id'=> '5', 'name'=>'tag_5' ];
		DB::table('tags')->insert($data);
		$data = [];
		$data[] = ['id'=> '1', 'post_id'=>'1', 'tag_id'=>'1', 'order'=>'1' ];
		$data[] = ['id'=> '2', 'post_id'=>'1', 'tag_id'=>'2', 'order'=>'4' ];
		$data[] = ['id'=> '3', 'post_id'=>'1', 'tag_id'=>'3', 'order'=>'2' ];
		$data[] = ['id'=> '4', 'post_id'=>'1', 'tag_id'=>'4', 'order'=>'5' ];
		$data[] = ['id'=> '5', 'post_id'=>'1', 'tag_id'=>'5', 'order'=>'3' ];
		DB::table('post_tags')->insert($data);
	}
}
