<?php

class SearchController extends BaseController {
	/**
	*FUNCTION TO DISPLAY NEW BOOKINGS PAGE
	*
	*/
	public function performSearch()
	{
		return View::make('home.search');
	}	
}
