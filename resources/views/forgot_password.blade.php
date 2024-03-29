<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('assets/forgot_password.css')}}">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
	<link href="https://fonts.cdnfonts.com/css/login" rel="stylesheet">
	<title>Lupa Password</title>
</head>
<body>
@extends('app')
@section('content-app')
<div class='container'>
	<form method="POST" action="{{route('forgot_password_action')}}">
		@csrf
		<div class='label'>
			<label>Forgot Password</label>
		</div>
		<input type="text" name="username" placeholder="Username/Email">
		<input type="submit" name="submit" value="Kirim">
	</form>
</div>
@endsection
</body>
</html>