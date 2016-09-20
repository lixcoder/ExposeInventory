@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Assets <small>Edit Asset</small>
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
								Edit Assets
							</a>
						</li>						
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>			
			<!-- END PAGE HEADER-->
			<!--START CONTENT-->
			<div class="row">
			<div class="col-md-4 col-md-offset-1 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				 <h3>Update Item</h3>
				 <hr>
			@if(isset($edit_asset))
				<form role="form" method="POST" action="{{{ URL::to('asset/view_asset/update') }}}">
						<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
						<div class="form-group">
							<label class="">Name: </label>
							<input class="form-control" type="text" name="name" value="{{$edit_asset['name']}}" required>
						</div>
						<div class="form-group">
							<label class="">Description: </label>
							<textarea class="form-control" rows="5" cols="45" name="description">
								{{$edit_asset['description']}}
							</textarea>
						</div>
						<div class="form-group">
							<label class="">Serial Number: </label>
							<input class="form-control" type="text" name="serial" value="{{$edit_asset['serial_number']}}" required>
						</div>	
						<div class="form-group">
							<label class="">Lease Price: </label>
							<input class="form-control" type="text" name="lease_price" value="{{$edit_asset['lease_price']}}" required>
						</div>					
						<div class="form-group">
							<label for="type">Category:</label>
							<select name="category" class="form-control" required>								
								<option value="Sound"<?=($edit_asset->category=='Sound')?'selected="selected"':''; ?>>Sound</option>
								<option value="Led Screens"<?=($edit_asset->category=='Led Screens')?'selected="selected"':''; ?>>Led Screens</option>
								<option value="Plasma Screens"<?=($edit_asset->category=='Plasma Screens')?'selected="selected"':''; ?>>Plasma Screens</option>
								<option value="Accessories"<?=($edit_asset->category=='Accessories')?'selected="selected"':'';?>>Accessories</option>

							</select>
						</div>
						<!-- START CAPTURE DETAILS-->
						<input type="hidden" value="{{$edit_asset['id']}}" name="asset_id"/>
						<!-- END CAPTURE DETAILS-->						
						<div class="form-group">
							<label for="type">Store:</label>
							<select name="store" class="form-control" required>								
								<option value="Main Store"<?= ($edit_asset->store=='Main Store')?'selected="selected"':''; ?>>Main Store</option>
								<option value="Container"<?= ($edit_asset->store=='Container')?'selected="selected"':''; ?>>Container</option>
								<option value="Accessories Stores"<?= ($edit_asset->store=='Accessories Stores')?'selected="selected"':''; ?>>Accessories Stores</option>
								<option value="Technical Head Store"<?= ($edit_asset->store=='Technical Head Store')?'selected="selected"':''; ?>>Technical Head Store</option>
							</select>
						</div>										
						<div class="form-group text-left">
							<input class="btn btn-primary" type="submit" name="btn-register" value="Update Item">
						</div>
					</form>
				@endif
			</div>
			<!--END CONTENT-->
		</div>
	</div>
@include('includes.footer')