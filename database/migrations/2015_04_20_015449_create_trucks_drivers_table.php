<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucksDriversTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trucks_drivers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('truck_id')->unsigned();
			$table->integer('driver_id')->unsigned();
			$table->timestamp('date_assigned');
			$table->timestamps();
		});

		Schema::table('trucks_drivers', function(Blueprint $table)
		{
			$table->foreign('driver_id')
      ->references('id')->on('drivers')
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
		Schema::drop('trucks_drivers');
	}

}
