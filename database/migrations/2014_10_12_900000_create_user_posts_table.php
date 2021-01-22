<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPostsTable extends Migration
{
	public function up()
	{
		Schema::create('user_posts', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			/* Columns */
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('post_id')->unsigned();
			$table->date('created_at');

			/* Relationships */
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');

			$table->foreign('post_id')
				->references('id')
				->on('posts')
				->onDelete('cascade');

			/* Indexes */
			$table->unique([
				'user_id',
				'post_id',
				'created_at'
			]);
		});
	}

	public function down()
	{
		Schema::drop('user_posts');
	}
}
