<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Input Property Rumah</title>
	<link rel="stylesheet" type="text/css" href="assets/input.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
		  $('select').change(function(){
		  	if($(this).val()=='Kamar Kost'){
		  		$('.kost').show();
		  		$('.jual').hide();
		  		$('.ruangtamu').hide();
		  		$('.dapur').hide();
		  		$('.halaman').hide();
		  		$('.subsidi').hide();
		  		$('.ruko').hide();
		  		$('.subsidi').hide();
		  		$('.harga').attr("placeholder", "Harga/Bulan");
		  	}
		  	else if($(this).val()=='Dijual'|| $(this).val()=='Disewa/Kontrak'){
		  		$('.kost').hide();
		  		$('.jual').show();
		  		$('.ruangtamu').show();
		  		$('.dapur').show();
		  		$('.halaman').show();
		  		$('.subsidi').show();
		  		$('.ruko').show();
		  		$('.subsidi').show();
		  		$('.harga').attr("placeholder", "Harga");
		  	}
		  })
		});
	</script>
</head>
<body>
@extends('template')
@section('content')
<div class='container'>
	@if(session('success'))
		<script type="text/javascript">
			alert("Input Rumah Berhasil");
		</script>
	@elseif(session('failed'))
		<script type="text/javascript">
			alert("Input Rumah Gagal!!")
		</script>
	@endif
	<form  id='form' method="POST" action="{{route('actionInputRumah')}}" enctype="multipart/form-data">
		@csrf
		<div class='marginTop top'>
			<label>Kategori :</label>
			<select name='kategori' required>
				<option value="" selected disabled hidden>Selected</option>
				<option value="Dijual">Dijual</option>
				<option value="Disewa">Disewa/Kontrak</option>
				<option value="Kamar Kost">Kamar Kost</option>
			</select>
		</div>
		<div class='marginTop top properti'>
			<label>Properti :</label>
			<select name='properti' required>
				<option value="" selected disabled hidden>Selected</option>
				<option value="Rumah">Rumah</option>
				<option class='ruko' value="Ruko">Ruko</option>
				<option value="Apartemen">Apartemen</option>
			</select>
		</div>
		<div class='marginTop top'>
			<label>Type :</label>
			<select name='tipe' required>
				<option value="" selected disabled hidden>Selected</option>
				<option class='subsidi' value="Subsidi">Subsidi</option>
				<option value="Minimalis">Minimalis</option>
				<option value="Mewah">Mewah</option>
			</select>
		</div>
		<div class='marginTop'>
			<label>Alamat :</label>
			<div class='grid-select'>
				<select name='kecamatan' id='kecamatan' required>
					<option value="" selected disabled hidden>Selected</option>
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
				<div>
					<span></span>
				</div>
				<select name='kelurahan' id='kelurahan' required>
					<option value="" selected disabled hidden>Selected</option>
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
			<div class='rtrw'>
				<input type="text" name="rt" placeholder="RT">
				<span></span>
				<input type="text" name="rw" placeholder="RW">
			</div>
			<textarea name='alamat' cols="80" rows="5" placeholder="Alamat Spesifik"></textarea>
		</div>

		<div class='marginTop'>
			<label>Spesifikasi :</label>
			<input type="number" name="jk_mandi" placeholder="Jumlah Kamar Mandi">
			<div class='jual'>
				<input type="number" name="jk_tidur" placeholder="Jumlah Kamar Tidur">
				<input type="number" name="ltanah" placeholder="Luas Tanah (M&#178;)">
				<input type="number" name="lbangun" placeholder="Luas Bangun (M&#178;)">
			</div>
			<div class='kost'>
				<input type="number" name="ukuran" placeholder="Ukuran Kamar (M&#178;)">
			</div>
		</div>
		<div class='marginTop photo'>
			<label>Foto :</label>
			<table>
				<tr class='rumah'>
					<th>
						<label>Rumah</label>
					</th>
					<th>
						<input type='file' name="frumah" accept="image/png,image/jpeg">
					</th>
				</tr>
				<tr class='ruangtamu'>
					<th>
						<label>Ruang Tamu</label>
					</th>
					<th>
						<input type='file' name="ftamu" accept="image/png,image/jpeg">
					</th>
				</tr>
				<tr class='kamartidur'>
					<th>
						<label>Kamar Tidur</label>
					</th>
					<th>
						<input type='file' name="ftidur" accept="image/png,image/jpeg">
					</th>
				</tr>
				<tr  class='dapur'>
					<th>
						<label>Dapur</label>
					</th>
					<th>
						<input type='file' name="fdapur" accept="image/png,image/jpeg">
					</th>
				</tr>
				<tr class='halaman'>
					<th>
						<label>Halaman</label>
					</th>
					<th>
						<input type='file' name="fhalaman" accept="image/png,image/jpeg">
					</th>
				</tr>
				<tr class='kamarmandi'>
					<th>
						<label>Kamar Mandi</label>
					</th>
					<th>
						<input type='file' name="fmandi" accept="image/png,image/jpeg">
					</th>
				</tr>
			</table>
		</div>
		<div class='marginTop'>
			<label>Harga :</label>
			<input class='harga' type="number" name="harga" placeholder="Harga">
		</div>
		<div class='marginTop'>
			<label>Deskripsi :</label>
			<textarea name='deskripsi' cols="80" rows="8" placeholder="Deskripsi"></textarea>
		</div>
		<input type="submit" name="submit" value="INPUT">
	</form>
</div>
@endsection
</body>
</html>