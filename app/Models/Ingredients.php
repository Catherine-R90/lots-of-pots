<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    protected $fillable = [
        "recipes_id",
        "ingredient_one",
        "ingredient_quant_one",
        "ingredient_two",
        "ingredient_quant_two",
        "ingredient_three",
        "ingredient_quant_three",
        "ingredient_four",
        "ingredient_quant_four",
        "ingredient_five",
        "ingredient_quant_five",
        "ingredient_six",
        "ingredient_quant_six",
        "ingredient_seven",
        "ingredient_quant_seven",
        "ingredient_eight",
        "ingredient_quant_eight",
        "ingredient_nine",
        "ingredient_quant_nine",
        "ingredient_ten",
        "ingredient_quant_ten",
        "ingredient_one_type",
        "ingredient_two_type",
        "ingredient_three_type",
        "ingredient_four_type",
        "ingredient_five_type",
        "ingredient_six_type",
        "ingredient_seven_type",
        "ingredient_eight_type",
        "ingredient_nine_type",
        "ingredient_ten_type"
    ];

    public function recipe() {
        return $this->belongsTo('App\Models\Recipe', 'recipes_id');
    }
}
