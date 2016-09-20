@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Bookings <small>View Bookings</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="{{{ URL::to('/') }}}">
								Home
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="{{{ URL::to('#') }}}">
								Bookings
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="{{{ URL::to('#') }}}">
								View Bookings
							</a>
						</li>						
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>			
			<!-- END PAGE HEADER-->
			<!--START CONTENT-->
			<div>				
				<?php $message = Session::get('message');?>
					@if(isset($message))
					<div class="alert alert-info alert-dismissible fade in" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					  <strong>{{$message}}</strong>	
					</div>						
					@endif	

				<?php $alert = Session::get('alert');?>
					@if(isset($alert))
					<div class="alert alert-danger alert-dismissible fade in" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					  <strong>{{$alert}}</s
					  trong>	
					</div>						
					@endif						
			</div>		
			<div class="row">
			 <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default">
			      	<div class="panel-heading">
			          <a class="btn btn-info btn-sm" href="{{{ URL::to('/new_booking') }}}">New Booking</a>	         
			        </div>			       
			        <div class="panel-body">
			        <div class="table-responsive">
			        <?php $count=1;?>
			        @if(isset($books) && count($books)>0)
			        <form action="booking/view_booking" method="POST">
					  <table id="viewdata" class="table table-striped table-bordered">
		      			<thead>
					        <th>#</th>					      
					        <th>Item Name</th>					        
					        <th>Client Name</th>
					        <th>Event Name</th>	
					        <th>Start Date</th>
					        <th>End Date</th>
					        <th>Technical Lead</th>
					        <th>Manage</th>
					        <th>Edit</th>	
					        <th>Delete</th>				    
				      </thead>
      					<tbody>
      					@foreach($books as $book)    
      						<?php   
						       $item_name=$book->item_name;
							   $event_name=$book->event_name;
							   $event_start=$book->event_start;
							   $event_end=$book->event_end;							  
							   $tech_lead=$book->tech_lead;
							   $client_name=$book->client_name;
							   $client_id=$book->client_id;
							   $book_id=$book->id;
							   $event_venue=$book->event_venue;
							   $asset_id=$book->asset_id;
							   $event_id=$book->event_id;
							 ?>  					
	      					<tr>
	      					<td>{{$count}}</td>	      				
	      					<td>{{$item_name}}</td>	      					
	      					<td>{{$client_name}}</td>
	      					<td>{{$event_name}}</td>
	      					<td>{{$event_start}}</td>
	      					<td>{{$event_end}}</td>
	      					<td>{{$tech_lead}}</td>
	      					<input type="hidden" name="book_id" value="{{$book_id}}"/>
	      					<input type="hidden" name="client_id" value="{{$client_id}}"/>
	      					<input type="hidden" name="asset_id" value="{{$asset_id}}"/>
	      					<input type="hidden" name="event_id" value="{{$event_id}}"/>
	      					<input type="hidden" name="client_name" value="{{$client_name}}"/>
	      					<input type="hidden" name="item_name" value="{{$item_name}}"/>
	      					<input type="hidden" name="event_venue" value="{{$event_venue}}"/>
	      					<input type="hidden" name="event_name" value="{{$event_name}}"/>
	      					<input type="hidden" name="event_start" value="{{$event_start}}"/>
	      					<input type="hidden" name="event_end" value="{{$event_end}}"/>
	      					<input type="hidden" name="tech_lead" value="{{$tech_lead}}"/>
	      					<td><a class="btn btn-success" href="{{{ URL::to('/view_booking/manage/'.$book_id) }}}">Manage</a></td>
	      					<td><button class="btn btn-primary btn-sm">Edit</button></td>
	      					<td><a class="btn btn-danger" href="{{{ URL::to('/view_booking/delete/'.$book_id) }}}">Delete</a></td>
	      					</tr>
	      					<?php $count++;?>
	      				@endforeach
      					</tbody>
      				</table>  
      				</form>    				
      				@endif      				
      				</div>
			      </div>
			      </div>			   
			     </div>
			</div>
			<!--END CONTENT-->
		</div>
	</div>
@include('includes.footer')