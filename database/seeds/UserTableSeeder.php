<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\hh\User;

class UserTableSeeder extends Seeder
{
	public function run()
	{
		$data = [];
		$data[] = ['id'=> 1, 'email'=> 'redcherries22@gmail.com', 'type' => User::TYPE_ADMIN, 'name' => 'Stacie Skinner', 'created_at' => Carbon\Carbon::now()];
		$data[] = ['id'=> 2, 'email'=> 'teacum@gmail.com', 'type' => User::TYPE_WRITER, 'name' => 'Jay Weston', 'created_at' => Carbon\Carbon::now()];
		$data[] = ['id'=> 3, 'email'=> 'mormongirl782@hotmail.com', 'type' => User::TYPE_VIEWER, 'name' => 'Rebel Weston', 'created_at' => Carbon\Carbon::now()];
		DB::table('users')->insert($data);
	}
}
