<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        "category"
    ];

    public function products() {
        return $this->hasMany('App\Models\Product', 'id');
    }

    public static function CategoriesNotInUse() {
        return ProductCategory::doesntHave('products')->get();
    }

}
