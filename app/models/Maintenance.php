<?php

class Maintenance extends Eloquent{
	//Define database table to associate with model
	protected $table='maintenances';
	/**
	*DEFINE RELATIONSHIPS
	*
	*/	
	public function assets(){
		$this->hasMany('asset');
	}	

}