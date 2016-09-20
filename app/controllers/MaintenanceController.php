<?php

class MaintenanceController extends BaseController {
	/**
	*FUNCTION TO DISPLAY NEW MAINTENANCE PAGE
	*
	*/
	public function recordMaintenance()
	{
		$item=Asset::all();
		return View::make('maintenance.new_maintenance',compact('item'));
	}
	/**
	*FUNCTION TO DISPLAY EDIT MAINTENANCE PAGE
	*
	*/
	public function editMaintenance()
	{
		$asset_id=Input::get('asset_id');
		$maintain_id=Input::get('maintain_id');
		$item_name=Input::get('item_name');
		$date_performed=Input::get('date_performed');
		$test_performed=Input::get('test_performed');
		$test_result=Input::get('test_result');
		return View::make('maintenance.edit_maintenance',compact('maintain_id','asset_id','date_performed','test_performed','test_result','item_name'));
	}
	/**
	*FUNCTION TO UPDATE MAINTENANCE
	*
	*/
	public function updateMaintenance(){
		//Collect user data
		$records=Input::all();
		$maintain_id=array_get($records, 'maintain_id');
		$asset_id=array_get($records, 'item');
		$date_performed=array_get($records, 'date_performed');
		$test_performed=array_get($records, 'test_performed');
		$outcome=array_get($records, 'outcome');

		//Set Default Timezoe
		date_default_timezone_set('Africa/Nairobi');	
			
		//Save input to database
		$maintain=Maintenance::where('id','=',$maintain_id)->first();;
		$maintain->asset_id=$asset_id;
		$maintain->date_performed=$date_performed;
		$maintain->test_performed=$test_performed;
		$maintain->outcome=$outcome;		
		$maintain->save();
		return Redirect::action('MaintenanceController@viewMaintenance')->withMessage('Maintenance details successfully updated.');
	}
	/**
	*FUNCTION TO DISPLAY VIEW MAINTENANCE PAGE
	*
	*/
	public function viewMaintenance()
	{
		$maintains=DB::table('maintenances')			
				->join('assets','maintenances.asset_id','=','assets.id')				
				->select('assets.name as asset_name','assets.id as asset_id','maintenances.id as id','maintenances.date_performed as date_performed','maintenances.outcome as outcome','maintenances.test_performed as test_performed')			
				->get();		
		return View::make('maintenance.view_maintenance',compact('maintains'));
	}

	public function createMaintenance()
	{
		//Collect user data
		$records=Input::all();
		$asset_id=array_get($records, 'item');
		$date_performed=array_get($records, 'date_performed');
		$test_performed=array_get($records, 'test_performed');
		$outcome=array_get($records, 'outcome');

		//Set Default Timezoe
		date_default_timezone_set('Africa/Nairobi');	
			
		//Save input to database
		$maintain=new Maintenance;
		$maintain->asset_id=$asset_id;
		$maintain->date_performed=$date_performed;
		$maintain->test_performed=$test_performed;
		$maintain->outcome=$outcome;		
		$maintain->save();

		return Redirect::back()->with('message','The item test records successfully recorded.');
	}

	public function trashMaintenance($id){
		Maintenance::destroy($id);
		return Redirect::back()->withAlert("The maintenance record has been deleted.");
	}
}
