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
<div class='container'>
	<div class='label'>
		<label>--- Setting Profile ---</label>
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

			<select class='alamat2' id='kelurahan' name='kelurahan'>
				<option value="{{$user->kelurahan}}" selected disabled hidden>{{$user->kelurahan}}</option>
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