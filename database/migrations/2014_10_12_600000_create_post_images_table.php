<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostImagesTable extends Migration
{
	public function up()
	{
		Schema::create('post_images', function (Blueprint $table) {
			/* Columns */
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->string('name');
			$table->string('label');
			$table->integer('order')->unsigned();
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
