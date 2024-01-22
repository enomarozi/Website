<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Setting Profile</title>
	<link rel="stylesheet" href="{{asset('assets/edit.css')}}">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
</head>
<body>
@extends('template')
@section('content')
<div>
	<div class='label'>
		<label>Edit Penjualan</label>
	</div>
	@foreach($data as $i)
	<div class='form-setting'>
			<form method="POST" action="/editAction/{{ $i->id }}" enctype="multipart/form-data">
				@csrf
				<label class='label-edit'>Kategori</label>
				<select name='kategori' required disabled>
					<option selected>{{$i->kategori}}</option>
				</select>
				@if($i->properti === "Tanah")
				<label class='label-edit'>Properti</label>
				<select name='kategori' required disabled>
					<option selected>{{$i->properti}}</option>
				</select>
				@else
				<label class='label-edit'>Properti</label>
				<select name='properti' required>
					<option value="{{$i->properti}}" selected hidden>{{$i->properti}}</option>
					<option value="Rumah">Rumah</option>
					@if($i->kategori !== "Kamar Kost")
					<option class='ruko' value="Ruko">Ruko</option>
					@endif
					<option value="Apartemen">Apartemen</option>
				</select>
				@endif
				<label class='label-edit'>Tipe</label>
				<select name='tipe' required>
					<option value="{{$i->tipe}}" selected hidden>{{$i->tipe}}</option>
					@if($i->kategori !== "Kamar Kost")
					<option value="Subsidi">Subsidi</option>
					@endif
					@if($i->properti === "Tanah")
						<option value="Non-Subsidi">Non-Subsidi</option>
					@else
						<option value="Minimalis">Minimalis</option>
						<option value="Mewah">Mewah</option>
					@endif
				</select>
				<label class='label-edit'>Alamat</label>
				<div class='grid-select'>
					<select name='kecamatan' id='kecamatan' required>
						<option value="{{$i->kecamatan}}" selected hidden>{{$i->kecamatan}}</option>
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
				<div>
					<select name='kelurahan' id='kelurahan' required>
					<option value="{{$i->kelurahan}}" selected hidden>{{$i->kelurahan}}</option>
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
					<input type="text" name="rt" placeholder="RT" value="{{$i->rt}}">
					<span></span>
					<input type="text" name="rw" placeholder="RW" value="{{$i->rw}}">
				</div>
				<textarea name='alamat' cols="80" rows="5" placeholder="Alamat Spesifik">{{$i->alamat}}</textarea>
				@if($i->properti === "Tanah")
					<label class='label-edit'>Ukuran Tanah</label>
					<input type="text" name="luas_tanah" value="{{$i->luas_tanah}}">
				@else
					<label class='label-edit'>Kamar Mandi</label>
					<input type="text" name="jk_mandi" value="{{$i->jk_mandi}}">
					@if($i->kategori === "Dijual" || $i->kategori === "Disewa/Kontrak")
						<div class='jual'>
							<label class='label-edit'>Kamar Tidur</label>
							<input type="text" name="jk_tidur" value="{{$i->jk_tidur}}">
							<label class='label-edit'>Luas Bangun</label>
							<input type="text" name="luas_bangun" value="{{$i->luas_bangun}}">
							<label class='label-edit'>Luas Tanah</label>
							<input type="text" name="luas_tanah" value="{{$i->luas_tanah}}">
						</div>
					@endif
					@if($i->kategori === "Kamar Kost")
						<div class='kost'>
							<label class='label-edit'>Ukuran Kamar</label>
							<input type="text" name="luas_tanah" value="{{$i->ukuran}}">
						</div>
					@endif
				@endif

				@if($i->kategori === "Kamar Kost")
					<label class='label-edit'>Harga/Bulan</label>
				@else
					<label class='label-edit'>Harga</label>
				@endif



				<input type="number" name="harga" value="{{$i->harga}}">
				<label class='label-edit'>Deskripsi</label>
				<textarea name='deskripsi' cols="80" rows="8">{{$i->deskripsi}}</textarea>
				@if($i->properti === "Tanah")
					<label class='label-edit'>Foto Tanah 1</label>
				@else
					<label class='label-edit'>Foto Rumah</label>
				@endif
					<div class='grid-fprofil'>
						<img id="frumah" class='fotorumah' src="{{ asset('public/profile/'.Session::get('id').'/penjualan/'.$i->frumah)}}" width="300" height="200">
						<script>
						function f_rumah() {
						    frumah.src=URL.createObjectURL(event.target.files[0]);
						}
						</script>
						<input type="file" name='frumah' accept="image/png,image/jpeg" onchange="f_rumah()">
					</div>
				@if($i->properti === "Tanah")
					<label class='label-edit'>Foto Tanah 2</label>
				@else
					<label class='label-edit'>Foto Ruang Tamu</label>
				@endif
				<div class='grid-fprofil'>
					@if($i->ftamu)
						<img id="ftamu" class='fotorumah' src="{{ asset('public/profile/'.Session::get('id').'/penjualan/'.$i->ftamu)}}"  width="300" height="200">
					@else
						<img id="ftamu" class='fotorumah' src="{{ asset('public/default/noimage.png')}}"  width="300" height="200">
					@endif
					<script>
					function f_tamu() {
					    ftamu.src=URL.createObjectURL(event.target.files[0]);
					}
					</script>
					<input type="file" name='ftamu' accept="image/png,image/jpeg" onchange="f_tamu()">
				</div>
				@if($i->properti === "Tanah")
					<label class='label-edit'>Foto Tanah 3</label>
				@else
					<label class='label-edit'>Foto Kamar Tidur</label>
				@endif
				
				<div class='grid-fprofil'>
					@if($i->ftidur)
						<img id="ftidur" class='fotorumah' src="{{ asset('public/profile/'.Session::get('id').'/penjualan/'.$i->ftidur)}}"  width="300" height="200">
					@else
						<img id="ftidur" class='fotorumah' src="{{ asset('public/default/noimage.png')}}"  width="300" height="200">
					@endif
					<script>
					function f_tidur() {
					    ftidur.src=URL.createObjectURL(event.target.files[0]);
					}
					</script>
					<input type="file" name='ftidur' accept="image/png,image/jpeg" onchange="f_tidur()">
				</div>
				@if($i->properti !== "Tanah")
				<label class='label-edit'>Foto Dapur</label>
				<div class='grid-fprofil'>
					@if($i->fdapur)
						<img id="fdapur" class='fotorumah' src="{{ asset('public/profile/'.Session::get('id').'/penjualan/'.$i->fdapur)}}"  width="300" height="200">
					@else
						<img id="fdapur" class='fotorumah' src="{{ asset('public/default/noimage.png')}}"  width="300" height="200">
					@endif
					<script>
					function f_dapur() {
					    fdapur.src=URL.createObjectURL(event.target.files[0]);
					}
					</script>
					<input type="file" name='fdapur' accept="image/png,image/jpeg" onchange="f_dapur()">
				</div>

				<label class='label-edit'>Foto Halaman</label>
				<div class='grid-fprofil'>
					@if($i->fhalaman)
						<img id="fhalaman" class='fotorumah' src="{{ asset('public/profile/'.Session::get('id').'/penjualan/'.$i->fhalaman)}}"  width="300" height="200">
					@else
						<img id="fhalaman" class='fotorumah' src="{{ asset('public/default/noimage.png')}}"  width="300" height="200">
					@endif
					<script>
					function f_halaman() {
					    fhalaman.src=URL.createObjectURL(event.target.files[0]);
					}
					</script>
					<input type="file" name='fhalaman' accept="image/png,image/jpeg" onchange="f_halaman()">
				</div>

				<label class='label-edit'>Foto Kamar Mandi</label>
				<div class='grid-fprofil'>
					@if($i->fmandi)
						<img id="fmandi" class='fotorumah' src="{{ asset('public/profile/'.Session::get('id').'/penjualan/'.$i->fmandi)}}"  width="300" height="200">
					@else
						<img id="fmandi" class='fotorumah' src="{{ asset('public/default/noimage.png')}}"  width="300" height="200">
					@endif
					<script>
					function f_mandi() {
					    fmandi.src=URL.createObjectURL(event.target.files[0]);
					}
					</script>
					<input type="file" name='fmandi' accept="image/png,image/jpeg" onchange="f_mandi()">
				</div>
				@endif
				<input type="submit" name="submit" value="UPDATE">
			</form>
		</div>
	@endforeach
</div>
<footer>
</footer>
@endsection
</body>
</html>