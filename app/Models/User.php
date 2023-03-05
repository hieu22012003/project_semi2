<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    protected $table = 'users' ;
    protected $primaryKey = 'id' ;
    protected $keyType='string';
    protected $fillable = [
        "name",
        "email",
        "email_verified_at",
        "password",
        "role",
        "avatar",
        "sdt",
        "diachi",
        "dambay",
        "created_at",
        "updated_at"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function  scopeName($query,$Name=''){
        if($Name != null && $Name != ''){
            return $query->where("name","like","%".$Name."%");
        }
        return $query;
    }

    public  function  getavatar(){
        if($this->avatar){
            return $this->avatar;
        }
        return null;
    }

    public function sanbay1(){
        return $this->belongsTo(SanBay::class,"sanbaydi","idsanbay");
    }
    public function sanbay2(){
        return $this->belongsTo(SanBay::class,"sanbayden","idsanbay");
    }
    public function sanbaydi(){
        return $this->belongsTo(SanBay::class,"sanbaydi","idsanbay");
    }
}
