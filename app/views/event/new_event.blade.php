@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Events <small>Create an Event</small>
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
								Events
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="{{{ URL::to('#') }}}">
								Create Events
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
			<!--START CONTENT-->
			<div class="row">
			 <div class="col-md-4 col-md-offset-1 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				 <h3>New Event</h3>
				 <hr>
				<form role="form" method="POST" action="{{{ URL::to('/new_event') }}}">
						<fieldset>
					        <div class="form-group">
							<label class="">Event Name: </label>
							<input class="form-control" type="text" name="eventname" value="" required>
						</div>
						<div class="form-group">
							<label for="username"> Start Date</label>
							<div id-="container">	                        
							    <input type="text" class="form-control" id="datepicker" name="start_date"  readonly="readonly">							    
							</div>
						</div>	
						<div class="form-group">
							<label for="username"> End Date</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker2" readonly="readonly" type="text" name="end_date"/>
                        	</div>							
						</div>	
						<div class="form-group">
							<label class="">Event Venue: </label>
							<input class="form-control" type="text" name="eventvenue" value="" required>
						</div>																
						<div class="form-group">
							<label class="">Technical Lead: </label>
							<input class="form-control" type="text" name="tech_lead" value="" required>
						</div>									               
				        <div class="form-group">					        
				          <button type="submit" class="btn btn-primary btn-sm">Create Event</button>
				        </div>

					    </fieldset>
					</form>
				</div>
			</div>
			<!--END CONTENT-->					
			</div>
			<!--END CONTENT-->
		</div>
	</div>
@include('includes.footer')