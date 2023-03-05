<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MayBay extends Model
{
    use HasFactory;
    protected $table = 'maybay' ;
    protected $primaryKey = 'idmaybay' ;
    protected $keyType='string';
    protected $fillable = [
        "hangmaybay",
        "tenmaybay",
        "ghethuong",
        "ghevip",
        "created_at",
        "updated_at"
    ];
    public  function  scopeHangmaybay($query,$hangmaybay=''){
        if($hangmaybay != null && $hangmaybay != ''){
            return $query->where("hangmaybay","like","%".$hangmaybay."%");
        }
        return $query;
    }
    public  function  scopeTenmaybay($query,$tenmaybay=''){
        if($tenmaybay != null && $tenmaybay != ''){
            return $query->where("tenmaybay","like","%".$tenmaybay."%");
        }
        return $query;
    }
}
