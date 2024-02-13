<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile {{$user->namalengkap}}</title>
	<link rel="stylesheet" href="{{asset('assets/profile_user.css')}}">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
</head>
<body>
@extends('template')
@section('content')
<div class='container-1'>
		<h2 class='text-profile'>Profile</h2>
		<img align="center" class='f-profile' src="{{ asset('public/profile/'.$user->id.'/'.$user->fprofile)}}">
		<div class='profile'>
			<table class='table-profile'>
		      <colgroup>
		        <col span="1" style="width: 30%;">
		        <col span="1" style="width: 10%;">
		        <col span="1" style="width: 60%;">
		      </colgroup>
		      <tbody>
		        <tr>
		          <td align="left">Nama</td>
		          <td>:</td>
		          <td align="left">{{$user->namalengkap}}</td>
		        </tr>
		        <tr>
		          <td align="left">Tgl Lahir</td>
		          <td>:</td>
		          <td align="left">{{$user->birthday}}</td>
		        </tr>
		        <tr>
		          <td align="left">Alamat</td>
		          <td>:</td>
		          <td align="left">{{$user->alamat}}</td>
		        </tr>
		        <tr>
		          <td align="left">HP/Telp</td>
		          <td>:</td>
		          <td align="left">{{$user->hp}}</td>
		        </tr>
		      </tbody>
		    </table>
		</div>
	</div>
<footer class='footer'>
	<h2 class='hubungi'>Kontak</h2>
	<div class='grid-medsos'>
		<a href="https://www.facebook.com/{{$data->facebook}}" target="_blank"><img class='medos' src="{{ asset('images/fb.png') }}"></a>
		<a href="https://www.instagram.com/{{$data->instagram}}" target="_blank"><img class='medos' src="{{ asset('images/ig.png') }}"></a>
		<a href="https://www.tiktok.com/{{$data->tiktok}}" target="_blank"><img class='medos' src="{{ asset('images/tt.png') }}"></a>
		<a href="https://www.youtube.com/{{$data->youtube}}" target="_blank"><img class='medos' src="{{ asset('images/yt.png') }}"></a>
	</div>
	<div class='copyright'>
		<hr>
		<h4>&#169; | Cari Property Indonesia 2024</h4>
	</div>
</footer>
@endsection
</body>
</html>