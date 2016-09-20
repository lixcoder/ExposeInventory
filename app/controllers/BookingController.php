<?php

class BookingController extends BaseController {
	/**
	*FUNCTION TO DISPLAY NEW BOOKINGS PAGE
	*
	*/
	public function recordBooking()
	{
		$assets=Asset::all();
		$clients=Client::all();		
		$events=Occasion::all();
		return View::make('booking.new_booking',compact('assets','clients','events'));
	}
	/**
	*FUNCTION TO DISPLAY EDIT BOOKINGS PAGE
	*
	*/
	public function editBooking()
	{	
		$id=Input::get('book_id');
		$event_name=Input::get('event_name');
		$event_start=Input::get('event_start');
		$event_end=Input::get('event_end');
		$tech_lead=Input::get('tech_lead');
		$client_id=Input::get('client_id');
		$client_name=Input::get('client_name');
		$event_venue=Input::get('event_venue');
		$item_name=Input::get('item_name');
		$book_id=Input::get('book_id');
		$asset_id=Input::get('asset_id');
		$event_id=Input::get('event_id');
		return View::make('booking.edit_booking',compact('event_name','event_start','event_end','tech_lead',
			'client_name','client_id','event_venue','item_name','book_id','asset_id','event_id'));
	}
	/**
	*FUNCTION TO DISPLAY VIEW BOOKINGS PAGE
	*
	*/
	public function viewBooking()
	{
		$books=DB::table('bookings')
				->join('clients','bookings.client_id','=','clients.id')
				->join('assets','bookings.asset_id','=','assets.id')
				->join('events','bookings.event_id','=','events.id')
				->select('events.id as event_id','assets.id as asset_id','bookings.event_venue as event_venue','clients.client_name as client_name','clients.id as client_id','bookings.id as id','assets.name as item_name','events.name as event_name','events.start_date as event_start', 'events.end_date as event_end','events.technical_lead as tech_lead')			
				->get();				
		return View::make('booking.view_booking',compact('books'));
	}
	/**
	*FUNCTION TO UPDATE A BOOKING
	*
	*/
	public function updateBooking()
	{
		//Collect user input
		$records=Input::all();	
		$event_id=array_get($records, 'event_id');
		$book_id=array_get($records, 'book_id');
		$asset_id=array_get($records, 'asset_id');
		$client_id=array_get($records, 'client_id');
		$item_name=array_get($records, 'item');
		$event_name=array_get($records, 'eventname');
		$start_date=array_get($records, 'start_date');
		$end_date=array_get($records, 'end_date');
		$client=array_get($records, 'client');
		$event_venue=array_get($records, 'eventvenue');
		$tech_lead=array_get($records, 'tech_lead');		

		//Set Default Timezoe
		date_default_timezone_set('Africa/Nairobi');	
			
		//Insert into events table
		$event=Occasion::where('id','=',$event_id)->first();
		$event->name=$event_name;
		$event->start_date=$start_date;
		$event->end_date=$end_date;
		$event->technical_lead=$tech_lead;		
		$event->save();		

		//Insert data into bookings table
		$book=Booking::where('id','=',$book_id)->first();;
		$book->asset_id=$asset_id;
		$book->event_id=$event_id;
		$book->event_venue=$event_venue;
		$book->client_id=$client_id;
		$book->save();

		//Redirect Back with a message
		return Redirect::action('BookingController@viewBooking')->withMessage('Booking details successfully Updated');
	}
	public function createBooking(){
		//Collect user input
		$records=Input::all();		
		$item_name=array_get($records, 'item');
		$event_id=array_get($records,'event');
		$event_name=array_get($records, 'eventname');
		$start_date=array_get($records, 'start_date');
		$end_date=array_get($records, 'end_date');
		$client=array_get($records, 'client');
		$event_venue=array_get($records, 'eventvenue');
		$tech_lead=array_get($records, 'tech_lead');		

		//Set Default Timezoe
		date_default_timezone_set('Africa/Nairobi');			

		//Insert data into bookings table
		$book=new Booking;
		$book->asset_id=$item_name;
		$book->event_id=$event_id;
		$book->event_venue=$event_venue;
		$book->client_id=$client;
		$book->save();

		//Redirect Back with a message
		return Redirect::back()->with('message','The Booking details successfully created.');
	}

	public function trashBooking($id){
		Booking::destroy($id);
		return Redirect::back()->withAlert("Booking record has been deleted");
	}

	public function manageBooking($id){
		$assets=DB::table('bookings')				
				->join('assets','bookings.asset_id','assets.id')
				->join('events','bookings.event_id','events.id')
				->select('events.name as event_name','events.start_date as start_date','events.end_date as end_date','assets.name as name','assets.description as description','assets.store as store')				
				->get();
				//dd($assets);
		return View::make('booking.manage_booking',compact('assets'));
	}
}
