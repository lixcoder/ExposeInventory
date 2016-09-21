<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>XPOSE INVENTORY MANAGEMENT SYSTEM</title>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open Sans">
		
		 {{HTML::style('assets/plugins/font-awesome/css/font-awesome.min.css') }}
		 {{HTML::style('assets/plugins/bootstrap/css/bootstrap.min.css')}}
		 {{HTML::style('assets/plugins/uniform/css/uniform.default.css')}}
		 {{HTML::style('assets/plugins/bootstrap-datepicker/css/datepicker.css')}}
		 {{HTML::style('assets/plugins/data-tables/DT_bootstrap.css')}} 

		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
				border: none;
				outline: none;

				font-family: 'Open Sans';
				font-size: 98%;
				font-weight: 300;
			}

			body{}
			
			.banner{
				width: 100%;
				height: 100vh;
				color: #FFFFFF;
				text-align: center;

				background-color: #263238;
				background-image: url('assets/img/index.png');
				background-repeat: repeat;
				background-position: center;
				background-size: cover;
				background-blend-mode: soft-light;
			}	
				
				.landing-content{
					height: 92vh;
					font-size: 24px !important;
				}

					.landing-content h2.landing{
						/*VERTICAL ALIGNMENT*/
						margin-top: 0;
						font-size: 26px;
						position: relative;
						top: 40%;
						transform: translateY(-40%);
					}

					label{
						font-weight: 300;
						font-size: 21px;
						margin-bottom: 12px;
					}

				.landing-footer{
					text-align: center;
					height: 8vh;
					background-color: #607D8B;
					opacity: 0.6;
				}

					.landing-footer p{
						position: relative;
						top: 50%;
						transform: translateY(-50%);
					}

				.btn{
					width: 140px;
					border-radius: 3px;
					border:none;
					box-shadow: 1px 1px 3px rgba(0,0,0,0.3);
				}

				img{
					width: 140px;
					background-color: #FFF;
				}

				.form-group{
					margin: 25px auto;
				}

		</style>
	</head>

	<body>
		<div class="banner">
			<div class="landing-content">
				<h2 class="landing">
					<img src="{{asset('assets/img/expose_banner.png')}}" alt="Xpose Banner"><br><br>
					<div class="form-group">
						<label style="text-decoration:underline;">INVENTORY MANAGEMENT SYSTEM</label><br>											
					</div>
					<div class="form-group">
						<label>CREATE A USER ACCOUNT</label><br>
						<a href="{{{URL::to('/sign_up')}}}" class="btn btn-success">Sign Up</a>
					</div>
					<div class="form-group">
						<label>LOG IN TO YOUR ACCOUNT</label><br>
						<a href="{{{URL::to('/login')}}}" class="btn btn-primary">Login</a>
					</div>
				</h2>
			</div>
			<footer class="landing-footer">
				<p>&copy; {{date('Y')}} - Lixnet Technologies</p>	
			</footer>
		</div>
		{{HTML::script('assets/plugins/jquery-1.10.2.min.js')}}
		{{HTML::script('assets/plugins/jquery-migrate-1.2.1.min.js')}}
		{{HTML::script('assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js')}}
		{{HTML::script('assets/plugins/bootstrap/js/bootstrap.min.js')}}
		{{HTML::script('assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}
		{{HTML::script('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}
		{{HTML::script('assets/plugins/jquery.blockui.min.js')}}
		{{HTML::script('assets/plugins/jquery.cokie.min.js')}}
		{{HTML::script('assets/plugins/uniform/jquery.uniform.min.js')}}
			</body>
</html>