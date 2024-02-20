<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="{{asset('assets/app.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
<header class='grid-header'>
	<div class='header-1'>
		<img class='head-img' src="{{ asset('images/head.png') }}">
	</div>
	<div></div>
	<div class='header-2  '>
		<img class='wa-img' src="{{ asset('images/technical.png') }}">
		<div></div>
		@if(Route::current()->getName() === "login")
			<button class='button-head'><a href="{{route('forgot_password')}}" style="color:white;">Lupa Password</a></button>
		@else
			<button class='button-head'><a href="{{route('login')}}" style="color:white;">Login</a></button>
		@endif
	</div>
</header>
@yield('content-app')