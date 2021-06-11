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
<<<<<<< HEAD
        return $this->hasMany('App\Models\Order');
=======
        return $this->belongsTo('App\Models\Order');
>>>>>>> 0831cf0753259b73cb3ece5f6b19efa2ed4e05e9
    }
}
