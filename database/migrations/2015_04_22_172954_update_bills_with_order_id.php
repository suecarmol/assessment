<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBillsWithOrderId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bills', function(Blueprint $table)
		{
			//
			$table->integer('order_id')->unsigned();

			$table->foreign('order_id')
      ->references('id')->on('orders')
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
		Schema::table('bills', function(Blueprint $table)
		{
			//
		});
	}

}
