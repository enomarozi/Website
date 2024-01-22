<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('assets/template.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style type="text/css">
	a,button{
		cursor: pointer;
	}
	button:hover{
		background-color: black;
	}
</style>
<header class='grid-header'>
	<div class='header-1'>
		<a href="{{route('dashboard')}}"><img class='head-img' src="{{ asset('images/head.png') }}"></a>
	</div>
	@if(Session::has('message'))
	<script type="text/javascript">
       	swal("{{session('message')}}", 
       	{
		  button: false,
		  timer: 1000,
		});
    </script>
	<span></span>
	@elseif(session()->has('id'))
	<div></div>
	@else
	<div class='header-2'>
		<a href="{{route('registrasi')}}"><button class='button-signup'>Signup</button></a>
	</div>
	@endif
	<div class='header-3 grid-button-header'>
		<div class="dropdown">
			<button class='button-head dropbtn'>Dijual</button>
			<div class='dropdown-content'>
				<a href="{{route('search_head', ['kategori'=>'Dijual','properti'=>'Rumah'])}}">Rumah</a>
				<a href="{{route('search_head', ['kategori'=>'Dijual','properti'=>'Tanah'])}}">Tanah</a>
				<a href="{{route('search_head', ['kategori'=>'Dijual','properti'=>'Ruko'])}}">Ruko</a>
				<a href="{{route('search_head', ['kategori'=>'Dijual','properti'=>'Apartemen'])}}">Apartment</a>
			</div>
		</div>
		<span></span>
		<div class="dropdown">
			<button class='button-head dropbtn'>Disewa</button>
			<div class='dropdown-content'>
				<a href="{{route('search_head', ['kategori'=>'Disewa','properti'=>'Rumah'])}}">Rumah</a>
				<a href="{{route('search_head', ['kategori'=>'Disewa','properti'=>'Tanah'])}}">Tanah</a>
				<a href="{{route('search_head', ['kategori'=>'Disewa','properti'=>'Ruko'])}}">Ruko</a>
				<a href="{{route('search_head', ['kategori'=>'Disewa','properti'=>'Apartemen'])}}">Apartment</a>
			</div>
		</div>
		<span></span>
		<a href="{{route('searchKost')}}"><button class='button-head'>Kost</button></a>
		<span></span>
		@if(Session::get('username'))
		<div class="dropdown">
			<button class='button-head dropbtn'>{{Session::get('username')}}</button>
			<div class='dropdown-content'>
				<a href="/profile/{{Session::get('username')}}">PROFILE</a>
				<a href="/setting/{{Session::get('username')}}">SETTING</a>
				<a href="{{route('actionlogout')}}">KELUAR</a>
			</div>
		</div>
		@else
		<a href="/login"><button class='button-head dropbtn'>Login</button></a>
		@endif
		<span></span>
	</div>
</header>
@yield('content')