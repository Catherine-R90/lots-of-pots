<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_one_name',
        'image_two_name',
        'image_three_name',
        'image_four_name',
        "product_id"
    ];

    public function product() {
        return $this->belongsTo('App\Models\Product');
    }

    
}
