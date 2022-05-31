<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name','email','address','phone','note'
    ];
    protected $primaryKey = 'id';
    protected $table = 'shippings';
}
