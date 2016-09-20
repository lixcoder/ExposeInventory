@extends('includes.report')
@section('report_title')
{{'Event Report'}} From:{{$periodfrom}}  To:{{$periodto}}
@endsection
@section('report_content')
<?php $count=1;?>
 @if(isset($occasions) && count($occasions)>0)
<table>
    <thead>
      <tr>
        <th>#</th>        
        <th>Item Name</th>
        <th>Test Performed</th>        
        <th>Date Performed</th>
        <th>Test Outcome</th>              
      </tr>
    </thead>
    <tbody>
    @foreach($occasions as $event)
		<?php   
       $event_name=$event->name;
  	   $start_date=$event->start_date;
  	   $end_date=$event->end_date;
  	   $tech_lead=$event->technical_lead;							    	     	  	   		   				
	   ?>  				
      <tr>
        <td>{{$count}}</td>
        <td>{{$event_name}}</td>
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
