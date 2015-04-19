<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamp('start_of_service');
			$table->timestamp('end_of_service')->nullable();
			$table->string('type_of_service');
			$table->integer('number_of_delays')->unsigned();

			//foreign keys
			$table->integer('truck_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->timestamps();
		});

		Schema::table('services', function($table) {

      $table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');

      $table->foreign('truck_id')
      ->references('id')->on('trucks')
      ->onDelete('cascade');

    });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('services');
	}

}
