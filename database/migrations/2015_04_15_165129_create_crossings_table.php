<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrossingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crossings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('operator');
			$table->string('highway_stretch');
			$table->decimal('cost', 5, 2);
			$table->decimal('cost_with_discount', 5, 2);
			$table->decimal('billed_cost', 5, 2);
			$table->timestamp('crossing_date');

			$table->integer('tag_id')->unsigned();

			$table->timestamps();
		});

		Schema::table('crossings', function($table) {

      $table->foreign('tag_id')
      ->references('id')->on('tags')
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
		Schema::drop('crossings');
	}

}
