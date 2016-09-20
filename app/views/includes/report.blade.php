<!DOCTYPE html>
<html>
<head>
 <style type="text/css">
	 table {
	    border-collapse: collapse;
	    width:100%;
	}
	th{
		padding-top: 3px;
	    padding-bottom: 3px;
	    text-align: left;
	    background-color: #4CAF50;
	    color: white;
	}
	table, th, td {
	    border: 1px solid black;
	    padding: 3px;
    	text-align: left;	
    }    
 	
 </style>
</head>
<body>
	<center>
		<img src="{{asset('assets/img/expose_banner.png')}}" width="80px" height="50px" class="img-responsive"/>
		<h3>Inventory Management System</h3>
		<p>@yield('report_title')</p>
	</center>
	<div class="row">
		 <div class="col-md-12 col-sm-12 col-xs-12">
		  @yield('report_content')
		 </div>
 	</div>
 	<div class="row">
 		<center>
 			{{date('d-M-y')}}
 		</center>
 	</div>	
</body>
</html>