<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\{Users,Medias,penjualan,kostan};
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Yajra\DataTables\DataTables;

class CariPropertyIndonesia extends Controller
{
	
    public function inputRumah(){
        $user = auth::user();
        return view('inputRumah');
    }
    public function actionInputRumah(Request $request)
    {   
        $user = auth::user();
    	$kategori = $request->input('kategori');
    	if($kategori === 'Dijual' || $kategori === 'Disewa'){
            $array_properti = array("Rumah","Ruko","Apartemen");
            $array_tipe = array("Subsidi","Minimalis","Mewah");
    		$jual_rumah = new Penjualan;
            $jual_rumah->user = $user->username;
            $jual_rumah->id_user = $user->id;
    		$jual_rumah->kategori = $request->kategori;
            if(in_array($request->properti,$array_properti)){
                $jual_rumah->properti = $request->properti;
            }else{
                Session::flash('failed', 'failed');
                return redirect('inputRumah');
            }

            if(in_array($request->tipe,$array_tipe)){
                $jual_rumah->tipe = $request->tipe;
            }else{
                Session::flash('failed', 'failed');
                return redirect('inputRumah');
            }
            $jual_rumah->tipe = $request->tipe;
    		$jual_rumah->kecamatan = $request->kecamatan;
    		$jual_rumah->kelurahan = $request->kelurahan;
    		$jual_rumah->rt = $request->rt;
    		$jual_rumah->rw = $request->rw;
    		$jual_rumah->alamat = $request->alamat;
    		$jual_rumah->jk_tidur = $request->jk_tidur;
    		$jual_rumah->jk_mandi = $request->jk_mandi;
    		$jual_rumah->luas_tanah = $request->ltanah;
    		$jual_rumah->luas_bangun = $request->lbangun;
            $jual_rumah->harga = $request->harga;
    		if($request->file('frumah')){
    			$file = $request->file('frumah');
    			$filename = date('YmdHi').$file->getClientOriginalName();
    			$file->move(public_path('public/profile/'.$user->id.'/penjualan'),$filename);
    			$jual_rumah->frumah = $filename;
    		}
            if($request->file('ftamu')){
                $file = $request->file('ftamu');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/profile/'.$user->id.'/penjualan'),$filename);
                $jual_rumah->ftamu = $filename;
            }
            if($request->file('ftidur')){
                $file = $request->file('ftidur');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/profile/'.$user->id.'/penjualan'),$filename);
                $jual_rumah->ftidur = $filename;
            }
            if($request->file('fdapur')){
                $file = $request->file('fdapur');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/profile/'.$user->id.'/penjualan'),$filename);
                $jual_rumah->fdapur = $filename;
            }
            if($request->file('fhalaman')){
                $file = $request->file('fhalaman');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/profile/'.$user->id.'/penjualan'),$filename);
                $jual_rumah->fhalaman = $filename;
            }
            if($request->file('fmandi')){
                $file = $request->file('fmandi');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/profile/'.$user->id.'/penjualan'),$filename);
                $jual_rumah->fmandi = $filename;
            }
            $jual_rumah->deskripsi = $request->deskripsi;
    		$jual_rumah->save();
    		Session::flash('success', 'success');
    		return redirect()->route('profile', ['username' => $user->username]);
    	}else if($kategori === 'Kamar Kost'){
            $array_properti = array("Rumah","Apartemen");
            $array_tipe = array("Minimalis","Mewah");
    		$kost_rumah = new Penjualan;
            $kost_rumah->user = $user->username;
            $kost_rumah->id_user = $user->id;
    		$kost_rumah->kategori = $request->kategori;

            if(in_array($request->properti,$array_properti)){
                $kost_rumah->properti = $request->properti;
            }else{
                Session::flash('failed', 'failed');
                return redirect('inputRumah');
            }

            if(in_array($request->tipe,$array_tipe)){
                $kost_rumah->tipe = $request->tipe;
            }else{
                Session::flash('failed', 'failed');
                return redirect('inputRumah');
            }
            
    		$kost_rumah->kecamatan = $request->kecamatan;
    		$kost_rumah->kelurahan = $request->kelurahan;
    		$kost_rumah->rt = $request->rt;
    		$kost_rumah->rw = $request->rw;
    		$kost_rumah->alamat = $request->alamat;
    		$kost_rumah->ukuran = $request->ukuran;
    		$kost_rumah->jk_mandi = $request->jk_mandi;
            if($request->file('frumah')){
                $file = $request->file('frumah');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/profile/'.$user->id.'/penjualan'),$filename);
                $kost_rumah->frumah = $filename;
            }
            if($request->file('ftidur')){
                $file = $request->file('ftidur');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/profile/'.$user->id.'/penjualan'),$filename);
                $kost_rumah->ftidur = $filename;
            }
            if($request->file('fmandi')){
                $file = $request->file('fmandi');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/profile/'.$user->id.'/penjualan'),$filename);
                $kost_rumah->fmandi = $filename;
            }
            $kost_rumah->harga = $request->harga;
            $kost_rumah->deskripsi = $request->deskripsi;
    		$kost_rumah->save();
    		Session::flash('success', 'success');
    		return redirect()->route('profile', ['username' => $user->username]);
    	}else{
    		Session::flash('failed', 'failed');
    		return redirect('inputRumah');
    	}
    }
    public function inputTanah(){
        return view('inputTanah');
    }
    public function actionInputTanah(Request $request){
        $user = auth::user();
        $array_kategori = array("Dijual","Disewa/Kontrak");
        $array_tipe = array("Subsidi","Non-Subsidi");
        $jual_tanah = new Penjualan;
        $jual_tanah->user = $user->username;
        $jual_tanah->id_user = $user->id;
        if(in_array($request->kategori,$array_kategori)){
            $jual_tanah->kategori = $request->kategori;
        }else{
            Session::flash('failed', 'failed');
            return redirect('inputTanah');
        }
        
        $jual_tanah->properti = "Tanah";

        if(in_array($request->tipe,$array_tipe)){
            $jual_tanah->tipe = $request->tipe;
        }else{
            Session::flash('failed', 'failed');
            return redirect('inputTanah');
        }
        
        $jual_tanah->kecamatan = $request->kecamatan;
        $jual_tanah->kelurahan = $request->kelurahan;
        $jual_tanah->rt = $request->rt;
        $jual_tanah->rw = $request->rw;
        $jual_tanah->alamat = $request->alamat;
        $jual_tanah->luas_tanah = $request->ltanah;
        if($request->file('ftanah1')){
            $file = $request->file('ftanah1');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/profile/'.$user->id.'/penjualan'),$filename);
            $jual_tanah->frumah = $filename;
        }
        if($request->file('ftanah2')){
            $file = $request->file('ftanah2');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/profile/'.$user->id.'/penjualan'),$filename);
            $jual_tanah->ftamu = $filename;
        }
        if($request->file('ftanah3')){
            $file = $request->file('ftanah3');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/profile/'.$user->id.'/penjualan'),$filename);
            $jual_tanah->ftidur = $filename;
        }
        $jual_tanah->harga = $request->harga;
        $jual_tanah->deskripsi = $request->deskripsi;
        $jual_tanah->save();

        Session::flash('success', 'success');
        return redirect()->route('profile', ['username' => $user->username]);
    }
    public function detail_property($properti,$user,$id){
        $data = penjualan::where('id',$id)->get();
        foreach($data as $i){
                $i->nama_lengkap = DB::table("Users")->where('username',$i->user)->pluck('namalengkap');
                $i->hp = DB::table("Users")->where('username',$i->user)->pluck('hp');
            }
        foreach($data as $i){
            $array_ = array($i->frumah,$i->ftamu,$i->ftidur,$i->fdapur,$i->fhalaman,$i->fmandi);
        }
        $foto = array();
        foreach($array_ as $i){
            if($i !== null){
                array_push($foto,$i);
            }
        }
        #dd($data[0]['id_user']);
        return view('detail_property',['data'=>$data,'foto'=>$foto]);
    }
    public function edit_property($properti,$user,$id){
        //dd($properti,$user,$id);      
        $data = penjualan::where('id',$id)->get();
        return view('edit_property',['data'=>$data]);
    }
    public function editAction(Request $request,$id){
        $update_jual = penjualan::find($id);
        if($request->file('frumah'))
        {
            $file = $request->file('frumah');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/profile/'.Session::get('id').'/penjualan'),$filename);
            $update_jual->frumah = $filename;
        }
        if($request->file('ftamu'))
        {
            $file = $request->file('ftamu');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/profile/'.Session::get('id').'/penjualan'),$filename);
            $update_jual->ftamu = $filename;
        }
        if($request->file('ftidur'))
        {
            $file = $request->file('ftidur');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/profile/'.Session::get('id').'/penjualan'),$filename);
            $update_jual->ftidur = $filename;
        }
        if($request->file('fdapur'))
        {
            $file = $request->file('fdapur');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/profile/'.Session::get('id').'/penjualan'),$filename);
            $update_jual->fdapur = $filename;
        }
        if($request->file('fhalaman'))
        {
            $file = $request->file('fhalaman');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/profile/'.Session::get('id').'/penjualan'),$filename);
            $update_jual->fhalaman = $filename;
        }
        if($request->file('fmandi'))
        {
            $file = $request->file('fmandi');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/profile/'.Session::get('id').'/penjualan'),$filename);
            $update_jual->fmandi = $filename;
        }
        $update_jual->tipe = $request->tipe;
        $update_jual->kecamatan = $request->kecamatan;
        $update_jual->kelurahan = $request->kelurahan;
        $update_jual->rt = $request->rt;
        $update_jual->rw = $request->rw;
        $update_jual->alamat = $request->alamat;
        if($update_jual->kategori === "Dijual" && $update_jual->properti === "Rumah"){
            $update_jual->jk_mandi = $request->jk_mandi;
            $update_jual->jk_tidur = $request->jk_tidur;
            $update_jual->luas_bangun = $request->luas_bangun;
            $update_jual->luas_tanah = $request->luas_tanah;
            $update_jual->deskripsi = $request->deskripsi;
            $update_jual->harga = $request->harga;
            $update_jual->save();
        }else if($update_jual->kategori === "Kamar Kost"){
            $update_jual->jk_mandi = $request->jk_mandi;
            $update_jual->luas_tanah = $request->luas_tanah;
            $update_jual->deskripsi = $request->deskripsi;
            $update_jual->harga = $request->harga;
            $update_jual->save();
        }else if($update_jual->kategori === "Dijual" && $update_jual->properti === "Tanah"){
            $update_jual->luas_tanah = $request->luas_tanah;
            $update_jual->deskripsi = $request->deskripsi;
            $update_jual->harga = $request->harga;
            $update_jual->save();
        }        
        Session::flash('successUpdate', 'Update Success');
        return redirect()->route('profile', ['username' => Session::get('username')]);
        
    }
    public function hapus_property($user,$id){
        Penjualan::where('id', $id)
             ->where('user', $user)
             ->delete();
        return redirect()->route('profile', ['username' => Session::get('username')]);
    }
    public function getData(){
        $penjualan = penjualan::where('user',Session::get('username'))->get(); 
        return Datatables::of($penjualan)->make(true);
    }
    public function profile($username){
    	$data = Users::where('username',Session::get('username'))->get();
        $medias = Medias::where('username',Session::get('username'))->first();
        $penjualan = penjualan::where('user',Session::get('username'))->get(); 
    	return view('profile',['data'=>$data,'medias'=>$medias,'penjualan'=>$penjualan]);
    }
    public function search(Request $request){
        if($request->kelurahan == "Semua" || $request->kecamatan == "Semua")
        {
            $search = penjualan::where('id','>','0')->get();
            foreach($search as $i){
                $i->nama_lengkap = DB::table("Users")->where('username',$i->user)->pluck('namalengkap');
            }
            return view('search',['search'=>$search]);
        }else{
            $search = penjualan::where('kelurahan',$request->kelurahan)->get();
            foreach($search as $i){
                $i->nama_lengkap = DB::table("Users")->where('username',$i->user)->pluck('namalengkap');
            }
            if(count($search) === 0){
                return view('not_found');
            }
            return view('search',['search'=>$search]);
        }
    }
    public function search_head($kategori,$properti){
        $search = penjualan::where("kategori",$kategori)->where("properti",$properti)->get();
        foreach($search as $i){
                $i->nama_lengkap = DB::table("Users")->where('username',$i->user)->pluck('namalengkap');
            }
        return view('search',['search'=>$search]);
    }
    public function searchKost(){
        $search = penjualan::where("kategori","Kamar Kost")->get();
        foreach($search as $i){
                $i->nama_lengkap = DB::table("Users")->where('username',$i->user)->pluck('namalengkap');
            }
        return view('search',['search'=>$search]);
    }
    public function details($id){
        $data = penjualan::where('id',$id)->get();
        foreach($data as $i){
                $i->nama_lengkap = DB::table("Users")->where('username',$i->user)->pluck('namalengkap');
                $i->hp = DB::table("Users")->where('username',$i->user)->pluck('hp');
            }
        foreach($data as $i){
            $array_ = array($i->frumah,$i->ftamu,$i->ftidur,$i->fdapur,$i->fhalaman,$i->fmandi);
        }
        $foto = array();
        foreach($array_ as $i){
            if($i !== null){
                array_push($foto,$i);
            }
        }
        return view('details',['data'=>$data,'foto'=>$foto]);
    }
    /////////AJAX/////////
    public function index(Request $request){
        if($request->ajax()){
            $data = penjualan::latest()->get();
            dd($data);
        }
    }
}
