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
			$table->increments('id');
			$table->integer('event_id')->unsigned();
			$table->string('order_number');
			$table->string('type',50);
			$table->float('discount');
			$table->date('date');
			$table->string('status',30)->default('new');
			$table->timestamps();

			$table->foreign('event_id')->references('id')->on('events');
		});

		/*Schema::create('orderitems', function($table){
			$table->increments('id');
			$table->integer('item_id')->unsigned();
			$table->tinyInt('quantity');
			$table->integer('order_id')->unsigned();
			$table->float('discount');
			$table->timestamps();

			$table->foreign('item_id')->references('id')->on('assets');
			$table->foreign('order_id')->references('id')->on('orders');
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
		//Schema::drop('orderitems');
	}

}
