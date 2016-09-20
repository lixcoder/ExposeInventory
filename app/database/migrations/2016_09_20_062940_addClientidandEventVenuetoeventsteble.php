<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClientidandEventVenuetoeventsteble extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{		
		// Creates the clients table
        Schema::create('clients', function ($table) {
            $table->increments('id');            
            $table->string('client_name');
            $table->string('email',250);
            $table->string('phone',15);
            $table->string('address',100);
            $table->string('contact_name');
            $table->string('contact_person_email',250);
            $table->string('contact_person_phone',15);
            $table->string('type',25);
            $table->timestamps();
            $table->softdeletes();
        });
        //Creates assets table
        Schema::create('assets', function ($table) {
            $table->increments('id');  
            $table->string('category');                            
            $table->string('name',200);
            $table->string('serial_number');
            $table->string('is_in_store',5);
            $table->string('store');
            $table->string('tracking_id');   
            $table->string('description');                                                 
            $table->timestamps();
            $table->softdeletes();
        });
        // Creates the events table
        Schema::create('events', function ($table) {
            $table->increments('id');            
            $table->string('name');
            $table->date('start_date'); 
            $table->date('end_date'); 
            $table->string('technical_lead',250);          
            $table->timestamps();
            $table->softdeletes();
        });
        // Creates the bookings table
        Schema::create('bookings', function ($table) {
            $table->increments('id');  
            $table->integer('asset_id')->unsigned();                     
            $table->integer('event_id')->unsigned(); 
            $table->integer('client_id')->unsigned();                     
            $table->string('event_venue');                                       
            $table->timestamps();
            $table->softdeletes();
        });
        //Creates checkouts table
        Schema::create('checkouts', function ($table) {
            $table->increments('id');  
            $table->integer('asset_id')->unsigned();          
            $table->integer('client_id')->unsigned();            
            $table->date('date_expected_out');            
            $table->date('date_out'); 
            $table->date('date_expected_in'); 
            $table->date('date_in'); 
            $table->string('checked_in_by',200);
            $table->string('checked_out_by',200);                                                     
            $table->timestamps();
            $table->softdeletes();
        });       
        //Creates maintenances table
        Schema::create('maintenances', function ($table) {
            $table->increments('id');  
            $table->integer('asset_id')->unsigned();            
            $table->date('date_performed');       
            $table->string('test_performed',200);
            $table->string('outcome');                                                       
            $table->timestamps();
            $table->softdeletes();
        });        
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
		Schema::drop('assets');
		Schema::drop('bookings');
		Schema::drop('checkouts');
		Schema::drop('events');
		Schema::drop('maintenances');
	}

}
