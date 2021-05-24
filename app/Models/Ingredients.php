<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    protected $fillable = [
        "recipe_id",
        "ingredient_name",
        "ingredient_quant",
        "ingredient_quant_type"
    ];

    protected $attribbutes = [
        "recipe_id",
        "ingredient_name",
        "ingredient_quant",
        "ingredient_quant_type"
    ];

    public function recipe() {
        return $this->belongsTo(Recipe::class);
    }
}
