@extends('includes.report')
@section('report_title')
{{'Booking Report'}} From:{{$periodfrom}}  To:{{$periodto}}
@endsection
@section('report_content')
<?php $count=1;?>
 @if(isset($books) && count($books)>0)
<table>
    <thead>
      <tr>
        <th>#</th>
        <th>Client Name</th>
        <th>Item Name</th>
        <th>Event Name</th>
        <th>Event Venue</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Technical Lead</th>
      </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
		<?php   
       $item_name=$book->item_name;
	   $event_name=$book->event_name;
	   $event_venue=$book->event_venue;
	   $start_date=$book->event_start;							  
	   $end_date=$book->event_end;
	   $tech_lead=$book->tech_lead;	   	
	   $client_name=$book->client_name;			   						
	 ?>  				
      <tr>
        <td>{{$count}}</td>
        <td>{{$client_name}}</td>
        <td>{{$item_name}}</td>
        <td>{{$event_name}}</td>
        <td>{{$event_venue}}</td>
        <td>{{$start_date}}</td>
        <td>{{$end_date}}</td>
        <td>{{$tech_lead}}</td>        
      </tr> 
      <?php $count++;?>
	@endforeach  
	@endif   
    </tbody>    
  </table>

@endsection
