
@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Bookings <small>Record Bookings</small>
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
								Record Bookings
							</a>
						</li>						
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>			
			<!-- END PAGE HEADER-->
			<div>				
			<?php $message = Session::get('message');?>
				@if(isset($message))
				<div class="alert alert-success alert-dismissible fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				  <strong>{{$message}}</strong>	
				</div>						
				@endif				
			</div>		
			<div class="row">			
			 <div class="col-md-4 col-md-offset-1 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				 <h3>New Booking</h3>
				 <hr>
				<form role="form" method="POST" action="{{{ URL::to('/new_booking') }}}">
					   @if(isset($events))						
						<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
						<div class="form-group">
							<label for="type">Event Name:</label>
							<select name="event" class="form-control" required>
								@foreach($events as $event)								
									<option value="{{$event['id']}}">{{$event['name']}}</option>					
								@endforeach							
							</select>
						</div>						
						@endif			
						@if(isset($assets))												
						<div class="form-group">
							<label for="type">Item:</label>
							<select name="item" class="form-control" required>
								@foreach($assets as $asset)								
									<option value="{{$asset['id']}}">{{$asset['name']}}</option>					
								@endforeach							
							</select>
						</div>						
						@endif								
						@if(isset($assets))					
						<div class="form-group">
							<label for="type">Client:</label>
							<select name="client" class="form-control" required>
							@foreach($clients as $client)								
								<option value="{{$client['id']}}">{{$client['client_name']}}</option>
							@endforeach							
							</select>
						</div>	
						@endif		
						<div class="form-group">
							<label class="">Event Venue: </label>
							<input class="form-control" type="text" name="eventvenue" value="" required>
						</div>																			
						<div class="form-group text-left">
							<input class="btn btn-primary" type="submit" name="btn-register" value="Record Booking">
						</div>
					</form>
				</div>
			</div>
			<!--END CONTENT-->
		</div>
	</div>
@include('includes.footer')