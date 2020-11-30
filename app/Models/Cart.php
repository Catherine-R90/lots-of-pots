<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $attributes = [
        "subtotal",
        "discount",
        "discount_percentage",
        "shipping_charges",
        "net_total",
        "tax",
        "total",
        "round_off",
        "payable"
    ];

    protected $hidden = [
        "cookie",
        "auth_user",
        "coupon_id",
    ]; 
}
