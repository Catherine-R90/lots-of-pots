<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    protected $fillable = [
        'name',
        'first_line',
        'second_line',
        'city',
        'postcode',
        'phone_number',
        'email',
        'user_id'
    ];

    public function orders() {
        return $this->belongsTo('App\Models\Order');
    }
}
