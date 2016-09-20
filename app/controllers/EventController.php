<?php

class EventController extends BaseController {
	/**
	*FUNCTION TO DISPLAY NEW CLIENTS PAGE
	*
	*/
	public function recordEvent()
	{
		return View::make('event.new_event');
	}
	/**
	*FUNCTION TO DISPLAY EDIT CLIENTS PAGE
	*
	*/
	public function editEvent()
	{
		$id=Input::get('event_id');
		$events=Occasion::findOrFail($id);		
		if(count($events)<1){
			return Redirect::action('EventController@viewEvent');
		}else{
			return View::make('event.edit_event',compact('events'));
		}				
	}
	/**
	*FUNCTION UPDATE CLIENT DETAILS
	*
	*/
	public function updateEvent(){
		$records=Input::all();	
		$event_id=array_get($records,'event_id');
		$event_name=array_get($records, 'eventname');
		$start_date=array_get($records, 'start_date');
		$end_date=array_get($records, 'end_date');		
		$tech_lead=array_get($records, 'tech_lead');	

		$event_to_update=Occasion::where('id','=',$event_id)->first();		
		$event_to_update->name=$event_name;
		$event_to_update->start_date=$start_date;
		$event_to_update->end_date=$end_date;		
		$event_to_update->technical_lead=$tech_lead;		
		$event_to_update->save();		

		return Redirect::action('EventController@viewEvent')->withMessage('Event details successfully updated');
	}
	/**
	*FUNCTION TO THROW A CLIENT TO TRASH
	*
	*/
	public function trashEvent($id){
		Occasion::destroy($id);
		return Redirect::back()->withAlert("The event record has been successfully deleted");
	}

	/**
	*FUNCTION TO DISPLAY VIEW CLIENTS PAGE
	*
	*/
	public function viewEvent()
	{
		$events=Occasion::all();
		return View::make('event.view_event',compact('events'));
	}

	public function createEvent()
	{
		$records=Input::all();					
		$event_name=array_get($records, 'eventname');
		$start_date=array_get($records, 'start_date');
		$end_date=array_get($records, 'end_date');		
		$tech_lead=array_get($records, 'tech_lead');	
		$venue=array_get($records,'eventvenue');

		$event=new Occasion;
		$event->name=$event_name;
		$event->start_date=$start_date;
		$event->end_date=$end_date;	
		$event->event_venue=$venue;	
		$event->technical_lead=$tech_lead;		
		$event->save();		
		
		return Redirect::back()->with('message','The event records successfully created.');
	}
	/**
	*FUNCTION TO DISPLAY MANAGE EVENTS PAGE
	*
	*/
	public function manageEvent($id)
	{		
		$events=Occasion::findOrFail($id);	
		$assets=Asset::all();	
		return View::make('event.manage_event',compact('events','assets'));			
	}
	/**
	*FUNCTION TO ADD ITEMS TO AN EVENT
	*
	*/
	public function pickEventItem(){
		//Collect user input
		$records=Input::all();		
		$item_name=array_get($records, 'asset');
		$event_id=array_get($records,'event_id');		
		$start_date=array_get($records, 'start_date');
		$end_date=array_get($records, 'end_date');		
		$event_venue=array_get($records, 'eventvenue');			

		//Set Default Timezone
		date_default_timezone_set('Africa/Nairobi');			

		//Insert data into bookings table
		$book=new Booking;
		$book->asset_id=$item_name;
		$book->event_id=$event_id;
		$book->event_venue=$event_venue;
		$book->start_date=$start_date;
		$book->end_date=$end_date;
		$book->save();

		//Redirect Back with a message
		return Redirect::back()->with('message','Item Booked.');
		}				
}
