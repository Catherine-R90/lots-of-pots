<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Models\RecipeCategory;
use App\Models\Recipe;
use App\Models\Ingredients;

class IngredientsController extends Controller
{
    // ADD INGREDIENTS VIEW
    public function AdminAddIngredientsView($id) {
        $recipe = Recipe::find($id);

        return view('/admin/add_ingredients', [
            "recipe" => $recipe,
        ]);
    }

    // ADD OR UPDATE INGREDIENTS
    public function AdminAddIngredients(Request $request) {

        $recipeId = $request->input('recipes_id');
        $ingredients = DB::table('ingredients')->where('recipes_id', $recipeId)->first();
   
        if ($request->input('ingredient_one') != null) {
            $ingredientOne = $request->input('ingredient_one');
        } else {
            $ingredientOne = $ingredients->ingredient_one;
        }
        if($request->input('ingredient_quant_one') != null) {
            $ingredientQuantOne = $request->input('ingredient_quant_one');
        } else {
            $ingredientQuantOne = $ingredients->ingredient_quant_one;
        }
        if($request->input('ingredient_one_type') != null) {
            $ingredientOneType = $request->input('ingredient_one_type');
        } else {
            $ingredientOneType = $ingredients->ingredient_one_type;
        }

        if ($request->input('ingredient_two') != null) {
            $ingredientTwo = $request->input('ingredient_two');
        } else {
             $ingredientTwo = $ingredients->ingredient_two;
        }
        if($request->input('ingredient_quant_two') != null) {
            $ingredientQuantTwo = $request->input('ingredient_quant_two');
        } else {
            $ingredientQuantTwo = $ingredients->ingredient_quant_two;
        }
        if($request->input('ingredient_two_type') != null) {
            $ingredientTwoType = $request->input('ingredient_two_type');
        } else {
            $ingredientTwoType = $ingredients->ingredient_two_type;
        }

        if ($request->input('ingredient_three') != null) {
            $ingredientThree = $request->input('ingredient_three');
        } else {
             $ingredientThree = $ingredients->ingredient_three;
        }
        if($request->input('ingredient_quant_three') != null) {
            $ingredientQuantThree = $request->input('ingredient_quant_three');
        } else {
            $ingredientQuantThree = $ingredients->ingredient_quant_three;
        }
        if($request->input('ingredient_three_type') != null) {
            $ingredientThreeType = $request->input('ingredient_three_type');
        } else {
            $ingredientThreeType = $ingredients->ingredient_three_type;
        }

        if ($request->input('ingredient_four') != null) {
            $ingredientFour = $request->input('ingredient_four');
        } else {
             $ingredientFour = $ingredients->ingredient_four;
        }
        if($request->input('ingredient_quant_four') != null) {
            $ingredientQuantFour = $request->input('ingredient_quant_four');
        } else {
            $ingredientQuantFour = $ingredients->ingredient_quant_four;
        }
        if($request->input('ingredient_four_type') != null) {
            $ingredientFourType = $request->input('ingredient_four_type');
        } else {
            $ingredientFourType = $ingredients->ingredient_four_type;
        }

        if ($request->input('ingredient_five') != null) {
            $ingredientFive = $request->input('ingredient_five');
        } else {
             $ingredientFive = $ingredients->ingredient_five;
        }
        if($request->input('ingredient_quant_five') != null) {
            $ingredientQuantFive = $request->input('ingredient_quant_five');
        } else {
            $ingredientQuantFive = $ingredients->ingredient_quant_five;
        }
        if($request->input('ingredient_five_type') != null) {
            $ingredientFiveType = $request->input('ingredient_five_type');
        } else {
            $ingredientFiveType = $ingredients->ingredient_five_type;
        }

        if ($request->input('ingredient_six') != null) {
            $ingredientSix = $request->input('ingredient_six');
        } else {
             $ingredientSix = $ingredients->ingredient_six;
        }
        if($request->input('ingredient_quant_six') != null) {
            $ingredientQuantSix = $request->input('ingredient_quant_six');
        } else {
            $ingredientQuantSix = $ingredients->ingredient_quant_six;
        }
        if($request->input('ingredient_six_type') != null) {
            $ingredientSixType = $request->input('ingredient_six_type');
        } else {
            $ingredientSixType = $ingredients->ingredient_six_type;
        }

        if ($request->input('ingredient_seven') != null) {
            $ingredientSeven = $request->input('ingredient_seven');
        } else {
             $ingredientSeven = $ingredients->ingredient_seven;
        }
        if($request->input('ingredient_quant_seven') != null) {
            $ingredientQuantSeven = $request->input('ingredient_quant_seven');
        } else {
            $ingredientQuantSeven = $ingredients->ingredient_quant_seven;
        }
        if($request->input('ingredient_seven_type') != null) {
            $ingredientSevenType = $request->input('ingredient_seven_type');
        } else {
            $ingredientSevenType = $ingredients->ingredient_seven_type;
        }

        if ($request->input('ingredient_eight') != null) {
            $ingredientEight = $request->input('ingredient_eight');
        } else {
             $ingredientEight = $ingredients->ingredient_eight;
        }
        if($request->input('ingredient_quant_eight') != null) {
            $ingredientQuantEight = $request->input('ingredient_quant_eight');
        } else {
            $ingredientQuantEight = $ingredients->ingredient_quant_eight;
        }
        if($request->input('ingredient_eight_type') != null) {
            $ingredientEightType = $request->input('ingredient_eight_type');
        } else {
            $ingredientEightType = $ingredients->ingredient_eight_type;
        }

        if ($request->input('ingredient_nine') != null) {
            $ingredientNine = $request->input('ingredient_nine');
        } else {
             $ingredientNine = $ingredients->ingredient_nine;
        }
        if($request->input('ingredient_quant_nine') != null) {
            $ingredientQuantNine = $request->input('ingredient_quant_nine');
        } else {
            $ingredientQuantNine = $ingredients->ingredient_quant_nine;
        }
        if($request->input('ingredient_nine_type') != null) {
            $ingredientNineType = $request->input('ingredient_nine_type');
        } else {
            $ingredientNineType = $ingredients->ingredient_nine_type;
        }

        if ($request->input('ingredient_ten') != null) {
            $ingredientTen = $request->input('ingredient_ten');
        } else {
             $ingredientTen = $ingredients->ingredient_ten;
        }
        if($request->input('ingredient_quant_ten') != null) {
            $ingredientQuantTen = $request->input('ingredient_quant_ten');
        } else {
            $ingredientQuantTen = $ingredients->ingredient_quant_ten;
        }
        if($request->input('ingredient_ten_type') != null) {
            $ingredientTenType = $request->input('ingredient_ten_type');
        } else {
            $ingredientTenType = $ingredients->ingredient_ten_type;
        }

        Ingredients::updateOrInsert(
            ['id' => $ingredients->id ],
            [
                'id' => $ingredients->id,
                'recipes_id' => $recipeId,
                'ingredient_one' => $ingredientOne,
                'ingredient_quant_one' => $ingredientQuantOne,
                'ingredient_one_type' => $ingredientOneType,
                'ingredient_two' => $ingredientTwo,
                'ingredient_quant_two' => $ingredientQuantTwo,
                'ingredient_two_type' => $ingredientTwoType,
                'ingredient_three' => $ingredientThree,
                'ingredient_quant_three' => $ingredientQuantThree,
                'ingredient_three_type' => $ingredientThreeType,
                'ingredient_four' => $ingredientFour,
                'ingredient_quant_four' => $ingredientQuantFour,
                'ingredient_four_type' => $ingredientFourType,
                'ingredient_five' => $ingredientFive,
                'ingredient_quant_five' => $ingredientQuantFive,
                'ingredient_five_type' => $ingredientFiveType,
                'ingredient_six' => $ingredientSix,
                'ingredient_quant_six' => $ingredientQuantSix,
                'ingredient_six_type' => $ingredientSixType,
                'ingredient_seven' => $ingredientSeven,
                'ingredient_quant_seven' => $ingredientQuantSeven,
                'ingredient_seven_type' => $ingredientSevenType,
                'ingredient_eight' => $ingredientEight,
                'ingredient_quant_eight' => $ingredientQuantEight,
                'ingredient_eight_type' => $ingredientEightType,
                'ingredient_nine' => $ingredientNine,
                'ingredient_quant_nine' => $ingredientQuantNine,
                'ingredient_nine_type' => $ingredientNineType,
                'ingredient_ten' => $ingredientTen,
                'ingredient_quant_ten' => $ingredientQuantTen,
                'ingredient_ten_type' => $ingredientTenType,
            ]);

        return redirect()->action(
            [RecipeController::Class, 'AdminRecipeOverviewView'])
            ->with('status', 'Ingredients added to recipe!');
    }
}
