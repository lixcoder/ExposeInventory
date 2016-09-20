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
		Schema::create('orders', function($table){
			$table->increments('id')->unsigned();
			$table->integer('event_id')->unsigned();
			$table->string('order_number');
			$table->string('type',50);
			$table->date('date');
			$table->string('status',30);
			$table->float('discount');
			$table->timestamps();

			$table->foreign('event_id')->references('id')->on('events');
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
