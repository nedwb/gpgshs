<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-5 p-b-10">
				<form method="POST" action="{{ route('resetlnk') }}" class="login100-form validate-form">
					@csrf

					@if (isset($message))
						<span class="txt4">* {{ $message }}</span>
						<br>
						<span class="txt4">* Please enter your registered email address.</span>
					@endif

					<h2 class="login100-form-title p-b-30">
						Password Reset
					</h2>

					<div class="wrap-input100 validate-input m-t-20 m-b-20" data-validate = "Enter email">
						<input class="input100" type="text" name="email" autocomplete="off">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<br>
					<br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Send Reset Link
						</button>
					</div>

					<ul class="login-more p-t-30">
						<li class="m-b-8">
							<span class="txt1">
								To be able to reset your password, you must have an access to your registered email address.
							</span>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>