<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostMetaTable extends Migration
{
	public function up()
	{
		Schema::create('post_metas', function (Blueprint $table) {
			/* Columns */
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->string('title');
			$table->string('description');
			$table->double('lat', 15, 8);
			$table->double('long', 15, 8);
			$table->string('street');
			$table->string('city');
			$table->integer('zip');
			$table->string('country');
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
		Schema::drop('post_metas');
	}
}