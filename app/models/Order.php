<?php

class Order extends Eloquent{
	public function orderitems(){

		return $this->hasMany('Orderitem');
	}
}