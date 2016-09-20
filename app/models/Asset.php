<?php

class Asset extends Eloquent{
	//Define database table to associate with model
	protected $table='assets';
	/**
	*DEFINE RELATIONSHIPS
	*
	*/	
	public function categories(){
		$this->belongsTo('category');
	}

	public function events(){
		$this->belongsToMany('event');
	}

	public function bookings(){
		$this->belongsTo('booking');
	}

}