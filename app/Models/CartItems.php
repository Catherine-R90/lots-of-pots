<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    protected $fillable = [
        "model_type",
        "product_id",
        "name",
        "price",
        "image",
        "quantity"
    ];

    public function carts() {
        return $this->belongsTo
    }
}
