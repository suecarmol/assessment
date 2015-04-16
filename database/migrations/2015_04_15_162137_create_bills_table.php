<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bills', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('quantity_delivered', 10, 2);
			$table->decimal('total_price', 10, 2);
			$table->timestamp('valid_thru');
			$table->integer('is_paid_for')->unsigned();

			$table->integer('driver_id')->unsigned();
			$table->integer('user_id')->unsigned();

			$table->timestamps();
		});

		Schema::table('bills', function($table) {

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
		Schema::drop('bills');
	}

}
