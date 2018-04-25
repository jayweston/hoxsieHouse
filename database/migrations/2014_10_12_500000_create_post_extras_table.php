<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostExtrasTable extends Migration
{
	public function up()
	{
		Schema::create('post_extras', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			/* Columns */
			$table->increments('id');
			$table->integer('post_id')->unsigned()->unique();
			$table->string('street');
			$table->string('city');
			$table->string('state');
			$table->integer('zip')->unsigned();
			$table->dateTime('avialable_at');
			$table->timestamps();
			$table->softDeletes();

			/* Relationships */
			$table->foreign('post_id')
				->references('id')
				->on('posts')
				->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('post_extras');
	}
}
