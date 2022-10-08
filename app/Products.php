<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    protected $fillable = ['productName', 'productPrice', 'productDetail', 'image_path', 'views', 'user_id'];
}
