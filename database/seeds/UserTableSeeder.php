<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserTableSeeder extends Seeder
{
	public function run()
	{
		$data = [];
		$data[] = ['id'=> 1, 'email'=> 'redcherries22@gmail.com', 'password'=> Hash::make('password'), 'type' => User::TYPE_ADMIN, 'name' => 'Sacie Skinner', 'created_at' => Carbon\Carbon::now()];
		$data[] = ['id'=> 2, 'email'=> 'teacum@gmail.com', 'password'=> Hash::make('password'), 'type' => User::TYPE_ADMIN, 'name' => 'Jay Weston', 'created_at' => Carbon\Carbon::now()];
		$data[] = ['id'=> 3, 'email'=> 'writer@gmail.com', 'password'=> Hash::make('password'), 'type' => User::TYPE_WRITER, 'name' => 'Standard Writer', 'created_at' => Carbon\Carbon::now()];
		$data[] = ['id'=> 4, 'email'=> 'viewer@gmail.com', 'password'=> Hash::make('password'), 'type' => User::TYPE_VIEWER, 'name' => 'Standard Viewer', 'created_at' => Carbon\Carbon::now()];
		DB::table('users')->insert($data);
	}
}
