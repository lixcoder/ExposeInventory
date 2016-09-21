<?php

class CheckoutController extends BaseController {
	/**
	*FUNCTION TO DISPLAY NEW CHECKOUTS PAGE
	*
	*/
	public function recordCheckout()
	{
		$item=Asset::all();		
		return View::make('checkout.new_checkout',compact('item'));
	}
	/**
	*FUNCTION TO DISPLAY EDIT CHECKOUTS PAGE
	*
	*/
	public function editCheckout(){
		//Collect user input data
		$records=Input::all();
		$item_name=array_get($records, 'item_name');		
		$date_out=array_get($records, 'date_out');		
		$checked_out_by=array_get($records, 'checked_out_by');		
		$checked_id=array_get($records, 'check_id');
		$asset_id=array_get($records, 'asset_id');
		$client_id=array_get($records, 'client_id');
		return View::make('checkout.edit_checkout',compact('item_name','date_out','checked_out_by','checked_id','asset_id','client_id'));
	}
	/**
	*FUNCTION TO DISPLAY VIEW CHECKOUTS PAGE
	*
	*/
	public function updateCheckout(){
		//Collect user inpu data
		$records=Input::all();
		$check_id=array_get($records, 'check_id');
		$asset_id=array_get($records, 'item');		
		$date_out=array_get($records, 'date_out');		
		$checked_out_by=array_get($records, 'checked_out_by');		

		//Set Default Timezoe
		date_default_timezone_set('Africa/Nairobi');	
			
		//Save input to database
		$check=Checkout::where('id','=',$check_id)->first();
		$check->asset_id=$asset_id;				
		$check->date_out=$date_out;		
		$check->checked_out_by=$checked_out_by;				
		$check->save();

		//Redirect Back with a message
		return Redirect::action('CheckoutController@viewCheckout')->withMessage('Checkout details successfully Updated');
	}
	/**
	*FUNCTION TO DISPLAY VIEW CHECKOUTS PAGE
	*
	*/
	public function viewCheckout()
	{
		$checks=DB::table('checkouts')				
				->join('assets','checkouts.asset_id','=','assets.id')				
				->select('assets.id as asset_id','checkouts.id as id','assets.name as item_name','checkouts.date_out as date_out','checkouts.checked_out_by as checked_out_by')			
				->get();			
		return View::make('checkout.view_checkout',compact('checks'));
	}

	public function createCheckout(){
		//Collect user inpu data
		$records=Input::all();
		$asset_id=array_get($records, 'item');
		$date_out=array_get($records, 'date_out');				
		$checked_out_by=array_get($records, 'checked_out_by');		

		//Set Default Timezoe
		date_default_timezone_set('Africa/Nairobi');	
			
		//Save input to database
		$check=new Checkout;
		$check->asset_id=$asset_id;				
		$check->date_out=$date_out;		
		$check->checked_out_by=$checked_out_by;				
		$check->save();

		return Redirect::back()->with('message','The item has been successfully checked out.');
	}

	public function trashCheckout($id){
		Checkout::destroy($id);
		return Redirect::back()->withAlert("The checkout record has been deleted");
	}
}
