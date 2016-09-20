@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Maintenance <small>View Maintenance</small>
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
								Maintenance
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="{{{ URL::to('#') }}}">
								View Maintenance
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
					  <strong>{{$alert}}</strong>	
					</div>						
					@endif				
			</div>		
			<!--START CONTENT-->
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default">
			      	<div class="panel-heading">
			          <a class="btn btn-info btn-sm" href="{{{ URL::to('/new_maintenance') }}}">New Maintenance</a>		
			        </div>			       
			        <div class="panel-body">
			        <div class="table-responsive">
			        <?php $count=1;?>
			        @if(isset($maintains) && count($maintains)>0)
			        <form action="maintenance/view_maintenance" method="POST">
					  <table id="viewdata" class="table table-striped table-bordered">
		      			<thead>
					        <th>#</th>					      
					        <th>Item Name</th>					        
					        <th>Test Performed</th>
					        <th>Date Performed</th>
					        <th>Test Result</th>						        
					        <th>Edit</th>	
					        <th>Delete</th>				    
				      </thead>
      					<tbody>
      					@foreach($maintains as $maintain)
      						<?php   
						       $maintain_id=$maintain->id;
						       $item_name=$maintain->asset_name;
						       $asset_id=$maintain->asset_id;
							   $date_performed=$maintain->date_performed;
							   $test_performed=$maintain->test_performed;
							   $test_result=$maintain->outcome;			   		
							 ?>  				
	      					<tr>
	      					<td>{{$count}}</td>	      				
	      					<td>{{$item_name}}</td>	      					
	      					<td>{{$test_performed}}</td>
	      					<td>{{$date_performed}}</td>
	      					<td>{{$test_result}}</td>
	      					<!--START VERBOTEN-->
	      					<input type="hidden" name="maintain_id" value="{{$maintain_id}}"/>	      					
	      					<input type="hidden" name="asset_id" value="{{$asset_id}}"/>
	      					<input type="hidden" name="item_name" value="{{$item_name}}"/>	      	     				 
	      					<input type="hidden" name="date_performed" value="{{$date_performed}}"/>	      	  		
	      					<input type="hidden" name="test_performed" value="{{$test_performed}}"/>	      	     
	      					<input type="hidden" name="test_result" value="{{$test_result}}"/>	      	     			
	      					<!--END VERBOTEN-->	      					
	      					<td><button class="btn btn-primary">Edit</button></td>
	      					<td><a class="btn btn-danger" href="{{{ URL::to('/view_maintenance/delete/'.$maintain_id) }}}">Delete</a></td>
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