<!DOCTYPE html>
<html>
<head>
	@foreach($data as $i)
	<title>&#186;PROPERTY85&#186; {{$i->fprofile}} </title>
	<link rel="stylesheet" href="{{asset('assets/profile.css')}}">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
@extends('template')
@section('content')
@if(Session::has('successUpdate'))
	<script type="text/javascript">
       	swal("{{session('successUpdate')}}", 
       	{
		  button: false,
		  timer: 1000,
		});
    </script>
@endif
<div class='grid-container'>
	<div class='background-temp'>
		<div class='container-parent'>
			<img class='f-profile' src="{{ asset('public/profile/'.$i->id.'/'.$i->fprofile)}}">
			<div class='container-child'>
				<h2>PROFILE</h2>
				<div class='profile'>
					<table class='table-profile'>
					<tr class='grid-column'>
						<th align="left">Nama</th>
						<th>:</th> 
						<th align="left">{{$i->namalengkap}}</th>
					</tr>
					<tr class='grid-column'>
						<th align="left">Tgl Lahir</th>
						<th>:</th>
						<th align="left">{{$i->birthday}}</th>
					</tr>
					<tr class='grid-column'>
						<th align="left">Alamat</th>
						<th>:</th>
						<th align="left">{{$i->alamat}}</th>
					</tr>
					<tr class='grid-column'>
						<th align="left">HP</th>
						<th>:</th>
						<th align="left">{{$i->hp}}</th>
					</tr>
					<tr class='grid-column'>
						<th align="left">Instagram</th>
						<th>:</th>
						<th align="left">{{$medias->instagram}}</th>
					</tr>
					<tr class='grid-column'>
						<th align="left">Facebook</th>
						<th>:</th>
						<th align="left">{{$medias->facebook}}</th>
					</tr>
					<tr class='grid-column'>
						<th align="left">Youtube</th>
						<th>:</th>
						<th align="left">{{$medias->youtube}}</th>
					</tr>
					<tr class='grid-column'>
						<th align="left">Tiktok</th>
						<th>:</th>
						<th align="left">{{$medias->tiktok}}</th>
					</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class='container-2'>
		<div class='table-data'>
			<div class='button-fungsi'>
					<a href='/inputRumah'><button class='input'>Property Rumah</button><a>
					<a href='/inputTanah'><button class='input'>Property Tanah</button><a>
				<hr>
			</div>
			<table id="data" border=1>
				<thead>
				<tr>
					<td>No</td>
					<td>Kategori</td>
					<td>Foto</td>
					<td>Tipe</td>
					<td>Daerah</td>
					<td>Luas Tanah</td>
					<td>Luas Bangun</td>
					<td>Harga</td>
					<td>Action</td>
				</tr>
				</thead>
				@foreach($penjualan as $j=>$index)
				<tr> 
					<td>{{$j+1}}</td>
					<td style="text-transform: uppercase;">{{$index->kategori}}</td>
					<td><img class='image-list' src="{{ asset('public/profile/'.Session::get('id').'/penjualan/'.$index->frumah)}}" width="250px"></td>
					<td>{{$index->properti}} {{$index->tipe}}</td>
					<td>{{$index->kecamatan}}, {{$index->kelurahan}}</td>
					<td>{{$index->luas_tanah}} M&#178;</td>
					<td>{{$index->luas_bangun}} M&#178;</td>
					<td>{{$index->harga}}</td>
					<td>
						<div class='grid-action'>
							<a href="/profile/{{$i->username}}/details/{{$index->properti}}/{{$index->id}}"><button class='action-edit-button' style='background-color: blue;'>Details</button></a>
							<a href="/profile/{{$i->username}}/edit/{{$index->properti}}/{{$index->id}}"><button class='action-edit-button' style='background-color: orange;'>Edit</button></a>
							<a href="/profile/{{$i->username}}/edit/{{$index->properti}}/{{$index->id}}"><button class='action-edit-button' style='background-color: red;'>Delete</button></a>
						</div>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endforeach
<script type="text/javascript">
  $(document).ready(function(){
    $('#data').after('<div id="nav"></div>');
    var rowsShown = 4;
    var rowsTotal = $('#data tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    $('#nav').append('<span>&#60;&#60;&#60;</span>');
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('  <a href="#" rel="'+i+'">'+pageNum+'</a>  ');
    }
    $('#nav').append('<span>&#62;&#62;&#62;</span>');
    $('#data tbody tr').hide();
    $('#data tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
    });
});
</script>
@endsection
</body>
</html>