<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('routes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('origin');
			$table->string('destination');
			$table->timestamp('date_of_departure');

			$table->integer('driver_id')->unsigned();
			$table->integer('user_id')->unsigned();

			$table->timestamps();
		});

		Schema::table('routes', function($table) {

			$table->foreign('driver_id')
      ->references('id')->on('drivers')
      ->onDelete('cascade');

      $table->foreign('user_id')
      ->references('id')->on('users')
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
		Schema::drop('routes');
	}

}
