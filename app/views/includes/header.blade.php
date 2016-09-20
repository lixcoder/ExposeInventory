<!DOCTYPE html>
<html lang="en" class="no-js" ng-app="inventoryModule">
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Xpose | Inventory Management System</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
 {{ HTML::style('assets/plugins/font-awesome/css/font-awesome.min.css') }}
 {{HTML::style('assets/plugins/bootstrap/css/bootstrap.min.css')}}
 {{HTML::style('assets/plugins/uniform/css/uniform.default.css')}}
 {{HTML::style('assets/plugins/bootstrap-datepicker/css/datepicker.css')}}
 {{HTML::style('assets/plugins/data-tables/DT_bootstrap.css')}} 
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
{{HTML::style('assets/css/style-metronic.css')}}
{{HTML::style('assets/css/style.css')}}
{{HTML::style('assets/css/style-responsive.css')}}
{{HTML::style('assets/css/plugins.css')}}
{{HTML::style('assets/css/themes/light.css')}}
{{HTML::style('assets/css/custom.css')}}
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{asset('assets/img/xpose.png')}}"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
	<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="{{{ URL::to('/') }}}">
			<img src="{{asset('assets/img/logo.png')}}" alt="logo" class="img-responsive"/>
		</a>
	<!-- END LOGO -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="{{{ URL::to('/search') }}}" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove">
								</a>
								<input type="text" placeholder="Search..."/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start active ">
					<a href="{{{ URL::to('/') }}}">
						<i class="fa fa-dashboard"></i>
						<span class="title">
							Dashboard
						</span>
						<span class="selected">
						</span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<i class="fa fa-barcode"></i>
						<span class="title">
							Assets
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{{ URL::to('/new_asset') }}}">
								<i class="fa fa-plus"></i>
								New Asset
							</a>
						</li>						
						<li>
							<a href="{{{ URL::to('/view_asset') }}}">
								<i class="fa fa-list"></i>
								View Assets
							</a>
						</li>						
					</ul>
				</li>			
				<li>
					<a href="javascript:;">
						<i class="fa fa-calendar"></i>
						<span class="title">
							Events
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{{ URL::to('/new_event') }}}">
								<i class="fa fa-plus"></i>
								New Event
							</a>
						</li>						
						<li>
							<a href="{{{ URL::to('/view_event') }}}">
								<i class="fa fa-list"></i>
								View Events
							</a>
						</li>						
					</ul>
				</li>									
				<li>
					<a href="javascript:;">
						<i class="fa fa-random"></i>
						<span class="title">
							Checkouts
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{{ URL::to('/new_checkout') }}}">
								<i class="fa fa-plus"></i>
								New Checkout
							</a>
						</li>						
						<li>
							<a href="{{{ URL::to('/view_checkout') }}}">
								<i class="fa fa-list"></i>
								View Checkouts
							</a>
						</li>						
					</ul>
				</li>			
				<li>
					<a href="javascript:;">
						<i class="fa fa-share"></i>
						<span class="title">
							Checkins
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{{ URL::to('/new_checkin') }}}">
								<i class="fa fa-plus"></i>
								New Checkin
							</a>
						</li>																
					</ul>
				</li>						
				<li>
					<a href="javascript:;">
						<i class="fa fa-cog"></i>
						<span class="title">
							Maintenance
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{{ URL::to('/new_maintenance') }}}">
								<i class="fa fa-wrench"></i>
								Schedule Maintenance
							</a>
						</li>
						<li>
							<a href="{{{ URL::to('/view_maintenance') }}}">
								<i class="fa fa-list"></i>
								View Schedules
							</a>
						</li>						
					</ul>
				</li>


				<li >
					<a href="{{{ URL::to('locations') }}}">
						<i class="fa fa-map-marker"></i>
						<span class="title">
							Locate Item
						</span>
						<span class="selected">
						</span>
					</a>
				</li>


				<li>
					<a href="javascript:;">
						<i class="fa fa-file"></i>
						<span class="title">
							Reports
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{{ URL::to('#') }}}">
								<i class="fa fa-barcode"></i>
								Assets Report
							</a>
						</li>
						<li>
							<a href="{{{ URL::to('/bookings_report') }}}">
								<i class="fa fa-book"></i>
								Bookings Report
							</a>
						</li>	
						<li>
							<a href="{{{ URL::to('/checkouts_report') }}}">
								<i class="fa fa-random"></i>
								Checkouts Report
							</a>
						</li>	
						<li>
							<a href="{{{ URL::to('/events_report') }}}">
								<i class="fa fa-briefcase"></i>
								Events Report
							</a>
						</li>	
						<li>
							<a href="{{{ URL::to('/maintenances_report') }}}">
								<i class="fa fa-wrench"></i>
								Maintenance Report
							</a>
						</li>						
					</ul>
				</li>																											
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->