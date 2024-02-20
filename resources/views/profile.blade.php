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
			<div class='mini-width'>
				@foreach($penjualan as $i)
				<div class='tampil'>
					<div class='tampil-grid-bottom' style="display: none;">
						<a class='a_button' href="{{ route('detail_property', ['id' => $i->id, 'username' => $i->user, 'properti' => $i->properti]) }}">Details</a>
						<div></div>
						<a class='a_button' href="{{ route('edit_property', ['id' => $i->id, 'username' => $i->user, 'properti' => $i->properti]) }}">Edit</a>
						<div></div>
						<a class='a_button' href="{{ route('hapus_property', ['id' => $i->id, 'username' => $i->user]) }}">Hapus</a>
					</div>
					<p class='kategori'>{{$i->kategori}}</p>
					<img class='image-list' src="{{ asset('public/profile/'.$i->id_user.'/penjualan/'.$i->frumah)}}" width="450px">
					<div class='mid-panel-rows panel-right'>
						@php
						$hasil_rupiah = "Rp " . number_format($i->harga,0,',','.');
						@endphp
						<p class='harga'>{{$hasil_rupiah}}</p>
						<p class='type'>{{$i->tipe}}</p>
					</div>
					<div class='tampil-grid-bottom'>
						<a class='a_button detail' href="{{ route('detail_property', ['id' => $i->id, 'username' => $i->user, 'properti' => $i->properti]) }}">Details</a>
						<div></div>
						<a class='a_button edit' href="{{ route('edit_property', ['id' => $i->id, 'username' => $i->user, 'properti' => $i->properti]) }}">Edit</a>
						<div></div>
						<a class='a_button hapus' href="{{ route('hapus_property', ['id' => $i->id, 'username' => $i->user]) }}">Hapus</a>
					</div>
				</div>
				@endforeach
			</div>
			
			<div class='big-width'>
				<table class="table table-bordered data-table">
			    <thead>
			        <tr>
			            <th>No</th>
			            <th>Kategori</th>
			            <th>Foto</th>
			            <th>Tipe</th>
			            <th>Daerah</th>
			            <th>Luas Tanah</th>
			            <th>Luas Bangun</th>
			            <th>Harga</th>
			            <th>Action</th>
			            <!-- Tambahkan kolom lain sesuai kebutuhan -->
			        </tr>
			    </thead>
			    <tbody>
			        <!-- Isi tabel menggunakan data dari response JSON -->
			    </tbody>
				</table>
				<script type="text/javascript">
			  $(function () {
			      
			    var table = $('.data-table').DataTable({
			        processing: true,
			        serverSide: true,
			        ajax: "{{ route('getData') }}",
			        columns: [
			            { 
			                data: null,
			                render: function(data, type, row, meta) {
			                    var startIndex = meta.settings._iDisplayStart;
			                    var index = meta.row + 1 + startIndex;
			                    return '<div style="text-align: center;">' + index + '</div>';
			                }
			            },
			            {data: 'kategori', name: 'kategori'},
				          {	
				          	data: 'frumah',
				            orderable: false,
				            searchable: false,
				            render: function(data, type, row) 
				            {
				                return '<img class="image-list" src="{{ asset('public/profile/'.Session::get('id').'/penjualan/') }}/' + data + '" width="250px">';
				            }
				          },
			            {data: 'tipe', name: 'tipe'},
			            {data: 'kecamatan', name: 'kecamatan'},
			            {data: 'luas_tanah', name: 'luas_tanah'},
			            {data: 'luas_bangun', name: 'luas_bangun'},
			            {data: 'harga', name: 'harga'},
			            { 
			                data: null,
			                orderable: false,
			                searchable: false,
			                render: function(data, type, row) {
			                	  console.log(data);
			                    return '<div class="action-button">'+
			                    			 '<a href="/profile/'+data.user+'/details/'+data.properti+'/'+data.id + '"class="detail">Detail</a>' +
			                    			 '<a href="/profile/'+data.user+'/edit/'+data.properti+'/'+ data.id + '" class="edit">Edit</a>' +
			                           '<a href="/profile/'+data.user+'/hapus/'+ data.id + '" class="delete">Hapus</a>'+
			                           '</div>';
			                }
			            }
			        ]
			    });
			  });
			</script>
		</div>
	</div>
</div>
</div>

@endforeach
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
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