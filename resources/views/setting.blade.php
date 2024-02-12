<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Setting Profile</title>
	<link rel="stylesheet" href="{{asset('assets/setting.css')}}">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
</head>
<body>
@extends('template')
@section('content')  
<div>
	<div class='label'>
		<label>Setting Profile</label>
	</div>
	@if(Session::has('loginSuccess'))
	<script type="text/javascript">
       	swal("{{session('loginSuccess')}}", 
       	{
		  button: false,
		  timer: 1000,
		});
    </script>
    @endif
	<div class='form-setting'>
		<form method="POST" action="{{route('settingAction')}}" enctype="multipart/form-data">
			@csrf
			<div class='grid-fprofil'>
			<img id="f-profile" src="{{ asset('public/profile/'.$user->id.'/'.$user->fprofile)}}">
			<script>
			var loadFile = function(event) {
				var output = document.getElementById('f-profile');
				output.src = URL.createObjectURL(event.target.files[0]);
				output.onload = function() {
					URL.revokeObjectURL(output.src) 
				}
			};
			</script>
			<input type="file" accept="image/png,image/jpeg" onchange="loadFile(event)">
			</div>
			<label class='label-parrent'>Nama Lengkap :</label>
			<input type="text" name="namalengkap" value="{{$user->namalengkap}}">
			<label class='label-parrent'>Username :</label>
			<input type="text" name="username" value="{{$user->username}}">
			<label class='label-parrent'>Email :</label>
			<input type="text" name="" value="{{$user->email}}" disabled>
			<label class='label-parrent'>birthday :</label>
			<input type="date" name="birthday" value="{{$user->birthday}}">
			<label class='label-parrent'>Alamat :</label>
			<div class='grid-alamat'>
			<select class='alamat1' id='kecamatan' name='kecamatan'>
				<option value="{{$user->kecamatan}}" selected disabled hidden>{{$user->kecamatan}}</option>
				<script type="text/javascript">
					const kecamatan = ["Bungus Teluk Kabung","Koto Tangah","Kuranji","Lubuk Begalung","Lubuk Kilangan","Nanggalo","Padang Barat","Padang Selatan","Padang Timur","Padang Utara","Pauh"];
					const select = document.getElementById('kecamatan');
					for(var i=0;i<kecamatan.length;i++){
						var opt = document.createElement('option');
						opt.value = kecamatan[i];
						opt.innerHTML = kecamatan[i];
						select.appendChild(opt);
					}
				</script>
			</select>
			<span></span>

			<select class='alamat2' id='kelurahan' name='kelurahan'>
				<option value="{{$user->kelurahan}}" selected disabled hidden>{{$user->kelurahan}}</option>
				<script type="text/javascript">
					 $("#kecamatan").change(function () {
				        var end = this.value;
				        var firstDropVal = $('#kecamatan').val();
				        if(firstDropVal==="Bungus Teluk Kabung")
						{
							$('#kelurahan').empty();
							var bungus = ["Bungus Barat","Bungus Selatan","Bungus Timur","Teluk Kabung Selatan","Teluk Kabung Tengah","Teluk Kabung Utara"];
							const select = document.getElementById('kelurahan');
							for(var i=0;i<bungus.length;i++){
								var opt = document.createElement('option');
								opt.value = bungus[i];
								opt.innerHTML = bungus[i];
								select.appendChild(opt);
							}
						}
						else if(firstDropVal=="Koto Tangah")
						{
							$('#kelurahan').empty();
							var koto = ["Air Pacah","Balai Gadang","Batang Kabung Ganting","Batipuh Panjang","Bungo Pasang","Dadok Tunggul Hitam","Koto Panjang Ikua Koto","Koto Pulai","Lubuk Buaya","Lubuk Minturun","Padang Sarai","Parupuk Tabing","Pasir Nan Tigo"];
							const select = document.getElementById('kelurahan');
							for(var i=0;i<koto.length;i++){
								var opt = document.createElement('option');
								opt.value = koto[i];
								opt.innerHTML = koto[i];
								select.appendChild(opt);
							}
						}
						else if(firstDropVal=="Kuranji")
						{
							$('#kelurahan').empty();
							var koto = ["Ampang","Anduring","Gunung Sarik","Kalumbuk","Korong Gadang","Kuranji","Lubuk Lintah","Pasar Ambacang","Sungai Sapih"];
							const select = document.getElementById('kelurahan');
							for(var i=0;i<koto.length;i++){
								var opt = document.createElement('option');
								opt.value = koto[i];
								opt.innerHTML = koto[i];
								select.appendChild(opt);
							}
						}
						else if(firstDropVal=="Lubuk Begalung")
						{
							$('#kelurahan').empty();
							var koto = ["Banuaran Nan XX","Batung Taba Nan XX","Cengkeh Nan XX","Gates Nan XXGurun Laweh Nan XX","Kampung Baru Nan XX","Kampung Jua Nan XX","Koto Baru Nan XX","Lubuk Begalung Nan XX","Pagambiran Ampalu Nan XX","Pampangan Nan XX","Parak Laweh Pulau Air Nan XX","Pitameh Tanjung Saba Nan XX","Tanah Sirah Piai Nan XX","Tanjung Aur Nan XX"];
							const select = document.getElementById('kelurahan');
							for(var i=0;i<koto.length;i++){
								var opt = document.createElement('option');
								opt.value = koto[i];
								opt.innerHTML = koto[i];
								select.appendChild(opt);
							}
						}
						else if(firstDropVal=="Lubuk Kilangan")
						{
							$('#kelurahan').empty();
							var koto = ["Bandar Buat","Batu Gadang","Beringin","Indarung","Koto Lalang","Padang Besi","Tarantang"];
							const select = document.getElementById('kelurahan');
							for(var i=0;i<koto.length;i++){
								var opt = document.createElement('option');
								opt.value = koto[i];
								opt.innerHTML = koto[i];
								select.appendChild(opt);
							}
						}
						else if(firstDropVal=="Nanggalo")
						{
							$('#kelurahan').empty();
							var koto = ["Gurun Laweh","Kampung Lapai","Kampung Olo","Kurao Pagang","Surau Gadang","Tabing Banda Gadang"];
							const select = document.getElementById('kelurahan');
							for(var i=0;i<koto.length;i++){
								var opt = document.createElement('option');
								opt.value = koto[i];
								opt.innerHTML = koto[i];
								select.appendChild(opt);
							}
						}
						else if(firstDropVal=="Padang Barat")
						{
							$('#kelurahan').empty();
							var koto = ["Belakang Tangsi","Berok Nipah","Flamboyan Baru","Kampung Jao","Kampung Pondok","Olo","Padang Pasir","Purus","Rimbo Kaluang","Ujung Gurun"];
							const select = document.getElementById('kelurahan');
							for(var i=0;i<koto.length;i++){
								var opt = document.createElement('option');
								opt.value = koto[i];
								opt.innerHTML = koto[i];
								select.appendChild(opt);
							}
						}
						else if(firstDropVal=="Padang Selatan")
						{
							$('#kelurahan').empty();
							var koto = ["Air Manis","Alang Laweh","Batang Arau","Belakang Pondok","Bukit Gado-Gado","Mato Aie","Pasa Gadang","Ranah Parak Rumbio","Rawang","Seberang Padang","Seberang Palinggam","Teluk Bayur"];
							const select = document.getElementById('kelurahan');
							for(var i=0;i<koto.length;i++){
								var opt = document.createElement('option');
								opt.value = koto[i];
								opt.innerHTML = koto[i];
								select.appendChild(opt);
							}
						}
						else if(firstDropVal=="Padang Timur")
						{
							$('#kelurahan').empty();
							var koto = ["Andalas","Ganting Parak Gadang","Jati","Jati Baru","Kubu Dalam Parak Karakah","Kubu Marapalam","Parak Gadang Timur","Sawahan","Sawahan Timur","Simpang Haru"];
							const select = document.getElementById('kelurahan');
							for(var i=0;i<koto.length;i++){
								var opt = document.createElement('option');
								opt.value = koto[i];
								opt.innerHTML = koto[i];
								select.appendChild(opt);
							}
						}
						else if(firstDropVal=="Padang Utara")
						{
							$('#kelurahan').empty();
							var koto = ["Air Tawar Barat","Air Tawar Timur","Alai Parak Kopi","Gunung Pangilun","Lolong Belanti","Ulak Karang Selatan","Ulak Karang Utara"];
							const select = document.getElementById('kelurahan');
							for(var i=0;i<koto.length;i++){
								var opt = document.createElement('option');
								opt.value = koto[i];
								opt.innerHTML = koto[i];
								select.appendChild(opt);
							}
						}
						else if(firstDropVal=="Pauh")
						{
							$('#kelurahan').empty();
							var koto = ["Binuang Kampuang Dalam","Cupak Tangah","Kapalo Koto","Koto Luar","Lambung Bukit","Limau Manis","Limau Manis Selatan","Piai Tangah","Pisang"];
							const select = document.getElementById('kelurahan');
							for(var i=0;i<koto.length;i++){
								var opt = document.createElement('option');
								opt.value = koto[i];
								opt.innerHTML = koto[i];
								select.appendChild(opt);
							}
						}
						else{
							alert("Maaf Kelurahan tidak ada!!");
						}
				    });
				</script>
			</select>
		</div>
		<input type="text" name="alamat" value="{{$user->alamat}}">
		<label class='label-parrent'>Telp/HP :</label>
		<input type="text" name="hp" value="{{$user->hp}}">	
		<label class='label-parrent'>Instagram :</label>
		@if(isset($medsos->instagram))
			<input type="text" name="instagram" value="{{$medsos->instagram}}">
		@else
			<input type="text" name="instagram" value="">
		@endif
		<label class='label-parrent'>Facebook :</label>
		@if(isset($medsos->facebook))
			<input type="text" name="facebook" value="{{$medsos->facebook}}">
		@else 
			<input type="text" name="facebook" value="">
		@endif
		<label class='label-parrent'>Youtube :</label>
		@if(isset($medsos->facebook))
			<input type="text" name="youtube" value="{{$medsos->youtube}}">
		@else 
			<input type="text" name="youtube" value="">
		@endif
		<label class='label-parrent'>Tiktok :</label>
		@if(isset($medsos->facebook))
			<input type="text" name="tiktok" value="{{$medsos->tiktok}}">
		@else 
			<input type="text" name="tiktok" value="">
		@endif
		<input type="submit" name="submit" value="SUBMIT">
		</form>
	</div>
</div>
<footer>
</footer>
@endsection
</body>
</html>