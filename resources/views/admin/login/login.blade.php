<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ADMIN</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="{{asset('public/admin_asset')}}">"
	<link id="bootstrap-style" href="admin_asset/css/bootstrap.min.css" rel="stylesheet">
	<link href="admin_asset/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="admin_asset/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="admin_asset/css/style-responsive.css" rel="stylesheet">
	<link rel="shortcut icon" href="admin_asset/img/favicon.ico">
	<!-- end: Favicon -->
	<style type="text/css">
		body { background: url(admin_asset/img/bg-login.jpg) !important; }
	</style>	
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">	
			<div class="row-fluid">
				<div class="login-box">
					@if(session('thongbao'))
						<div class="alert alert-success">
							{{session('thongbao')}}
						</div>
					@endif
					<div class="icons">
						<a href="#"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>
					<h2>Login to your account</h2>
					@if(count($errors) > 0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
								{{$err}}
							@endforeach
						</div>
					@endif
					<form class="form-horizontal" action="" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="email" id="email" type="text" placeholder="Type Email"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="Type password"/>
							</div>
							<div class="clearfix"></div>
							
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>

							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
					<h3>Forgot Password?</h3>
					<p>
						No problem, <a href="loginagain.html">click here</a> to get a new password.
					</p>	
				</div><!--/span-->
			</div><!--/row-->
			

		</div>
	
		</div>
	   
	<!-- start: JavaScript-->

		<script src="admin_asset/js/jquery-1.9.1.min.js"></script>
		<script src="admin_asset/js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="admin_asset/js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="admin_asset/js/jquery.ui.touch-punch.js"></script>
	
		<script src="admin_asset/js/modernizr.js"></script>
	
		<script src="admin_asset/js/bootstrap.min.js"></script>
	
		<script src="admin_asset/js/jquery.cookie.js"></script>
	
		<script src='admin_asset/js/fullcalendar.min.js'></script>
	
		<script src='admin_asset/js/jquery.dataTables.min.js'></script>

		<script src="admin_asset/js/excanvas.js"></script>
		<script src="admin_asset/js/jquery.flot.js"></script>
		<script src="admin_asset/js/jquery.flot.pie.js"></script>
		<script src="admin_asset/js/jquery.flot.stack.js"></script>
		<script src="admin_asset/js/jquery.flot.resize.min.js"></script>
	
		<script src="admin_asset/js/jquery.chosen.min.js"></script>
	
		<script src="admin_asset/js/jquery.uniform.min.js"></script>
		
		<script src="admin_asset/js/jquery.cleditor.min.js"></script>
	
		<script src="admin_asset/js/jquery.noty.js"></script>
	
		<script src="admin_asset/js/jquery.elfinder.min.js"></script>
	
		<script src="admin_asset/js/jquery.raty.min.js"></script>
	
		<script src="admin_asset/js/jquery.iphone.toggle.js"></script>
	
		<script src="admin_asset/js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="admin_asset/js/jquery.gritter.min.js"></script>
	
		<script src="admin_asset/js/jquery.imagesloaded.js"></script>
	
		<script src="admin_asset/js/jquery.masonry.min.js"></script>
	
		<script src="admin_asset/js/jquery.knob.modified.js"></script>
	
		<script src="admin_asset/js/jquery.sparkline.min.js"></script>
	
		<script src="admin_asset/js/counter.js"></script>
	
		<script src="admin_asset/js/retina.js"></script>

		<script src="admin_asset/js/custom.js"></script>
	<!-- end: JavaScript-->
	
	<!-- end: JavaScript-->
	
</body>
</html>
