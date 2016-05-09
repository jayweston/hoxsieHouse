<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		Model::unguard();

		$this->call(UserTableSeeder::class);
		$this->call(PostTableSeeder::class);
		$this->call(PostImagesTableSeeder::class);
		$this->call(PostTagTableSeeder::class);

		Model::reguard();
	}
}
