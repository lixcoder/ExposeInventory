@include('includes.header')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Asset Reports <small>Preview, Download and Print Reports</small>
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
							<i class="fa fa-barcode"></i>
							<a href="{{{ URL::to('#') }}}">
								Assets Reports
							</a>							
						</li>												
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>			
			<!-- END PAGE HEADER-->
			<!-- START PAGE CONTENT-->
			<div class="row">
			</div>
			<!-- END PAGE CONTENT-->
	</div>
</div>
@include('includes.footer')