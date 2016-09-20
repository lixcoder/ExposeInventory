@include('includes.header')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Booking Reports <small>Preview, Download and Print Reports</small>
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
							<i class="fa fa-file"></i>
							<a href="{{{ URL::to('#') }}}">
								Reports
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<i class="fa fa-book"></i>
							<a href="{{{ URL::to('#') }}}">
								Bookings Reports
							</a>							
						</li>												
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>			
			<!-- END PAGE HEADER-->
			<div>				
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
			<!-- START PAGE CONTENT-->
			<div class="row">
				<div class="col-md-4 col-md-offset-1 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">				
					<form role="form" method="POST" action="{{{ URL::to('/bookings_report') }}}">
						<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">						
						<div class="form-group">
							<label for="username">Period From:</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker" readonly="readonly" type="text" name="period_from"/>
                        	</div>							
						</div>								
						<div class="form-group">
							<label for="username">Period To:</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker1" readonly="readonly" type="text" name="period_to"/>
                        	</div>							
						</div>																							
						<div class="form-group text-left">
							<input class="btn btn-primary" type="submit" name="btn-register" value="Download Report">
						</div>
					</form>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
	</div>
</div>
@include('includes.footer')