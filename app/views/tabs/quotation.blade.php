<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="portlet gray box">
			<div class="portlet-title">
				<div class="caption">
					<!--<i class="fa fa-c"></i>
					<small>Quotations</small>-->
					<a href="{{{ URL::to('orders/quotation/create/'.$events['id']) }}}" class="btn btn-sm btn-primary">New Quote</a>
				</div>														
			</div>													
			<div class="portlet-body">
			<div class="table-responsive">
		        <?php $count=1;?>
		        @if(isset($assets) && count($assets)>0)
		        <form action="manage_event" method="POST">
				  <table id="viewdata" class="table table-striped table-bordered">
	      			<thead>
				        <th>#</th>					      
				        <th>Order Number</th>					        
				        <th>Event ID</th>
				        <th>Date</th>	
				        <th>Status</th>
				        <th>Action</th>	    
			      </thead>
    					<tbody>
    					@foreach($quotations as $quote)
      					<tr>
      					<td>{{ $count }}</td>	      				
      					<td>{{ $quote->order_number }}</td>	      					
      					<td>{{ $quote->event_id }}</td>
      					<td>{{ $quote->date }}</td>
      					<td>{{ $quote->status }}</td>
      					<td>
      						<a href="{{ URL::to('orders/quotation/view/'.$quote->id) }}" class="btn btn-info btn-sm">View</a>&emsp;
      						<a href="" class="btn btn-primary btn-sm">Mail</a>&emsp;
      						<a href="" class="btn btn-danger btn-sm">Cancel</a>
      					</td>
      					<?php $count++;?>
      				@endforeach
    					</tbody>
    				</table>
    				@if(isset($events))
    				<input type="hidden" name="event_id" value="{{$events['id']}}"/> @endif
    				</form>    				
    				@endif      				
    				</div>										      				
			</div>
		</div>
	</div>			
</div>	