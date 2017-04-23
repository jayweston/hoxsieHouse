<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
	public function up()
	{
		Schema::create('comments', function (Blueprint $table) {
			/* Columns */
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('post_id')->unsigned();
			$table->integer('parent_id')->unsigned()->nullable();
			$table->longText('comment');
			$table->timestamps();

			/* Relationships */
			$table->foreign('post_id')
				->references('id')
				->on('posts')
				->onDelete('cascade');

			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('set null');

			$table->foreign('parent_id')
				->references('id')
				->on('comments')
				->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('comments');
	}
}
