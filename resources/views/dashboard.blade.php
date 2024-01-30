<!DOCTYPE html>
<html>
	<head>
		<title>CariPropertyIndonesia</title>
		<link rel="stylesheet" href="{{asset('assets/dashboard.css')}}">
		<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
		<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
	</head>
<body>
@extends('template')
@section('content')
<div class='container'>
	<form method="GET" action="{{route('search')}}">
		@csrf
		<div class='form-1 grid-select'>
			<div class='select-1'>
				<select class='alamat1' id='kecamatan' name='kecamatan' required>
					<option value="" selected disabled hidden>Selected</option>
					<script type="text/javascript">
						const kecamatan = ["Semua","Bungus Teluk Kabung","Koto Tangah","Kuranji","Lubuk Begalung","Lubuk Kilangan","Nanggalo","Padang Barat","Padang Selatan","Padang Timur","Padang Utara","Pauh"];
						const select = document.getElementById('kecamatan');
						for(var i=0;i<kecamatan.length;i++){
							var opt = document.createElement('option');
							opt.value = kecamatan[i];
							opt.innerHTML = kecamatan[i];
							select.appendChild(opt);
						}
					</script>
				</select>
			</div>
			<div class='select-3'>
				<span></span>
			</div>
			<div class='select-2'>				
				<select class='alamat2' id='kelurahan' name='kelurahan' required>
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
							else if(firstDropVal=="Semua")
							{
								$('#kelurahan').empty();
								const select = document.getElementById('kelurahan');
								var opt = document.createElement('option');
								opt.value = "Semua";
								opt.innerHTML = "Semua";
								select.appendChild(opt);
							}
							else{
								alert("Maaf Kelurahan tidak ada!!");
							}
					    });
					</script>
				</select>
			</div>
		</div>
		<div class='form-2'>
			<input type="submit" name="submit" value="CARI" class='button-search'>
		</div>
	</form>
</div>
<footer class='footer'>
	<h2 class='hubungi'>Hubungi</h2>
	<div class='grid-medsos'>
		<img class='medos' src="{{ asset('images/fb.png') }}">
		<img class='medos' src="{{ asset('images/ig.png') }}">
		<img class='medos' src="{{ asset('images/tt.png') }}">
		<img class='medos' src="{{ asset('images/yt.png') }}">
	</div>
	<div class='copyright'>
		<hr>
		<h4>&#169; | Cari Property Indonesia 2024</h4>
	</div>
</footer>
@endsection
</body>
</html>