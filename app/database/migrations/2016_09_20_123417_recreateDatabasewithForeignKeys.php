<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateDatabasewithForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{		
		// Creates the categories table
        Schema::create('categories', function ($table) {
            $table->increments('id');            
            $table->string('name');
            $table->string('description',255);            
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
            $table->string('event_venue'); 
            $table->string('technical_lead',250);          
            $table->timestamps();
            $table->softdeletes();
        });
        // Creates the bookings table
        Schema::create('bookings', function ($table) {
            $table->increments('id');  
            $table->integer('asset_id')->unsigned();
            $table->foreign('asset_id')->references('id')->on('assets');                     
            $table->integer('event_id')->unsigned(); 
            $table->foreign('event_id')->references('id')->on('events');                     
            $table->date('start_date');                     
            $table->date('end_date'); 
            $table->string('event_venue');                                       
            $table->timestamps();
            $table->softdeletes();
        });
        //Creates checkouts table
        Schema::create('checkouts', function ($table) {
            $table->increments('id');  
            $table->integer('asset_id')->unsigned();
            $table->foreign('asset_id')->references('id')->on('assets');            
            $table->date('date_out');                         
            $table->string('checked_out_by',200);                                                     
            $table->timestamps();
            $table->softdeletes();
        });   
        //Creates checkins table
        Schema::create('checkins', function ($table) {
            $table->increments('id');  
            $table->integer('asset_id')->unsigned();
            $table->foreign('asset_id')->references('id')->on('assets');            
            $table->date('date_in');                         
            $table->string('checked_in_by',200); 
            $table->string('condition',200);                                                    
            $table->timestamps();
            $table->softdeletes();
        });       
        //Creates maintenances table
        Schema::create('maintenances', function ($table) {
            $table->increments('id');  
            $table->integer('asset_id')->unsigned(); 
            $table->foreign('asset_id')->references('id')->on('assets');                      
            $table->date('date_performed');       
            $table->string('test_performed',200);
            $table->string('outcome');                                                       
            $table->timestamps();
            $table->softdeletes();
        }); 

        Schema::create('locations', function ($table) {
            $table->increments('id');  
            $table->integer('asset_id')->unsigned();
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade')->onUpdate('cascade');            
            $table->date('date')->nullable();       
            $table->float('lat')->nullable();
            $table->float('long')->nullable();                                                       
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
		Schema::drop('categories');
		Schema::drop('assets');
		Schema::drop('bookings');
		Schema::drop('checkouts');
		Schema::drop('checkins');
		Schema::drop('events');
		Schema::drop('maintenances');
	}


}
