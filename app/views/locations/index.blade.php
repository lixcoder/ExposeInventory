@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Bookings <small>View Bookings</small>
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
							<a href="{{{ URL::to('locations') }}}">
								Locate Item
							</a>
							<i class="fa fa-angle-right"></i>
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
			<div class="row">
			 <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default">
			      	<div class="panel-heading">

			      			<h5>Locate Asset</h5>

			          	         
			        </div>			       
			        <div class="panel-body">

			        	<div class="row"> 

			        		<div class="col-lg-3">

			        			<form class="form" action="{{URL::to('locations')}}" method="post">

			        				<div class="form-group">
			        					<label>Asset</label>
			        					<select class="form-control" name="asset" >
			        						<option></option>
			        						@foreach($assets as $asset)
			        							<option value="{{$asset->id}}">{{$asset->name}} - {{$asset->serial_number}}</option>

			        						@endforeach

			        					</select>

			        				</div>

			        				<div class="form-group">
			        					<button type="submit" class="btn btn-default">Locate Item</button>
			        				</div> 

			        			</form>

			        		</div>


			        		<div class="col-lg-9">
			        			Longitude: {{$long}},  Latitude: {{$lat}}
<!--
<div style="width: 100%"><iframe width="100%" height="600" src="http://www.maps.ie/create-google-map/map.php?width=100%&amp;height=600&amp;hl=en&amp;coord={{$lat}}, 36.82194619999996&amp;q=+()&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/nl/maak-een-google-map/">Integreer Google Maps Code</a> aan <a href="http://www.mapsdirections.info/nl/">Bereken route</a></iframe></div><br />
-->

<div style="max-width:100%;overflow:hidden;height:500px;color:red;"><div id="embed-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q={{$lat}},{{$long}} &key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div>

			        		</div>

			        	</div>
			        


			      	</div>
			      </div>			   
			     </div>
			</div>
			<!--END CONTENT-->
		</div>
	</div>
@include('includes.footer')