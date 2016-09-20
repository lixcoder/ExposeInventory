@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Assets <small>View Assets</small>
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
								Assets
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="{{{ URL::to('#') }}}">
								View Assets
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
			          <a class="btn btn-info btn-sm" href="{{{ URL::to('/new_asset') }}}">New Asset</a>&emsp;		         
			        </div>			       
			        <div class="panel-body">
			        <div class="table-responsive">
			        <?php $count=1;?>
			        @if(isset($assets) && count($assets)>0)
			        <form action="asset/view_asset" method="POST">
					  <table id="viewdata" class="table table-striped table-bordered">
		      			<thead>
					        <th>#</th>					      
					        <th>Name</th>					        
					        <th>Description</th>
					        <th>Store</th>	
					        <th>Edit</th>	
					        <th>Delete</th>				    
				      </thead>
      					<tbody>
      					@foreach($assets as $asset)
	      					<tr>
	      					<td>{{$count}}</td>	      				
	      					<td>{{$asset['name']}}</td>	      					
	      					<td>{{$asset['description']}}</td>
	      					<td>{{$asset['store']}}</td>
	      					<input type="hidden" name="asset_id" value="{{$asset['id']}}"/>
	      					<td><button class="btn btn-primary">Edit</button></td>
	      					<td><a class="btn btn-danger" href="{{{ URL::to('/view_asset/delete/'.$asset['id']) }}}">Delete</a></td>
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