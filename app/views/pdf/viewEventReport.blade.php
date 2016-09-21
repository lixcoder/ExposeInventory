@extends('includes.report')
@section('report_title')
{{'Events Report'}}  As From: {{$periodfrom}}  To: {{$periodto}}
@endsection
@section('report_content')
<?php $count=1;?>
 @if(isset($occasions) && count($occasions)>0)
<table>
    <thead>
      <tr>  
        <th>#</th>          
        <th style="padding-left:20px;">Event Details</th>
        <th style="padding-left:20px;">Start Date</th>        
        <th style="padding-left:20px;">End Date</th>
        <th style="padding-left:20px;">Event Items</th>              
      </tr>
    </thead>
    <tbody>
    @foreach($occasions as $event)
		<?php   
       $event_name=$event->event_name;
  	   $start_date=$event->start_date;
  	   $end_date=$event->end_date;
  	   $tech_lead=$event->tech_lead;	
       $serial=$event->serial;
       $item_name=$event->item_name;
       $event_venue=$event->event_venue;						    	     	  	   		   				
	   ?>  				
      <tr> 
      <td>{{$count}}</td>       
        <td>                
          <ol>
            <li>Name: {{$event_name}}</li>
            <li>Venue :{{$event_venue}}</li>
            <li>Tech. Lead :{{$tech_lead}}</li>          
          </ol>
        </td>
        <td>{{$start_date}}</td>        
        <td>{{$end_date}}</td>
        <td>          
            <p>{{$item_name}}: <strong>{{$serial}}</strong></p>                  
        </td>                
      </tr> 
      <?php $count++;?>
	@endforeach  
	@endif   
    </tbody>    
  </table>
  <br>
  <br>
  Comments:
  <br>
  <br>
  <hr>
  <br>
  <br>
  <hr>  
  <br>

@endsection
