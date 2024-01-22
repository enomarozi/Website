<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = ['namalengkap','fprofile','username','email','password','birthday','kecamatan','kelurahan','alamat','hp'];
    protected $hidden = ['password','remember_token'];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    public function penjualans(){
        return $this->belongTo(penjualans::class,'user');
    }
}
