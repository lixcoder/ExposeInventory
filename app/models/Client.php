<?php

class Client extends Eloquent{
	//Define database table to associate with model
	protected $table='clients';
	//Editable columns
	protected $fillable=array('client_name','email','phone','address','contact_person','contact_person_phone','contact_person_email','type');

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