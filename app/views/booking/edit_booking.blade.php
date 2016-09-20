@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Bookings <small>Edit Bookings</small>
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
								Edit Bookings
							</a>
						</li>						
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>			
			<!-- END PAGE HEADER-->
			<!--START CONTENT-->
			<div class="row">
				<div class="col-md-4 col-md-offset-1 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				 <h3>Update Booking</h3>
				 <hr>
				<form role="form" method="POST" action="{{{ URL::to('booking/view_booking/update') }}}">
						<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
						<div class="form-group">
							<label for="type">Item:</label>
							<select name="item" class="form-control" readonly="readonly">								
									<option value="{{$asset_id}}">{{$item_name}}</option>						
							</select>
						</div>												
						<div class="form-group">
							<label class="">Event Name: </label>
							<input class="form-control" type="text" name="eventname" value="{{$event_name}}" required>
						</div>
						<div class="form-group">
							<label for="username"> Start Date</label>
							<div id-="container">	                        
							    <input type="text" class="form-control" id="datepicker" name="start_date" value="{{$event_start}}"  readonly="readonly">							    
							</div>
						</div>	
						<div class="form-group">
							<label for="username"> End Date</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker2" readonly="readonly" type="text" name="end_date" value="{{$event_end}}"/>
                        	</div>							
						</div>	
						<!--START HIDDEN VALUES -->
							<input type="hidden" name="book_id" value="{{$book_id}}"/>
	      					<input type="hidden" name="client_id" value="{{$client_id}}"/>
	      					<input type="hidden" name="asset_id" value="{{$asset_id}}"/>
	      					<input type="hidden" name="event_id" value="{{$event_id}}"/>
	      				<!--END HIDDEN VALUES -->
						<div class="form-group">
							<label for="type">Client:</label>
							<select name="client" class="form-control" readonly="readonly">								
								<option value="{{$client_id}}">{{$client_name}}</option>							
							</select>
						</div>						
						<div class="form-group">
							<label class="">Event Venue: </label>
							<input class="form-control" type="text" name="eventvenue" value="{{$event_venue}}" required>
						</div>																
						<div class="form-group">
							<label class="">Technical Lead: </label>
							<input class="form-control" type="text" name="tech_lead" value="{{$tech_lead}}" required>
						</div>																		
						<div class="form-group text-left">
							<input class="btn btn-primary" type="submit" name="btn-register" value="Update Booking">
						</div>
					</form>
				</div>
			</div>
			<!--END CONTENT-->
		</div>
	</div>
@include('includes.footer')