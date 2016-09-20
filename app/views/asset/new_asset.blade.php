@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Assets <small>Record New Asset</small>
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
								New Asset
							</a>
						</li>						
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>			
			<!-- END PAGE HEADER-->
			<!--START CONTENT-->
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
			</div>		
			<div class="row">			
			 <div class="col-md-4 col-md-offset-1 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				 <h3>New Item</h3>
				 <hr>
				<form role="form" method="POST" action="{{{ URL::to('/new_asset') }}}">
						<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
						<div class="form-group">
							<label class="">Name: </label>
							<input class="form-control" type="text" name="name" value="" required>
						</div>
						<div class="form-group">
							<label class="">Description: </label>
							<textarea class="form-control" rows="5" cols="45" name="description">
								
							</textarea>
						</div>
						<div class="form-group">
							<label class="">Serial Number: </label>
							<input class="form-control" type="text" name="serial" value="" required>
						</div>						
						<div class="form-group">
							<label for="type">Category:</label>
							<select name="category" class="form-control" required>								
								<option value="Sound">Sound</option>
								<option value="Led Screens">Led Screens</option>
								<option value="Plasma Screens">Plasma Screens</option>
								<option value="Accessories">Accessories</option>

							</select>
						</div>												
						<div class="form-group">
							<label for="type">Store:</label>
							<select name="store" class="form-control" required>								
								<option value="Main Store">Main Store</option>
								<option value="Container">Container</option>
								<option value="Accessories Stores">Accessories Stores</option>
								<option value="Technical Head Store">Technical Head Store</option>
							</select>
						</div>										
						<div class="form-group text-left">
							<input class="btn btn-primary" type="submit" name="btn-register" value="Create Asset">
						</div>
					</form>
				</div>
			</div>
			<!--END CONTENT-->
		</div>
	</div>
@include('includes.footer')