<?php

class Booking extends Eloquent{
	//Define database table to associate with model
	protected $table='bookings';
	/**
	*DEFINE RELATIONSHIPS
	*
	*/	
	public function assets(){
		$this->hasMany('asset');
	}

	public function events(){
		$this->hasMany('event');
	}

}