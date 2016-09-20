@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Checkouts <small>Edit Checkouts</small>
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
								Edit Checkouts
							</a>
						</li>						
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>			
			<!-- END PAGE HEADER-->
			<!--START CONTENT-->
			<div class="row" ng-controller="inventoryController">
				<div class="col-md-4 col-md-offset-1 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				 <h3>Update Checkout</h3>
				 <hr>
				<form role="form" method="POST" action="{{{ URL::to('checkout/view_checkout/update') }}}">
						<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">						
						<div class="form-group">
							<label for="type">Item:</label>
							<select name="item" class="form-control"  readonly="readonly">	
								<option value="{{$asset_id}}">{{$item_name}}</option>							
							</select>
						</div>						
						<div class="form-group">
							<label for="username">Date Expected Out</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker" readonly="readonly" type="text" name="date_expected_out" value="{{$date_expected_out}}" />
                        	</div>							
						</div>								
						<div class="form-group">
							<label for="username">Date Out</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker1" readonly="readonly" type="text" name="date_out"  value="{{$date_out}}"/>
                        	</div>							
						</div>											
						<div class="form-group">
							<label for="username">Date Expected Back</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker2" readonly="readonly" type="text" name="date_expected_back"  value="{{$date_expected_in}}"/>
                        	</div>							
						</div>	
						<div class="form-group">
							<label for="username">Date Back</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker3" readonly="readonly" type="text" name="date_back"  value="{{$date_in}}"/>
                        	</div>							
						</div>			
						<!-- START VERBOTEN-->
						<input type="hidden" name="check_id" value="{{$checked_id}}"/>				
						<!-- END VERBOTEN-->
						<div class="form-group">
							<label for="type">Client:</label>
							<select name="client" class="form-control" readonly="readonly">							
								<option value="{{$client_id}}">{{$client_name}}</option>
							</select>
						</div>									
						<div class="form-group">
							<label class="">Checked out by: </label>
							<input class="form-control" type="text" name="checked_out_by" value="{{$checked_out_by}}" required>
						</div>
						<div class="form-group">
							<label class="">Checked in by: </label>
							<input class="form-control" type="text" name="checked_in_by" value="{{$checked_in_by}}" required>
						</div>																				
						<div class="form-group text-left">
							<input class="btn btn-primary" type="submit" name="btn-register" value="Update Checkout">
						</div>
					</form>
				</div>
			</div>
			<!--END CONTENT-->
		</div>
	</div>
@include('includes.footer')