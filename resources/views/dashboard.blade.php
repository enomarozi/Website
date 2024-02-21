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
					<option value="Semua">Semua</option>
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
			</div>
			<div class='select-3'>
				<span></span>
			</div>
			<div class='select-2'>				
				<select class='alamat2' id='kelurahan' name='kelurahan' required>
					<script type="text/javascript">
						const kecamatanSelected = document.getElementById("kecamatan");
						kecamatanSelected.addEventListener("change", function() {
						    let selectedIndex = this.selectedIndex;
						    let selectedOption = this.options[selectedIndex];
						    let optionId = selectedOption.id;
						    const select = document.getElementById('kelurahan');
						    if(selectedOption.value === "Semua"){
						    	var selectElement = document.getElementById("kelurahan");
						    	while (selectElement.options.length > 0) {
									    selectElement.remove(0);
									}
						    	var opt = document.createElement('option');
								opt.value = "Semua";
								opt.innerHTML = "Semua";
								select.appendChild(opt);
						    }else{
							    let kelurahan = `https://api.goapi.io/regional/kelurahan?kecamatan_id=${optionId}&api_key=${apiKey}`;
							    xhr.open('GET', kelurahan, true);
							    xhr.onreadystatechange = function(){
							    	var selectElement = document.getElementById("kelurahan");
							    	while (selectElement.options.length > 0) {
									    selectElement.remove(0);
									}
									if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
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