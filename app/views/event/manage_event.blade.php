@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Events <small>Manage Events</small>
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
								Manage Events
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
			<!--START CONTENT-->
			<div class="row">
				 <div class="col-md-12 col-sm-12 col-xs-12">
				 	<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
							
					<div class="portlet">
						@if(isset($events))		
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-calendar"></i>{{strtoupper($events['name'])}} &emsp;
								<span class="hidden-480">
									 |&emsp; START DATE: {{$events['start_date']}} &emsp;|&emsp; END DATE:{{$events['end_date']}} 
								</span>
							</div>							
						</div>
						@endif						
						</div>
						<div class="portlet-body">
							<div class="tabbable">
								<ul class="nav nav-tabs nav-tabs-lg">
									<li class="active">
										<a href="#tab_1" data-toggle="tab">
											 Items
										</a>
									</li>
									<li>
										<a href="#tab_2" data-toggle="tab">
											 Invoices
											<!--<span class="badge badge-success">
												 
											</span>-->
										</a>
									</li>
									<li>
										<a href="#tab_3" data-toggle="tab">
											  Quotations
										</a>
									</li>
									<li>
										<a href="#tab_4" data-toggle="tab">
											 Documents
											<!--<span class="badge badge-danger">
												 
											</span>-->
										</a>
									</li>									
								</ul>
								<div class="tab-content">
								<!--BEGIN TAB1 CONTENT -->
									<div class="tab-pane active" id="tab_1">
										<div class="row">
											<div class="col-md-12 col-sm-12">
												<div class="portlet blue box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-calendar"></i>
															Inventory Items: <small>Select event items</small>
														</div>														
													</div>													
													<div class="portlet-body">												<div class="table-responsive">
												        <?php $count=1;?>
												        @if(isset($assets) && count($assets)>0)
												        <form action="manage_event" method="POST">
														  <table id="viewdata" class="table table-striped table-bordered">
											      			<thead>
														        <th>#</th>					      
														        <th>Name</th>					        
														        <th>Description</th>
														        <th>Store</th>	
														        <th>Select</th>	    
													      </thead>
									      					<tbody>
									      					@foreach($assets as $asset)
										      					<tr>
										      					<td>{{$count}}</td>	      				
										      					<td>{{$asset['name']}}</td>	      					
										      					<td>{{$asset['description']}}</td>
										      					<td>{{$asset['store']}}</td>
										      					<input type="hidden" name="asset_id" value="{{$asset['id']}}"/>
										      					<td><button class="btn btn-warning">Pick</button></td>
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
									</div>
									<!--END TAB1 CONTENT -->

									<!--START TAB2 CONTENT -->
									<div class="tab-pane" id="tab_2">
										
									</div>
									<!-- END TAB2 CONTENT-->

									<!-- BEGIN TAB3 CONTENT-->
									<div class="tab-pane" id="tab_3">														
									</div>
									<!--END TAB3 CONTENT-->

									<!--BEGIN TAB4 CONTENT-->
									<div class="tab-pane" id="tab_4">														
									</div>
									<!--END TAB4 CONTENT-->											
									</div>
									
								</div>
							</div>
						</div>									
					</div>
				</div>
				<!-- END PAGE CONTENT-->
				 </div>
			 </div>
			<!--END CONTENT-->

@include('includes.footer')