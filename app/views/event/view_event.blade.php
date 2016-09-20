@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Events <small>View Events</small>
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
								View Events
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
			          <a class="btn btn-info btn-sm" href="{{{ URL::to('/new_event') }}}">New Event</a>	         
			        </div>			       
			        <div class="panel-body">
			        <div class="table-responsive">
			        <?php $count=1;?>
			        @if(isset($events) && count($events)>0)
			        <form action="event/view_event" method="POST">
					  <table id="viewdata" class="table table-striped table-bordered">
		      			<thead>
					        <th>#</th>					      
					        <th>Name</th>					        
					        <th>Start Date</th>
					        <th>End Date</th>	
					        <th>Technical Lead</th>	
					        <th>Manage</th>				        
					        <th>Edit</th>	
					        <th>Delete</th>				    
				      </thead>
      					<tbody>
      					@foreach($events as $event)
	      					<tr>
	      					<td>{{$count}}</td>	      				
	      					<td>{{$event['name']}}</td>	      					
	      					<td>{{$event['start_date']}}</td>
	      					<td>{{$event['end_date']}}</td>
	      					<td>{{$event['technical_lead']}}</td>	      				
	      					<input type="hidden" name="event_id" value="{{$event['id']}}"/>
	      					<td><a class="btn btn-success" href="{{{ URL::to('/view_event/manage/'.$event['id']) }}}">Manage</a></td>
	      					<td><button class="btn btn-primary btn-sm">Edit</button></td>
	      					<td><a class="btn btn-danger" href="{{{ URL::to('/view_event/delete/'.$event['id']) }}}">Delete</a></td>
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