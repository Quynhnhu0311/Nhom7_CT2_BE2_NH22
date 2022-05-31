<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id_shipping','id_user','order_code','order_status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'orders';
}
