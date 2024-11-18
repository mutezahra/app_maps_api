

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/main.css') }}">
<!--===============================================================================================-->
<style>
    
    .container-login100 {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #f2f2f2;
    }
    .wrap-login100 {
        width: 100%;
        max-width: 350px;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        padding: 25px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				
				
				@if(session('success'))
				<p class="alert alert-success">{{ session('success') }}</p>
				@endif
				
				@if($errors->any())
					@foreach($errors->all() as $err)
						<p class="alert alert-danger">{{ $err }}</p>
					@endforeach
				@endif
				<form class="login100-form validate-form" action="{{url('register_action')}}" method="post">

					@csrf
					
					<span class="login100-form-title">
						Register
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid name is required: Hamadaasi">
						<input class="input100" type="text" name="name" value="{{ old('name') }}" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="password_confirmation" is required">
						<input class="input100" type="password" name="password_confirmation"" placeholder=" Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Create Account
						</button>
					</div>
                  

					
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->	
	<script src="{{ asset('assets/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('assets/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login/js/main.js')}}"></script>

</body>
</html>
