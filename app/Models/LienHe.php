<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;
    protected $table = 'lienhe' ;
    protected $primaryKey = 'id' ;
    protected $keyType='string';
    protected $fillable = [
        "hovaten",
        "email",
        "sdt",
        "noidung",
        "created_at",
        "updated_at"
    ];
    public  function  scopeName($query,$Name=''){
        if($Name != null && $Name != ''){
            return $query->where("hovaten","like","%".$Name."%");
        }
        return $query;
    }

}
