@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Inventory Dashboard <small>Summary And Statistics</small>
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
							<a href="{{{ URL::to('/') }}}">
								Dashboard
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
			<div class="row" ng-controller="">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				@if(isset($assets))
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-barcode"></i>
						</div>
						<div class="details">							
							<div class="number">
								 {{$assets}}
							</div>							
							<div class="desc">
								 Total Assets
							</div>
						</div>
						<a class="more" href="{{{ URL::to('/view_asset') }}}">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				@endif
				</div>		
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				@if(isset($maintains))
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-cogs"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{$maintains}}
							</div>
							<div class="desc">
								 Maintenances
							</div>
						</div>
						<a class="more" href="{{{ URL::to('/view_maintenance') }}}">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				@endif
				</div>		
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				@if(isset($books))
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-book"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{$books}}
							</div>
							<div class="desc">
								 Total Bookings
							</div>
						</div>
						<a class="more" href="{{{ URL::to('/view_event') }}}">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				@endif
				</div>		
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				@if(isset($maintains))
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-random"></i>
						</div>
						<div class="details">
							<div class="number">
								{{$checkouts}}
							</div>
							<div class="desc">
								 Total Checkouts
							</div>
						</div>
						<a class="more" href="{{{ URL::to('/view_checkout') }}}">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				@endif
				</div>				
			</div>
			<hr>
			<!--START CONTENT-->
			<div class="clearfix">
			</div>
			<!--START CONTENT SECOND-->
			<div class="row" style="margin-top:2%;">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">				
					<div class="dashboard-stat ">
					<center>
						<img src="{{asset('assets/img/expose_banner.png')}}" alt="Expose Banner" class="img-responsive"/>
					</center>					  
					</div>						
				</div>								
			</div>													
			</div>
			<!--END CONTENT SECOND-->
		</div>
	</div>
@include('includes.footer')