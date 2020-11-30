<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $attributes = [
        "order_status" => null,
        "address_id" => null,
        "user_id" => null
    ];

    public function user() {
        return $this->hasMany('App\Models\User', 'user_id');
    }

    public function product() {
        return $this->belongsToMany('App\Models\Product', 'product_id');
    }
}
