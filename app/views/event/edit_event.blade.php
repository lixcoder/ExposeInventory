@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Events <small>Edit Events</small>
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
								Edit Events
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
				 <h3>Update Event</h3>
				 <hr>
				 @if(isset($events))
				<form role="form" method="POST" action="{{{ URL::to('event/view_event/update') }}}">
						<fieldset>
					        <div class="form-group">
							<label class="">Event Name: </label>
							<input class="form-control" type="text" name="eventname" value="{{$events['name']}}" required>
						</div>
						<div class="form-group">
							<label for="username"> Start Date</label>
							<div id-="container">	                        
							    <input type="text" class="form-control" id="datepicker" name="start_date"  readonly="readonly" value="{{$events['start_date']}}">							    
							</div>
						</div>	
						<div class="form-group">
							<label for="username"> End Date</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker2" readonly="readonly" type="text" name="end_date" value="{{$events['end_date']}}"/>
                        	</div>							
						</div>	
						<!--START VERBOTEN -->	
						<input type="hidden" name="event_id" value="{{$events['id']}}">								
						<!--END VERBOTEN -->	
						<div class="form-group">
							<label class="">Technical Lead: </label>
							<input class="form-control" type="text" name="tech_lead"  value="{{$events['technical_lead']}}" required>
						</div>									               
				        <div class="form-group">					        
				          <button type="submit" class="btn btn-primary btn-sm">Update Event</button>
				        </div>

					    </fieldset>
					</form>
					@endif
				</div>
			</div>
			<!--END CONTENT-->
		</div>
	</div>
@include('includes.footer')