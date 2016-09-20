<?php

class HomeController extends BaseController {
	/**
	*FUNCTION TO DISPLAY SPLASH SCREEN
	*
	*/
	public function splashScreen()
	{
		$assets=Asset::count('id');		
		$maintains=Checkout::count('id');
		$books=Booking::count('id');
		$checkouts=Checkout::count('id');
		return View::make('home.dashboard',compact('assets','maintains','books','checkouts'));
	}

	/**
	*FUNCTION TO DISPLAY SPLASH SCREEN
	*
	*/
	public function showCategory()
	{
		return View::make('asset.new_assetcategory');
	}

	/**
	*FUNCTION TO DISPLAY SPLASH SCREEN
	*
	*/
	public function createCategory()
	{
		//Collect user input
		$records=Input::all();	
		$cat_name=array_get($records, 'category');
		$cat_desc=array_get($records, 'description');		

		$cats=new Category;
		$cats->name=$cat_name;
		$cats->description=$cat_desc;
		$cats->save();
		return Redirect::back()->withMessage('Category created successfully.');
	}

}
