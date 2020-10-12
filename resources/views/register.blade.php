<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>My Register Page &mdash; Bootstrap 4 Login Page Snippet</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
	<style>
		.errorMsg {
			color: #FF0000;
			/* display: none; */
		}
	</style>
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">

					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" type="text" class="form-control name" name="name" required autofocus>
									<div class="invalid-feedback">
										What's your name?
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control email" name="email" required>
									<div class="invalid-feedback">
										Your email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control password" name="password" required data-eye>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>
								<div class="form-group">
									<label for="cpassword">Confirm Password</label>
									<input id="cpassword" type="password" class="form-control cpassword" name="cpassword" required data-eye>
									<div class="invalid-feedback">
										Confirm Password is required
									</div>
								</div>
						</div>
					</div>

					<div class="form-group m-0">
						<button type="button" class="btn btn-primary btn-block button">
							Register
						</button>
					</div>
					<div class="mt-4 text-center">
						Already have an account? <a href="login">Login</a>
					</div>
					</form>
				</div>
			</div>

		</div>
		</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.button').click(function() {
				var name = $('.name').val();
				var email = $('.email').val();
				var password = $('.password').val();
				var cpassword = $('.cpassword').val();
				let _token = $('meta[name="csrf-token"]').attr('content');
				if (name.length == 0) {
					alert("pleae provide your name")
				} else if (!name.match(/^[A-Za-z ]+$/)) {
					alert("pleae provide only character");
				} else if (email.length == 0) {
					alert("pleae provide your emailid")
				} else if (!email.match(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/)) {
					alert("pleae provide valid email id");
				} else if (password == 0) {
					alert("pleae provide password");
				} else if (cpassword == 0) {
					alert("pleae provide confirm password");
				} else if (password !== cpassword) {
					alert("password doesn't match with confirm password");
				} else {
					var userdata = {
						name: name,
						email: email,
						password: password,
						cpassword: cpassword,
						_token: _token

					}
					console.log('---------------line 29--------------', userdata)
					$.ajax({
						type: 'post',
						dataType: "json",
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						url: '/insert',
						data: userdata,
						success: function(response) {
							console.log('---------ajax respponse----------', response)
							if (response.status == 200) {
								window.location.href = "/login"
							} else {
								$('.errorMsg').text(response.data.errorInfo[2])
							}
						}

					})
				}
			})
		})
	</script>
</body>

</html>