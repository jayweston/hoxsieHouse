<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('email')->nullable()->unique();
			$table->enum('type', [
				'admin',
				'writer',
				'viewer'
			])->default('viewer');
			$table->string('google_id')->nullable()->unique();
			$table->string('twitter_id')->nullable()->unique();
			$table->string('facebook_id')->nullable()->unique();
			$table->string('instagram_id')->nullable()->unique();
			$table->string('pinterest_id')->nullable()->unique();
			$table->string('live_id')->nullable()->unique();
			$table->string('yahoo_id')->nullable()->unique();
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
