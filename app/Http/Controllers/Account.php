<?php

namespace App\Http\Controllers;

use App\Models\{Users,Medias};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class Account extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }
    public function login(){
        if(session()->get('id'))
        {
            return redirect('dashboard');
        }       
        return view('login');
    }
    public function loginAction(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $request = [
            'username'=>$username,
            'password'=>$password];
        if(Auth::attempt($request)){
            Session::put('username', Auth::user()->username);
            Session::put('id', Auth::user()->id);
            Session::flash('loginSuccess', 'Login Berhasil');
            return redirect('dashboard');
        }else{
            Session::flash('loginFailed', 'Username atau Password Salah');
            return redirect('login');
        }
    }
    public function registrasi(){
        return view('registrasi');
    }
    public function registrasiAction(Request $request){
        $regis = new users;
        $regis->namalengkap = $request->namalengkap;
        $regis->username = $request->username;
        $regis->email = $request->email;
        $regis->password = $request->password;
        $regis->birthday = $request->birthday;
        $regis->kecamatan = $request->kecamatan;
        $regis->kelurahan = $request->kelurahan;
        $regis->alamat = $request->alamat;
        $regis->hp = $request->hp;
        $ids = DB::table('users')->max('id');
        if($request->file('fprofile')){
            $file = $request->file('fprofile');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $regis->fprofile = $filename;
            if($ids>=1){
                $file->move(public_path('public/profile/'.$ids+1),$filename);
            }else{
                $file->move(public_path('public/profile/1'),$filename);
            }
        }
        $regis->save();
        $data = Users::where('username',$request->username)->first();
        $medias = new medias;
        $medias->username = $request->username;
        $medias->id_user = $data->id;
        $medias->instagram = $request->instagram;
        $medias->facebook = $request->facebook;
        $medias->youtube = $request->youtube;
        $medias->tiktok = $request->tiktok;
        $medias->save();
        Session::flash('registrasiSuccess', 'Pendaftaran Berhasil');
        return redirect('login');
    }
    public function forgot_password(){
        return view('forgot_password');
    }
    public function forgot_password_action(Request $request){
        $users = Users::where('username', $request->username)
             ->orWhere('email', $request->username)
             ->get();
        dd($users);
    }
    public function setting($username){
        $user = Auth::user();
        $medsos = Medias::where('username',$user->username)->first();
        return view('setting',['user'=>$user,'medsos'=>$medsos]);
    }
    public function settingAction(Request $request){
        $user = Auth::user();
        $setting = Users::find($user->id);
        $setting->update($request->all());
        $medsos = Medias::where('id_user',$user->id)->get();
        $setting_update = Medias::where('id_user', $user->id)->first();
        $setting_update->instagram = $request->instagram;
        $setting_update->facebook = $request->facebook;
        $setting_update->youtube = $request->youtube;
        $setting_update->tiktok = $request->tiktok;
        $setting_update->save();
        
        return redirect()->route('setting',Session::get('id'))->with('message','Data Berhasil Diperbarui');
    }
    public function profile_user($id){
        $user = Auth::user();
        $data = Medias::where('username',$user->username)->first();
        return view('profile_user',['user'=>$user,'data'=>$data]);
    }
    public function actionlogout(){
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }

}
