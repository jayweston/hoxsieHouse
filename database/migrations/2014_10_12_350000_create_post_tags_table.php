<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagsTable extends Migration
{
	public function up()
	{
		Schema::create('post_tags', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			/* Columns */
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			$table->integer('order')->unsigned();

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
			$table->unique([
				'post_id',
				'order'
			]);
		});
	}

	public function down()
	{
		Schema::drop('post_tags');
	}
}
