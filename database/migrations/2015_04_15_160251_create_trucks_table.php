<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trucks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('model');
			$table->string('year');
			$table->string('plates')->unique();
			$table->decimal('capacity', 10, 2);
			$table->timestamp('date_last_service');
			$table->integer('is_available')->unsigned();
			$table->integer('is_in_service')->unsigned();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trucks');
	}

}
