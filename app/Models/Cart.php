<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        "product_id",
        "product_image_id",
        "price",
        "quantity",
        "session_id",
        "delivery_option"
    ];

    public function products() {
        return $this->hasMany('App\Models\Product', 'product_id');
    }
}
