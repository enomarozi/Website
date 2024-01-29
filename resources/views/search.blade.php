<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>PROPERTY85</title>
	<link rel="stylesheet" href="{{asset('assets/search.css')}}">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
</head>
<body>
@extends('template')
@section('content')
<div class='container'>
	<div class='grid-container'>
		@if(count($search) >= 1)
			@foreach($search as $i)

			<div class='tampil'>
				<p class='kategori'>{{$i->kategori}}</p>
				<img class='image-list' src="{{ asset('public/profile/'.$i->id_user.'/penjualan/'.$i->frumah)}}" width="450px">
				<div class='mid-panel-columns'>
					<div class='mid-panel-rows panel-left'>
						<p class='alamat'>{{$i->kecamatan}}, {{$i->kelurahan}}</p>
						<p class='alamat-lengkap'>{{$i->alamat}}</p>
					</div>
					<div class='mid-panel-rows panel-right'>
						@php
						$hasil_rupiah = "Rp " . number_format($i->harga,0,',','.');
						@endphp
						<p class='harga'>{{$hasil_rupiah}}</p>
						<p class='type'>{{$i->tipe}}</p>
					</div>
				</div>	
				<hr>
				<div class='tampil-grid-bottom'>
					<div>
						<p class='posting'>Di posting : {{$i->nama_lengkap[0]}}</p>
						<p class='create'>{{$i->created_at}}</p>
					</div>
					<div class='tampil-grid-bottom-child'>
						<button class='button-action'><a class='a_button' href="{{route('details',$i->id)}}">Beli</a></button>
						<button class='button-action'><a class='a_button' href="{{route('details',$i->id)}}">Details</a></button>
					</div>
				</div>
			</div>
			@endforeach
		@endif
	</div>
</div>
@if(count($search) == 0)
	<h1 style='text-align: center;'>Data Tidak Ada</h1>
@endif
@endsection
</body>
</html>