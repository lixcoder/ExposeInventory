<?php

class LocationsController extends BaseController {
	/**
	*FUNCTION TO DISPLAY NEW ASSETS PAGE
	*
	*/
	public function index()
	{
		$long = '36.82194619999996';
		$lat = '-1.2920659';
		$assets = Asset::all();
		return View::make('locations.index', compact('assets', 'lat', 'long'));
	}
	/**
	*FUNCTION TO DISPLAY EDIT ASSETS PAGE
	*
	*/

	public function store(){

		$asset = Asset::find(Input::get('asset'));

		$coord = DB::table('locations')->where('asset_id', '=', $asset->id)->first();


		$long = $coord->long;
		$lat = $coord->lat;
		$assets = Asset::all();
		return View::make('locations.index', compact('assets', 'lat', 'long'));

	}
	
}
