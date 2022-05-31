<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'comment','comment_name','comment_product_id','rating'
    ];
    protected $primaryKey = 'id';
    protected $table = 'comments';
}
