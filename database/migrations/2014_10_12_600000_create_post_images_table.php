<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostImagesTable extends Migration
{
	public function up()
	{
		Schema::create('post_images', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			/* Columns */
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->integer('old_post_id')->unsigned()->nullable();
			$table->string('name');
			$table->string('label')->nullable();
			$table->boolean('thumbnail');
			$table->timestamps();

			/* Relationships */
			$table->foreign('post_id')
				->references('id')
				->on('posts')
				->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('post_images');
	}
}
