<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->nullable();
			$table->enum('type', [
				'admin',
				'writer',
				'viewer'
			])->default('viewer');
			$table->string('password')->nullable();
			$table->string('provider')->default('HoxsieHouse');
			$table->string('provider_id')->nullable()->unique();
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
