<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="portlet gray box">
			<div class="portlet-title">
				<div class="caption">
					<!--<i class="fa fa-c"></i>
					<small>Quotations</small>-->
					<a href="{{{ URL::to('orders/quotation/create') }}}" class="btn btn-sm btn-primary">New Quote</a>
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
				        <th>Event</th>
				        <th>Date</th>	
				        <th>Action</th>	    
			      </thead>
    					<tbody>
    					@foreach($assets as $asset)
      					<tr>
      					<td>{{$count}}</td>	      				
      					<td>{{$asset['name']}}</td>	      					
      					<td>{{$asset['description']}}</td>
      					<td>{{$asset['store']}}</td>
      					<input type="hidden" name="asset_id" value="{{$asset['id']}}"/>
      					<td><button class="btn btn-warning btn-sm">Pick</button></td>
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