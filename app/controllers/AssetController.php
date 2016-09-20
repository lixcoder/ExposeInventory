<?php

class AssetController extends BaseController {
	/**
	*FUNCTION TO DISPLAY NEW ASSETS PAGE
	*
	*/
	public function recordAsset()
	{
		return View::make('asset.new_asset');
	}
	/**
	*FUNCTION TO DISPLAY EDIT ASSETS PAGE
	*
	*/
	public function editAsset()
	{
		$id=Input::get('asset_id');
		$edit_asset=Asset::findOrFail($id);		
		if(count($edit_asset)<1){
			return Redirect::action('AssetController@viewAsset');
		}else{
			return View::make('asset.edit_asset',compact('edit_asset'));
		}		
	}
	/**
	*FUNCTION TO UPDATE ITEM DETAILS IN THE DATABASE
	*
	*/
	public function updateAsset(){
		$records=Input::all();
		$asset_id=array_get($records,'asset_id');
		$category=array_get($records, 'category');		
		$name=array_get($records, 'name');
		$serial=array_get($records, 'serial');
		$desc=array_get($records, 'description');		
		$store=array_get($records, 'store');

		$item_to_update=Asset::where('id','=',$asset_id)->first();
		$item_to_update->category=$category;		
		$item_to_update->name=$name;
		$item_to_update->serial_number=$serial;		
		$item_to_update->description=$desc;		
		$item_to_update->store=$store;
		$item_to_update->save();

		return Redirect::action('AssetController@viewAsset')->withMessage("The item successfully updated.");
	}
	/**
	*FUNCTION TO THROW AN ASSET TO TRASH
	*
	*/
	public function trashAsset($id){
		Asset::destroy($id);
		return Redirect::back()->withAlert("The item has been deleted");
	}
	/**
	*FUNCTION TO DISPLAY VIEW ASSETS PAGE
	*
	*/
	public function viewAsset()
	{
		$assets=Asset::all();
		return View::make('asset.view_asset',compact('assets'));
	}
	/**
	*FUNCTION Add items to database
	*
	*/
	public function createAsset(){
		//Get user Input
		$records=Input::all();
		$category=array_get($records, 'category');		
		$name=array_get($records, 'name');
		$serial=array_get($records, 'serial');
		$desc=array_get($records, 'description');		
		$store=array_get($records, 'store');

		date_default_timezone_set('Africa/Nairobi');		
		//Save input to database
		$item=new Asset;
		$item->category=$category;	
		$item->name=$name;
		$item->serial_number=$serial;
		$item->is_in_store="YES";
		$item->description=$desc;		
		$item->store=$store;
		$item->save();

		return Redirect::back()->with('message','The Asset records successfully created.');
	}
}
