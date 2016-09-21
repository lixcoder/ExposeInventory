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
 {{HTML::style('assets/plugins/font-awesome/css/font-awesome.min.css') }}
 {{HTML::style('assets/plugins/bootstrap/css/bootstrap.min.css')}}
 {{HTML::style('assets/plugins/uniform/css/uniform.default.css')}}
 {{HTML::style('assets/plugins/bootstrap-datepicker/css/datepicker.css')}}
 {{HTML::style('assets/plugins/data-tables/DT_bootstrap.css')}} 
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
{{HTML::style('assets/css/xpose.css')}}
{{HTML::style('assets/css/xpose_style.css')}}
{{HTML::style('assets/css/xpose_respond.css')}}
{{HTML::style('assets/css/spices.css')}}
{{HTML::style('assets/css/embellish/light.css')}}
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