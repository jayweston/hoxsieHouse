<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationPermissionsTable extends Migration
{
	public function up()
	{
		Schema::create('notification_permissions', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			/* Columns */
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->boolean('email')->default(true);
			$table->boolean('twitter')->default(true);
			$table->boolean('facebook')->default(true);
			$table->timestamps();

			/* Relationships */
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('notification_permissions');
	}
}
