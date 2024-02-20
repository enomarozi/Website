<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account;
use App\Http\Controllers\CariPropertyIndonesia;

Route::GET('/dashboard',[Account::class,'dashboard'])->name('dashboard');

Route::GET('/',[Account::class,'login'])->name('login');
Route::GET('/login',[Account::class,'login'])->name('login');
Route::POST('/loginAction',[Account::class,'loginAction'])->name('loginAction');
Route::GET('/registrasi',[Account::class,'registrasi'])->name('registrasi');
Route::POST('/registrasiAction',[Account::class,'registrasiAction'])->name('registrasiAction');
Route::GET('/forgot_password',[Account::class,'forgot_password'])->name('forgot_password');
Route::POST('/forgot_password_action',[Account::class,'forgot_password_action'])->name('forgot_password_action');
Route::GET('/setting/{username}',[Account::class,'setting'])->name('setting')->middleware(('auth'));
Route::POST('/settingAction',[Account::class,'settingAction'])->name('settingAction')->middleware(('auth'));
Route::GET('/actionlogout', [Account::class, 'actionlogout'])->name('actionlogout');

Route::GET('/profile/{username}',[CariPropertyIndonesia::class,'profile'])->name('profile')->middleware(('auth'));
Route::GET('/inputRumah',[CariPropertyIndonesia::class,'inputRumah'])->name('inputRumah')->middleware(('auth'));
Route::POST('/actionInputRumah',[CariPropertyIndonesia::class,'actionInputRumah'])->name('actionInputRumah')->middleware(('auth'));
Route::GET('/inputTanah',[CariPropertyIndonesia::class,'inputTanah'])->name('inputTanah')->middleware(('auth'));
Route::POST('/actionInputTanah',[CariPropertyIndonesia::class,'actionInputTanah'])->name('actionInputTanah')->middleware(('auth'));

Route::GET('/profile_user/{username}',[Account::class,'profile_user'])->name('profile_user');
Route::GET('/profile/{username}/details/{properti}/{id}',[CariPropertyIndonesia::class,'detail_property'])->name('detail_property');
Route::GET('/profile/{username}/edit/{properti}/{id}',[CariPropertyIndonesia::class,'edit_property'])->name('edit_property')->middleware(('auth'));
Route::POST('/editAction/{id}',[CariPropertyIndonesia::class,'editAction'])->name('editAction')->middleware(('auth'));
Route::GET('/profile/{username}/hapus/{id}',[CariPropertyIndonesia::class,'hapus_property'])->name('hapus_property')->middleware(('auth'));

Route::GET('/profile/{username}/{page}',[CariPropertyIndonesia::class,'profilepage'])->name('profilepage');
Route::GET('/search',[CariPropertyIndonesia::class,'search'])->name('search');
Route::GET('/search/{kategori}/{properti}',[CariPropertyIndonesia::class,'search_head'])->name('search_head');
Route::GET('/searchKost',[CariPropertyIndonesia::class,'searchKost'])->name('searchKost');

Route::GET('/getData', [CariPropertyIndonesia::class, 'getData'])->name('getData');
