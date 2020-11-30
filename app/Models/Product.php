<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\ProductImage;

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
        return $this->belongsToMany('App\Models\Recipes', 'product_recipe_linker');
    }

    public static function imagesInUse() {
        return Product::has('images')->get();
    }

    public static function imagesNotInUse() {
        return Product::doesntHave('images')->get();
    } 

    public static function StockLevel() {
        $stock = DB::table('product')->pluck('stock');

        return $stock;
    }
}
