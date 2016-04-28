<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagsTable extends Migration
{
	public function up()
	{
		Schema::create('post_tags', function (Blueprint $table) {
			/* Columns */
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();

			/* Relationships */
			$table->foreign('post_id')
				->references('id')
				->on('posts')
				->onDelete('cascade');
			$table->foreign('tag_id')
				->references('id')
				->on('tags')
				->onDelete('cascade');

			/* Indexes */
			$table->unique([
				'post_id',
				'tag_id'
			]);
		});
	}

	public function down()
	{
		Schema::drop('post_tags');
	}
}
