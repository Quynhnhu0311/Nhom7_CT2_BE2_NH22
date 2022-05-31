<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'order_code','id_SP','product_name','product_price','product_qty','product_coupon','id_BH'
    ];
    protected $primaryKey = 'id';
    protected $table = 'detail_orders';

}
