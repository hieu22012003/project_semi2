<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChamSocKhachHang extends Model
{
    use HasFactory;
    protected $table = 'chamsockhachhang' ;
    protected $fillable = [
        "iduser",
        "idlienhe",
        "created_at",
        "updated_at"
    ];
    public  function  scopeIDUSER($query,$IDUSER=''){
        if($IDUSER != null && $IDUSER != ''){
            return $query->where("iduser","like","%".$IDUSER."%");
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
        return $this->belongsTo(User::class,'iduser','id');
    }

    public function lienhe(){
        return $this->belongsTo(User::class,'idlienhe','id');
    }
}
