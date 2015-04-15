<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('comapny_name');
			$table->decimal('product_quantity', 5, 2);
			$table->timestamp('date_of_delivery');
			$table->string('destination');

			$table->integer('user_id')->unsigned();
			$table->integer('truck_id')->unsigned();
			$table->integer('product_id')->unsigned();

			$table->timestamps();
		});

		Schema::table('orders', function($table) {

      $table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');

      $table->foreign('truck_id')
      ->references('id')->on('trucks')
      ->onDelete('cascade');

      $table->foreign('product_id')
      ->references('id')->on('products')
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
		Schema::drop('orders');
	}

}
