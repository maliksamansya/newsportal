<!DOCTYPE html>
<html lang="en">
<head>
    <title>News - @yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{--<link rel="stylesheet" href="{{ asset('version2/assets/css/bootstrap.min.css') }}">--}}
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('version2/Login_assets/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('version2/Login_assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('version2/Login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('version2/Login_assets/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('version2/Login_assets/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('version2/Login_assets/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('version2/Login_assets/css/main.css') }}">
<!--===============================================================================================-->
    @stack('styles')
</head>
<body>
    @yield('content')
	
<!--===============================================================================================-->	
	<script src="{{ asset('version2/Login_assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('version2/Login_assets/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('version2/Login_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('version2/Login_assets/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('version2/Login_assets/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('version2/Login_assets/js/main.js') }}"></script>
    @stack('scripts')

</body>
</html>