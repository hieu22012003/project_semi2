<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuyenBay extends Model
{
    use HasFactory;
    protected $table = 'chuyenbay' ;
    protected $primaryKey = 'idchuyenbay' ;
    protected $keyType='string';
    protected $fillable = [
        "idmaybay",
        "ngaydi",
        "ngayden",
        "trangthai",
        "giavethuong",
        "giavevip",
        "quangduong",
        "sanbaydi",
        "sanbayden",
        "created_at",
        "updated_at"
    ];
    public  function scopeSanbaydi($query,$sanbaydi=''){
        if($sanbaydi != null && $sanbaydi!=''){
            return $query->where("sanbaydi", $sanbaydi);
        }
        return $query;
    }
    public  function scopeSanbayden($query,$sanbayden=''){
        if($sanbayden != null && $sanbayden!=''){
            return $query->where("sanbayden", $sanbayden);
        }
        return $query;
    }
    public  function scopeNgaydi($query,$ngaydi=''){
        if($ngaydi != null && $ngaydi!=''){
            return $query->where("ngaydi","like","%".$ngaydi."%");
        }
        return $query;
    }
    public  function scopeNgayden($query,$ngayden=''){
        if($ngayden != null && $ngayden!=''){
            return $query->where("ngayden","like","%".$ngayden."%");
        }
        return $query;
    }
    public  function scopeTrangthai($query,$trangthai=''){
        if($trangthai != null && $trangthai!=''){
            return $query->where("trangthai", $trangthai);
        }
        return $query;
    }



    public function sanbay1(){
        return $this->belongsTo(SanBay::class,"sanbaydi","idsanbay");
    }
    public function sanbay2(){
        return $this->belongsTo(SanBay::class,"sanbayden","idsanbay");
    }
    public function maybay(){
        return $this->belongsTo(MayBay::class,"idmaybay","idmaybay");
    }

}
