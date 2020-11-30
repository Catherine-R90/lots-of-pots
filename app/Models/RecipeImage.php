<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class RecipeImage extends Model
{
    protected $fillable = [
        'image_one_name',
        'image_two_name',
        'image_three_name',
        'recipe_id'
    ];

    public function recipes() {
        return $this->belongsTo('App\Models\Recipe');
    }

    public static function hasProductImages() {
        return Recipe::has('images')->get();
    }
}
