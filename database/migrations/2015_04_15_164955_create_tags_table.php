<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tag_id')->unique();
			$table->integer('truck_id')->unsigned();
			$table->timestamps();
		});

		Schema::table('tags', function($table) {

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
		Schema::drop('tags');
	}

}
