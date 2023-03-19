<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChamSocKhachHang extends Model
{
    use HasFactory;
    protected $table = 'cskh' ;
    protected $fillable = [
        "userid",
        "idlienhe",
        "created_at",
        "updated_at"
    ];
    public  function  scopeuserid($query,$userid=''){
        if($userid != null && $userid != ''){
            return $query->where("useridr","like","%".$userid."%");
        }
        return $query;
    }
    public  function  scopeIDLIENHE($query,$IDLIENHE=''){
        if($IDLIENHE != null && $IDLIENHE != ''){
            return $query->where("idlienhe","like","%".$IDLIENHE."%");
        }
        return $query;
    }
    public function users(){
        return $this->belongsTo(User::class,'userid','id');
    }

    public function lienhe(){
        return $this->belongsTo(User::class,'idlienhe','id');
    }
}
