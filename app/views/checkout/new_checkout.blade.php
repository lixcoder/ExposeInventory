@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Checkouts <small>Record Checkouts</small>
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
								Record Checkouts
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
				 <h3>New Checkout</h3>
				 <hr>
				<form role="form" method="POST" action="{{{ URL::to('/new_checkout') }}}">
						<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
						@if(isset($item))	
						<div class="form-group">
							<label for="type">Item:</label>
							<select name="item" class="form-control" required>	
							@foreach($item as $items)							
								<option value="{{$items['id']}}">{{$items['name']}}</option>	
							@endforeach
							</select>
						</div>
						@endif
						<div class="form-group">
							<label for="username">Date Expected Out</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker" readonly="readonly" type="text" name="date_expected_out"/>
                        	</div>							
						</div>								
						<div class="form-group">
							<label for="username">Date Out</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker1" readonly="readonly" type="text" name="date_out"/>
                        	</div>							
						</div>											
						<div class="form-group">
							<label for="username">Date Expected Back</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker2" readonly="readonly" type="text" name="date_expected_back"/>
                        	</div>							
						</div>	
						<div class="form-group">
							<label for="username">Date Back</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker3" readonly="readonly" type="text" name="date_back"/>
                        	</div>							
						</div>	
						@if(isset($clients))	
						<div class="form-group">
							<label for="type">Client:</label>
							<select name="client" class="form-control" required>	
							@foreach($clients as $client)							
								<option value="{{$client['id']}}">{{$client['client_name']}}</option>	
							@endforeach
							</select>
						</div>
						@endif											
						<div class="form-group">
							<label class="">Checked out by: </label>
							<input class="form-control" type="text" name="checked_out_by" value="" required>
						</div>
						<div class="form-group">
							<label class="">Checked in by: </label>
							<input class="form-control" type="text" name="checked_in_by" value="" required>
						</div>																				
						<div class="form-group text-left">
							<input class="btn btn-primary" type="submit" name="btn-register" value="Checkout Item">
						</div>
					</form>
				</div>
			</div>
			<!--END CONTENT-->
		</div>
	</div>
@include('includes.footer')