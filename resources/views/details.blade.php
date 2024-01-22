<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Details</title>
	<link rel="stylesheet" href="{{asset('assets/details.css')}}">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
</head>
<body>
@extends('template')
@section('content')
<div>
	<div class='label'>
		<label>Details Property</label>
	</div>
	<div class='container'>
		<div class='grid-details'>
			<div>
				<div class="slideshow-container">
					@php
					$j = 1;
					@endphp
					@foreach($foto as $i)
					<div class="mySlides fade">
						<img src="{{ asset('public/profile/'.$data[0]['id_user'].'/penjualan/'.$i)}}" style="width:100%;height: 450px;">
					</div>
					@endforeach
					<a class="prev" onclick="plusSlides(-1)">❮</a>
					<a class="next" onclick="plusSlides(1)">❯</a>

				</div>
				<div style="text-align:center">
					@for ($i = 1; $i < count($foto)+1; $i++)
						<span class="dot" onclick="currentSlide({{$i}})"></span> 
					@endfor
				</div>
			</div>
			<div class='details-property'>
				@foreach($data as $i)
				<div class='grid-label'>
					<h1 class='details'>--- Details ---</h1>
					<label class='label-posting'>Diposting Oleh {{$i->nama_lengkap[0]}}, {{$i->created_at->format('d-m-Y')}}</label>
				</div>
				@endforeach
				<hr>
				<br>
				<table>
				@foreach($data as $i)
					<tr>
						<td class='sub'>Kategori</td>
						<td class='split'>:</td>
						<td>{{$i->kategori}}</td>
					</tr>
					<tr>
						<td class='sub'>Type</td>
						<td class='split'>:</td>
						<td>{{$i->tipe}}</td>
					</tr>
					<tr>
						<td class='sub'>Alamat</td>
						<td class='split'>:</td>
						<td>{{$i->kecamatan}}, {{$i->kelurahan}}</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>{{$i->alamat}}</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						@if($i->rw != null && $i->rt == null)
							<td>RT -, RW {{$i->rw}}</td>
						@elseif($i->rt != null && $i->rw == null)
							<td>RT {{$i->rt}}, RW -</td>
						@elseif($i->rt == null && $i->rw == null)
							<td>RT -, RW -</td>
						@elseif($i->rw != null && $i->rt != null)
							<td>RT{{$i->rt}}, RW{{$i->rw}}</td>
						@endif
					</tr>
					<tr>
						<td class='sub'>HP/WA</td>
						<td class='split'>:</td>
						<td>{{$i->hp[0]}}</td>
					</tr>
					<tr>
						<td class='sub'>Harga</td>
						<td class='split'>:</td>
						@php
						$hasil_rupiah = "Rp " . number_format($i->harga,0,',','.');
						@endphp
						<td>{{$hasil_rupiah}}</td>
					</tr>
					<tr>
						<td class='sub'>Update</td>
						<td class='split'>:</td>
						<td>{{$i->updated_at}}</td>
					</tr>
					<tr>
						<td class='sub'>Deskripsi</td>
						<td class='split'>:</td>
						<td>{{$i->deskripsi}}</td>
					</tr>
					<tr>
						<td class='sub'>Lihat Profile</td>
						<td class='split'>:</td>
						<td><a href="/profile_user/{{$i->user}}"><button class="profile-show">Lihat Profile Agent</button></a></td>
					</tr>
				@endforeach
				</table>		
			</div>
		</div>
	</div>
	<script>
	let slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
		showSlides(slideIndex += n);
	}
	function currentSlide(n) {
		showSlides(slideIndex = n);
	}
	function showSlides(n) {
		let i;
		let slides = document.getElementsByClassName("mySlides");
		let dots = document.getElementsByClassName("dot");
		if (n > slides.length) {slideIndex = 1}    
		if (n < 1) {slideIndex = slides.length}
		for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";  
		}
		for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex-1].style.display = "block";  
		dots[slideIndex-1].className += " active";
	}
	</script>
	<div class='container-komentar'>
		
	</div>
</div>
	<footer>
	</footer>
@endsection
</body>
</html>