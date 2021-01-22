<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostMetasTable extends Migration
{
	public function up()
	{
		Schema::create('post_metas', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			/* Columns */
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->double('lat', 15, 8)->nullable();
			$table->double('long', 15, 8)->nullable();
			$table->string('street')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->integer('zip')->nullable();
			$table->string('country')->nullable();

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
