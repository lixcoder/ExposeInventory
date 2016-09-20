<?php

class Category extends Eloquent{
	//Define database table to associate with model
	protected $table='categories';
	/**
	*DEFINE RELATIONSHIPS
	*
	*/	
	public function assets(){
		$this->hasMany('asset');
	}	

}