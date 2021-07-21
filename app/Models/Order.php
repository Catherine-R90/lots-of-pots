<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "order_status",
        "delivery_address_id",
        "user_id",
        "delivery_option",
        "session_id",
        "order_number"
    ];

    public function users() {
        return $this->hasMany('App\Models\User', 'user_id');
    }

    public function products() {
        return $this->belongsToMany('App\Models\Product', 'order_product_linker')->withPivot('quantity', 'order_price');
    }

    public function address() {
        return $this->belongsTo('App\Models\DeliveryAddress', 'delivery_address_id');
    }
}
