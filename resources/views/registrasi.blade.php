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
							else{
								alert("Maaf Kelurahan tidak ada!!");
							}
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