<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanBay extends Model
{
    use HasFactory;

    protected $table = 'sanbay';
    protected $primaryKey = 'idsanbay';
    protected $keyType = 'string';
    protected $fillable = [
        "tensanbay",
        "thanhpho",
        "created_at",
        "updated_at"
    ];

    public function scopeThanhpho($query, $thanhpho = '')
    {
        if ($thanhpho != null && $thanhpho != '') {
            return $query->where("thanhpho", "like", "%" . $thanhpho . "%");
        }
        return $query;
    }
}
