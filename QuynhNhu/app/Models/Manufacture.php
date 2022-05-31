<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    use HasFactory;
    function product(){
        return $this->hasMany(Product::class,'manu_id','id');
        //'manu_id' : khoa ngoai, 'id' : khoa chinh
    }
}
