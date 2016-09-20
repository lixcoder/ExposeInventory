<?php

class HomeController extends BaseController {
	/**
	*FUNCTION TO DISPLAY SPLASH SCREEN
	*
	*/
	public function splashScreen()
	{
		$assets=Asset::count('id');
		$clientele=Client::count('id');
		$maintains=Checkout::count('id');
		$books=Booking::count('id');
		return View::make('home.dashboard',compact('assets','clientele','maintains','books'));
	}

}
