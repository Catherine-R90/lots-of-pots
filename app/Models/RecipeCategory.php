<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    protected $attributes = [
        "category" => null
    ];

    public function recipes() {
        return $this->hasMany('App\Models\Recipe', 'recipe_category');
    }

    public static function CategoriesNotInUse() {
        return RecipeCategory::doesntHave('recipes')->get();
    }

}
