@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Maintenance <small>Update Maintenance</small>
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
								Update Maintenance
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
				 <h3>Update Maintenance</h3>
				 <hr>
				<form role="form" method="POST" action="{{{ URL::to('maintenance/view_maintenance/update') }}}">
						<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">						
						<div class="form-group">
							<label for="type">Item:</label>
							<select name="item" class="form-control" readonly="readonly">							
								<option value="{{$asset_id}}">{{$item_name}}</option>
							</select>
						</div>
						<div class="form-group">
							<label for="username">Schedule Date:</label>
							<div class="right-inner-addon">                        		
                        		<input class="form-control datepicker" id="datepicker" readonly="readonly" type="text" name="date_performed" value="{{$date_performed}}" />
                        	</div>							
						</div>																				
						<div class="form-group">
							<label class="">Test Performed: </label>
							<input class="form-control" type="text" name="test_performed" value="{{$test_performed}}" required>
						</div>	
						<!--START VERBOTEN -->
						<input type="hidden" name="maintain_id" value="{{$maintain_id}}">	
						<!--END VERBOTEN -->	
						<div class="form-group">
							<label class="">Test Outcome: </label>
							<select name="outcome" class="form-control" required="required">
								<option value="Passed"<?= ($test_result=='Passed')?'selected="selected"':''; ?>>Passed</option>
								<option value="Failed"<?= ($test_result=='Failed')?'selected="selected"':''; ?>>Failed</option>
							</select>
						</div>																					
						<div class="form-group text-left">
							<input class="btn btn-primary" type="submit" name="btn-register" value="Update Maintenance">
						</div>
					</form>
				</div>
			</div>
			<!--END CONTENT-->
		</div>
	</div>
@include('includes.footer')