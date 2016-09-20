<?php

class Checkout extends Eloquent{
	//Define database table to associate with model
	protected $table='checkouts';
	/**
	*DEFINE RELATIONSHIPS
	*
	*/	
	public function assets(){
		$this->hasMany('asset')->withPivot('asset_id');
	}	
	public function clients(){
		$this->hasOne('client');
	}
}