<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        "name",
        "prep_time",
        "cook_time",
        "instructions",
        "recipe_category",
        "description",
        "num_of_ingredients"
    ];

    public function ingredients() {
        return $this->hasMany(Ingredients::class);
    }

    // COMMENTS
    public function comments() {
        return $this->hasMany('App\Models\Comment', 'comment_id');
    }

    // PRODUCTS
    public function products() {
        return $this->belongsToMany('App\Models\Product', 'product_recipe_linker');
    }
}
