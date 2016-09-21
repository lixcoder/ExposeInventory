<?php

class Orderitem extends Eloquent{
	public function order(){

		return $this->belongsTo('Order');
	}

	public function asset(){
		return $this->belongsTo('Asset');
	}
}