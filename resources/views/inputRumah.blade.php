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
	<div class='label'>
		<label>--- Property Rumah ---</label>
	</div>
	@if(session('success'))
		<script type="text/javascript">
			alert("Input Rumah Berhasil");
		</script>
	@elseif(session('failed'))
		<script type="text/javascript">
			alert("Input Rumah Gagal!!")
		</script>
	@endif
	<form class='form-property' method="POST" action="{{route('actionInputRumah')}}" enctype="multipart/form-data">
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
						const apiKey = 'a51d53c2-1b8b-5ee2-e2a8-ec160a0c';
						const kecamatan = `https://api.goapi.io/regional/kecamatan?kota_id=13.71&api_key=${apiKey}`;

						const select = document.getElementById('kecamatan');
						let xhr = new XMLHttpRequest();
						xhr.open('GET', kecamatan, true);
						xhr.onreadystatechange = function(){
							if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
								let response = JSON.parse(xhr.responseText);
								let data = response.data;
								for(var i=0;i<Object.keys(data).length;i++){
									var opt = document.createElement('option');
									opt.value = data[i].name;
									opt.innerHTML = data[i].name;
									opt.setAttribute("id", data[i].id);
									select.appendChild(opt);
								}
							}
						};
						xhr.send();
					</script>
				</select>
				<div>
					<span></span>
				</div>
				<select name='kelurahan' id='kelurahan' required>
					<option value="" selected disabled hidden>Selected</option>
					<script type="text/javascript">
						const kecamatanSelected = document.getElementById("kecamatan");
						kecamatanSelected.addEventListener("change", function() {
						    let selectedIndex = this.selectedIndex;
						    let selectedOption = this.options[selectedIndex];
						    let optionId = selectedOption.id;
						    let kelurahan = `https://api.goapi.io/regional/kelurahan?kecamatan_id=${optionId}&api_key=${apiKey}`;
						    xhr.open('GET', kelurahan, true);
						    xhr.onreadystatechange = function(){
						    	var selectElement = document.getElementById("kelurahan");
						    	while (selectElement.options.length > 0) {
								    selectElement.remove(0);
								}
								if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
									const select = document.getElementById('kelurahan');
									let response = JSON.parse(xhr.responseText);
									let data = response.data;
									for(var i=0;i<Object.keys(data).length;i++){
										var opt = document.createElement('option');
										opt.value = data[i].name;
										opt.innerHTML = data[i].name;
										select.appendChild(opt);
									}
								}
							};
							xhr.send();  
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