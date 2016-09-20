@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Checkout <small>View Checkout</small>
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
								Checkouts
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="{{{ URL::to('#') }}}">
								View Checkouts
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
			          <a class="btn btn-info btn-sm" href="{{{ URL::to('/new_checkout') }}}">New Checkout</a>&emsp;		         
			        </div>			       
			        <div class="panel-body">
			        <div class="table-responsive">
			        <?php $count=1;?>
			        @if(isset($checks) && count($checks)>0)
			        <form action="checkout/view_checkout" method="POST">
					  <table id="viewdata" class="table table-striped table-bordered">
		      			<thead>
					        <th>#</th>					      
					        <th>Item Name</th>					        
					        <th>Client Name</th>
					        <th>Date Out</th>
					        <th>Checked Out By</th>	
					        <th>Date Back</th>
					        <th>Checked In By</th>
					        <th>Edit</th>	
					        <th>Delete</th>				    
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
							   $check_id=$check->id;	
							   $date_expected_out=$check->date_expected_out;
							   $date_expected_in=$check->date_expected_in;	
							   $asset_id=$check->asset_id;		
							   $client_id=$check->client_id;			   						
							 ?>  				
	      					<tr>
	      					<td>{{$count}}</td>	      				
	      					<td>{{$item_name}}</td>	      					
	      					<td>{{$client_name}}</td>
	      					<td>{{$date_out}}</td>
	      					<td>{{$checked_out_by}}</td>
	      					<td>{{$date_in}}</td>
	      					<td>{{$checked_in_by}}</td>
	      					<!--START VERBOTEN-->
	      					<input type="hidden" name="check_id" value="{{$check_id}}"/>
	      					<input type="hidden" name="client_id" value="{{$client_id}}"/>
	      					<input type="hidden" name="asset_id" value="{{$asset_id}}"/>
	      					<input type="hidden" name="client_name" value="{{$client_name}}"/>
	      					<input type="hidden" name="item_name" value="{{$item_name}}"/>
	      					<input type="hidden" name="date_expected_out" value="{{$date_expected_out}}"/>
	      					<input type="hidden" name="date_expected_in" value="{{$date_expected_in}}"/>
	      					<input type="hidden" name="date_out" value="{{$date_out}}"/>
	      					<input type="hidden" name="date_in" value="{{$date_in}}"/>
	      					<input type="hidden" name="checked_out_by" value="{{$checked_out_by}}"/>
	      					<input type="hidden" name="checked_in_by" value="{{$checked_in_by}}"/>	      				
	      					<!--END VERBOTEN-->	      					
	      					<td><button class="btn btn-primary">Edit</button></td>
	      					<td><a class="btn btn-danger" href="{{{ URL::to('/view_checkout/delete/'.$check_id) }}}">Delete</a></td>
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