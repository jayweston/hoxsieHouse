<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
	public function up()
	{
		Schema::create('posts', function (Blueprint $table) {
			/* Columns */
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->enum('post_type', [
				'foodie',
				'review',
				'travel'
			]);
			$table->boolean('draft')->default(false);
			$table->string('title');
			$table->longText('content');
			$table->string('summary');
			$table->dateTime('avialable_at');
			$table->timestamps();
			$table->softDeletes();

			/* Relationships */
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}
