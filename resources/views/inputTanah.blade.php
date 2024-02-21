<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Input Property Tanah</title>
	<link rel="stylesheet" type="text/css" href="assets/input.css">
</head>
<body>
@extends('template')
@section('content')
<div class='container'>
	<div class='label'>
		<label>--- Property Tanah ---</label>
	</div>
	@if(session('success'))
		<script type="text/javascript">
			alert("Input Tanah Berhasil");
		</script>
	@elseif(session('failed'))
		<script type="text/javascript">
			alert("Input Tanah Gagal!!")
		</script>
	@endif
	<form class='form-property' method="POST" action="{{route('actionInputTanah')}}" enctype="multipart/form-data">
		@csrf
		<div class='marginTop top'>
			<label>Kategori :</label>
			<select name='kategori' required>
				<option value="" selected disabled hidden>Selected</option>
				<option value="Dijual">Dijual</option>
				<option value="Disewa">Disewa/Kontrak</option>
			</select>
		</div>
		<div class='marginTop top'>
			<label>Type :</label>
			<select name='tipe' required>
				<option value="" selected disabled hidden>Selected</option>
				<option class="subsidi" value="Subsidi">Subsidi</option>
				<option value="Non-Subsidi">Non-Subsidi</option>
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
			<input type="number" name="ltanah" placeholder="Luas Tanah (M&#178;)" required>
		</div>
		<div class='marginTop photo'>
			<label>Foto :</label>
			<table>
				<tr class='tanah'>
					<th>
						<label>Tanah 1</label>
					</th>
					<th>
						<input type='file' name="ftanah1" accept="image/png,image/jpeg" required>
					</th>
				</tr>
				<tr class='tanah'>
					<th>
						<label>Tanah 2</label>
					</th>
					<th>
						<input type='file' name="ftanah2" accept="image/png,image/jpeg">
					</th>
				</tr>
				<tr class='tanah'>
					<th>
						<label>Tanah 3</label>
					</th>
					<th>
						<input type='file' name="ftanah3" accept="image/png,image/jpeg">
					</th>
				</tr>
			</table>
		</div>
		<div class='marginTop'>
			<label>Harga :</label>
			<input type="number" name="harga" placeholder="Harga" required> 
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