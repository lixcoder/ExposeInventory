@extends('includes.report')
@section('report_title')
{{'Checkout Report'}} From:{{$periodfrom}}  To:{{$periodto}}
@endsection
@section('report_content')
<?php $count=1;?>
 @if(isset($checks) && count($checks)>0)
<table>
    <thead>
      <tr>
        <th>#</th>        
        <th>Item Name</th>
        <th>Client Name</th>        
        <th>Date Out</th>
        <th>Checked Out By</th>
        <th>Date In</th>
        <th>Checked In By</th>        
      </tr>
    </thead>
    <tbody>
    @foreach($checks as $check)
		<?php   
       $item_name=$check->item_name;
  	   $client_name=$check->client_name;
  	   $date_out=$check->date_out;
  	   $checked_out_by=$check->checked_out_by;							  
  	   $date_in=$check->date_in;
  	   $checked_in_by=$check->checked_in_by;	   	  	   		   					
	 ?>  				
      <tr>
        <td>{{$count}}</td>
        <td>{{$item_name}}</td>
        <td>{{$client_name}}</td>        
        <td>{{$date_out}}</td>
        <td>{{$checked_out_by}}</td>
        <td>{{$date_in}}</td>
        <td>{{$checked_in_by}}</td>            
      </tr> 
      <?php $count++;?>
	@endforeach  
	@endif   
    </tbody>    
  </table>

@endsection
