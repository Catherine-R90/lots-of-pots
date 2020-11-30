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

    public function getRouteKey() {
        return $this->slug;
    }
    
    // RECIPE CALCULATOR
    public function PortionCalculator($request){

    }

    // COMMENTS
    public function comments() {
        return $this->hasMany('App\Models\Comment', 'comment_id');
    }
}
