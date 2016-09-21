<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderitemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orderitems', function($table){
			$table->increments('id');
			$table->integer('item_id')->unsigned();
			$table->integer('order_id')->unsigned();
			$table->tinyInteger('quantity');
			$table->timestamps();

			$table->foreign('item_id')->references('id')->on('assets');
			$table->foreign('order_id')->references('id')->on('orders');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orderitems');
	}

}
