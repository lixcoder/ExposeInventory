<?php

class ReportsController extends BaseController {
/**
*FUNCTION TO DISPLAY REPORTS PAGE
*
*/
public function curtainReport(){
	return View::make('inventoryreport.assets_report');
}
/**
*FUNCTION TO BOOKINGS REPORTS PAGE
*
*/
public function bookingReport(){
	return View::make('inventoryreport.bookings_report');
}
/**
*FUNCTION TO STREAM BOKING REPORTS PAGE WITH DOMPDF
*
*/
public function viewBookingReport(){
	$records=Input::all();
	$periodfrom=array_get($records,'period_from');
	$periodto=array_get($records,'period_to');
	$books=DB::table('bookings')				
				->join('assets','bookings.asset_id','=','assets.id')
				->join('events','bookings.event_id','=','events.id')
				->select('events.id as event_id','assets.id as asset_id','bookings.event_venue as event_venue','bookings.id as id','assets.name as item_name','events.name as event_name','events.start_date as event_start', 'events.end_date as event_end','events.technical_lead as tech_lead')	
				->where('events.start_date','>=',$periodfrom)
				->where('events.end_date','<=',$periodto)
				->get();
	if(empty($books)){
		return Redirect::back()->withAlert('The selected duration has no records to view.');
	}else{
		$pdf = PDF::loadView('pdf.viewBookingReport', compact('books','periodfrom','periodto'));
		return $pdf->download('bookingReport.pdf');	
	}	
	//return View::make('inventoryreport.bookings_report','');
}
/**
*FUNCTION TO DISPLAY CHECKOUTS REPORTS PAGE
*
*/
public function checkoutReport(){
	return View::make('inventoryreport.checkouts_report');
}
/**
*FUNCTION TO STREAM CHECKOUT REPORTS PAGE WITH DOMPDF
*
*/
public function viewCheckoutReport(){
	$records=Input::all();
	$periodfrom=array_get($records,'period_from');
	$periodto=array_get($records,'period_to');
	$checks=DB::table('checkouts')				
				->join('assets','checkouts.asset_id','=','assets.id')				
				->select('assets.id as asset_id','checkouts.id as id','assets.name as item_name','checkouts.date_out as date_out','checkouts.checked_out_by as checked_out_by')	
				->where('checkouts.date_out','>=',$periodfrom)
				->where('checkouts.date_out','<=',$periodto)		
				->get();	
	if(empty($checks)){
		return Redirect::back()->withAlert('The selected duration has no records to view.');
	}else{
		$pdf = PDF::loadView('pdf.viewCheckoutReport', compact('checks','periodfrom','periodto'));
		return $pdf->download('checkoutReport.pdf');	
	}	
	//return View::make('inventoryreport.bookings_report','');
}
/**
*FUNCTION TO DISPLAY EVENTS REPORTS PAGE
*
*/
public function eventReport(){
	return View::make('inventoryreport.events_report');
}
/**
*FUNCTION TO STREAM EVENTS REPORTS PAGE WITH DOMPDF
*
*/
public function viewEventReport(){
	$records=Input::all();
	$periodfrom=array_get($records,'period_from');
	$periodto=array_get($records,'period_to');
	$occasions=DB::table('bookings')
					->join('events','bookings.event_id','=','events.id')
					->join('assets','bookings.asset_id','=','assets.id')
					->select('events.name as event_name','events.start_date as start_date',
						'events.end_date as end_date','events.event_venue as event_venue',
						'events.technical_lead as tech_lead','assets.name as item_name',
						'assets.serial_number as serial')
					->where('events.start_date','>=',$periodfrom)
					->where('events.end_date','<=',$periodto)
					->get();					
			//return $maintains;
	if(empty($occasions)){
		return Redirect::back()->withAlert('The selected duration has no records to view.');
	}else{
		$pdf = PDF::loadView('pdf.viewEventReport', compact('occasions','periodfrom','periodto'));
		return $pdf->download('eventReport.pdf');	
	}	
	//return View::make('inventoryreport.bookings_report','');
}

/**
*FUNCTION TO DISPLAY MAINTENANCE REPORTS PAGE
*
*/
public function maintenanceReport(){
	return View::make('inventoryreport.maintenances_report');
}
/**
*FUNCTION TO STREAM MAINTENANCE REPORTS PAGE WITH DOMPDF
*
*/
public function viewMaintenanceReport(){
	$records=Input::all();
	$periodfrom=array_get($records,'period_from');
	$periodto=array_get($records,'period_to');
	$maintains=DB::table('maintenances')			
				->join('assets','maintenances.asset_id','=','assets.id')				
				->select('assets.name as asset_name','assets.id as asset_id','maintenances.id as id','maintenances.date_performed as date_performed','maintenances.outcome as outcome','maintenances.test_performed as test_performed')	
				->where('maintenances.date_performed','>=',$periodfrom)
				->where('maintenances.date_performed','<=',$periodto)		
				->get();	
			//return $maintains;
	if(empty($maintains)){
		return Redirect::back()->withAlert('The selected duration has no records to view.');
	}else{
		$pdf = PDF::loadView('pdf.viewMaintenanceReport', compact('maintains','periodfrom','periodto'));
		return $pdf->download('maintenanceReport.pdf');	
	}	
	//return View::make('inventoryreport.bookings_report','');
}

}