@extends('includes.report')
@section('report_title')
{{'Maintenance Report'}} From:{{$periodfrom}}  To:{{$periodto}}
@endsection
@section('report_content')
<?php $count=1;?>
 @if(isset($maintains) && count($maintains)>0)
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
    @foreach($maintains as $maintain)
		<?php   
       $item_name=$maintain->asset_name;
  	   $test_performed=$maintain->test_performed;
  	   $date_performed=$maintain->date_performed;
  	   $outcome=$maintain->outcome;							    	     	  	   		   				
	   ?>  				
      <tr>
        <td>{{$count}}</td>
        <td>{{$item_name}}</td>
        <td>{{$test_performed}}</td>        
        <td>{{$date_performed}}</td>
        <td>{{$outcome}}</td>                
      </tr> 
      <?php $count++;?>
	@endforeach  
	@endif   
    </tbody>    
  </table>

@endsection
