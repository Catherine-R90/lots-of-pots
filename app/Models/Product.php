<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\Order;

class Product extends Model
{
    protected $fillable =[
        "name",
        "description",
        "price",
        "details",
        "product_category_id",
        "stock"
    ];

    public function images() {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function recipes() {
        return $this->belongsToMany('App\Models\Recipe', 'product_recipe_linker');
    }

    public function orders() {
        return $this->belongsToMany('App\Models\Order', 'order_product_linker');
    }

    public static function imagesInUse() {
        return Product::has('images')->get();
    }

    public static function imagesNotInUse() {
        return Product::doesntHave('images')->get();
    } 
}
