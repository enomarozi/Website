<!DOCTYPE html>
<html>
<head>
	<title>CariPropertyIndonesia</title>
	<link rel="stylesheet" href="{{asset('assets/login.css')}}">
</head>
<body>
	@if(session('loginFailed'))
           <script type="text/javascript">
       		sweetAlert("Oops...","{{session('loginFailed')}}", "error");
    		</script>
    	@endif
	@if(session('registrasiSuccess'))
		<script type="text/javascript">
       swal({
            title: "Success",
            text: "{{session('registrasiSuccess')}}",
            icon: "success",
            button: true
        });
    		</script>
	@endif
@extends('app')
@section('content-app')
<div class='head-login'>
	<img class='head-img' src="{{ asset('images/head-login.png') }}">
</div>
	<form method="POST" action="{{route('loginAction')}}">
		<div class='label'>
			<label>LOGIN</label>
		</div>
		@csrf
		<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" name="submit" value="MASUK">
		<h3 class='register'>Belum Punya Akun? &#62;&#62;&#62; <a class='button-regis' href='{{route("registrasi")}}'>Registrasi</a></h3>
	</form>
<footer class='footer'>
	<div class='copyright'>
		<hr>
		<h4>&#169; | Cari Property Indonesia 2023</h4>
	</div>
</footer>
@endsection
</body>
</html>