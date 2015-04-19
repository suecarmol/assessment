<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tires', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('brand');
			$table->string('serial_number');
			$table->timestamp('date_added_to_truck');
			$table->timestamp('date_last_service');
			$table->timestamp('date_removed')->nullable();
			$table->integer('truck_id')->unsigned();
			$table->timestamps();
		});

		Schema::table('tires', function($table) {
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
		Schema::drop('tires');
	}

}
