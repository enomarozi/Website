<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" href="{{asset('assets/registrasi.css')}}">
</head>
<body>
@extends('app')
@section('content-app')
<script type="text/javascript">
	$(function() {
	    $("input[type='checkbox']").click(function() {
	        if ($(this).is(':checked')) {
	        	$("input[type='submit']").prop('disabled',false);
	        	$("input[type='submit']").css('cursor','pointer');
	        	$("input[type='submit']").css('background-color','#2a3a75');
	      	}else{
	            $("input[type='submit']").prop('disabled',true);
	            $("input[type='submit']").css('cursor','default');
	            $("input[type='submit']").css('background-color','#a8a8a8');
	        }
	    });
	});
</script>
<div class='container'>
	<div class='label'>
		<label>--- REGISTRASI ---</label>
	</div>
	 @if(session('success'))
    	<script type="text/javascript">
			alert('{{session("success")}}')
		</script>
    @endif
	@if($errors->any())
	<ul>
		@foreach($errors->all() as $error)
		<script type="text/javascript">
			alert('{{$error}}')
		</script>
		@endforeach
	</ul>
	@endif
	<div class='form-register'>
		<form  id='form' method="POST" action="{{route('registrasiAction')}}" enctype="multipart/form-data">
			@csrf
			<input type="text" name="namalengkap" placeholder="Nama Lengkap" required>
			<input type="text" name="username" placeholder="Username" required>
			<input type="email" name="email" placeholder="Email" required>
			<input type="password" name="password" placeholder="Password" required>
			<input type="password" name="repassword" placeholder="Re-Password" required>
			<input type="date" name="birthday" required>
			<div class='grid-alamat'>
				<div>
					<h4>Alamat : </h4>
				</div>
				<select class='alamat1' id='kecamatan' name='kecamatan' required>
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
				<span></span>
				<select class='alamat2' id='kelurahan' name='kelurahan' required>
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
			<input type="text" name="alamat" placeholder="Alamat Lengkap" required>
			<div class='grid-fprofil'>
				<h4>Foto Profile : </h4>
				<input type='file' name="fprofile" accept="image/png,image/jpeg">
			</div>
			<input type="tel" name="hp" placeholder="08xx-xxxx-xxxx" required>
			<div class='grid-medsos'>
				<div class='grid-akun'>
					<h4>Media Sosial : </h4>
					<input type="text" name="instagram" placeholder="Instagram">
				</div>
				<div class='grid-akun'>
					<div></div>
					<input type="text" name="facebook" placeholder="Facebook">
				</div>
				<div class='grid-akun'>
					<div></div>
					<input type="text" name="youtube" placeholder="Youtube">
				</div>
				<div class='grid-akun'>
					<div></div>
					<input type="text" name="tiktok" placeholder="Tiktok">
				</div>
			</div>
			<div class='grid-checkbox'>
				<label>Saya Setuju Untuk Registrasi</label>
				<input type="checkbox" name="check" value='agree'>
			</div>
			<input type="submit" name="submit" value="REGISTRASI" disabled>
		</form>
	</div>
</div>
@endsection
</body>
</html>