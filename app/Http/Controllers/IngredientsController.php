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

    // EDIT INGREDIENTS VIEW
    public function AdminEditIngredientsView($id) {
        $recipe = Recipe::find($id);

        return view('/admin/edit_ingredients', [
            "recipe" => $recipe
        ]);
    }

    // ADD INGREDIENTS
    public function AdminAddIngredients(Request $request) {
        $recipeId = $request->input('recipe_id');
        $ingredients = Ingredients::create($request->all());

        return redirect()->action(
            [RecipeController::Class, 'AdminRecipeOverviewView'])
            ->with('status', 'Ingredients added to recipe!');
    }

    // EDIT INGREDIENTS
    public function AdminEditIngredients(Request $request) {

        $recipeId = $request->input('recipes_id');
        $ingredients = Ingredients::where('recipes_id', $recipeId)->first();
   
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

        if ($request->input('ingredient_eleven') != null) {
            $ingredientEleven = $request->input('ingredient_eleven');
        } else {
             $ingredientEleven = $ingredients->ingredient_eleven;
        }
        if($request->input('ingredient_quant_eleven') != null) {
            $ingredientQuantEleven = $request->input('ingredient_quant_eleven');
        } else {
            $ingredientQuantEleven = $ingredients->ingredient_quant_eleven;
        }
        if($request->input('ingredient_eleven_type') != null) {
            $ingredientElevenType = $request->input('ingredient_eleven_type');
        } else {
            $ingredientElevenType = $ingredients->ingredient_eleven_type;
        }

        if ($request->input('ingredient_twelve') != null) {
            $ingredientTwelve = $request->input('ingredient_twelve');
        } else {
             $ingredientTwelve = $ingredients->ingredient_twelve;
        }
        if($request->input('ingredient_quant_twelve') != null) {
            $ingredientQuantTwelve = $request->input('ingredient_quant_twelve');
        } else {
            $ingredientQuantTwelve = $ingredients->ingredient_quant_twelve;
        }
        if($request->input('ingredient_twelve_type') != null) {
            $ingredientTwelveType = $request->input('ingredient_twelve_type');
        } else {
            $ingredientTwelveType = $ingredients->ingredient_twelve_type;
        }

        if ($request->input('ingredient_thirteen') != null) {
            $ingredientThirteen = $request->input('ingredient_thirteen');
        } else {
             $ingredientThirteen = $ingredients->ingredient_thirteen;
        }
        if($request->input('ingredient_quant_thirteen') != null) {
            $ingredientQuantThirteen = $request->input('ingredient_quant_thirteen');
        } else {
            $ingredientQuantThirteen = $ingredients->ingredient_quant_thirteen;
        }
        if($request->input('ingredient_thirteen_type') != null) {
            $ingredientThirteenType = $request->input('ingredient_thirteen_type');
        } else {
            $ingredientThirteenType = $ingredients->ingredient_thirteen_type;
        }

        if ($request->input('ingredient_fourteen') != null) {
            $ingredientFourteen = $request->input('ingredient_fourteen');
        } else {
             $ingredientFourteen = $ingredients->ingredient_fourteen;
        }
        if($request->input('ingredient_quant_fourteen') != null) {
            $ingredientQuantFourteen = $request->input('ingredient_quant_fourteen');
        } else {
            $ingredientQuantFourteen = $ingredients->ingredient_quant_fourteen;
        }
        if($request->input('ingredient_fourteen_type') != null) {
            $ingredientFourteenType = $request->input('ingredient_fourteen_type');
        } else {
            $ingredientFourteenType = $ingredients->ingredient_fourteen_type;
        }

        if ($request->input('ingredient_fifteen') != null) {
            $ingredientFifteen = $request->input('ingredient_fifteen');
        } else {
             $ingredientFifteen = $ingredients->ingredient_fifteen;
        }
        if($request->input('ingredient_quant_fifteen') != null) {
            $ingredientQuantFifteen = $request->input('ingredient_quant_fifteen');
        } else {
            $ingredientQuantFifteen = $ingredients->ingredient_quant_fifteen;
        }
        if($request->input('ingredient_fifteen_type') != null) {
            $ingredientFifteenType = $request->input('ingredient_fifteen_type');
        } else {
            $ingredientFifteenType = $ingredients->ingredient_fifteen_type;
        }

        if ($request->input('ingredient_sixteen') != null) {
            $ingredientSixteen = $request->input('ingredient_sixteen');
        } else {
             $ingredientSixteen = $ingredients->ingredient_sixteen;
        }
        if($request->input('ingredient_quant_sixteen') != null) {
            $ingredientQuantSixteen = $request->input('ingredient_quant_sixteen');
        } else {
            $ingredientQuantSixteen = $ingredients->ingredient_quant_sixteen;
        }
        if($request->input('ingredient_sixteen_type') != null) {
            $ingredientSixteenType = $request->input('ingredient_sixteen_type');
        } else {
            $ingredientSixteenType = $ingredients->ingredient_sixteen_type;
        }

        if ($request->input('ingredient_seventeen') != null) {
            $ingredientSeventeen = $request->input('ingredient_seventeen');
        } else {
             $ingredientSeventeen = $ingredients->ingredient_seventeen;
        }
        if($request->input('ingredient_quant_seventeen') != null) {
            $ingredientQuantSeventeen = $request->input('ingredient_quant_seventeen');
        } else {
            $ingredientQuantSeventeen = $ingredients->ingredient_quant_seventeen;
        }
        if($request->input('ingredient_seventeen_type') != null) {
            $ingredientSeventeenType = $request->input('ingredient_seventeen_type');
        } else {
            $ingredientSeventeenType = $ingredients->ingredient_seventeen_type;
        }

        if ($request->input('ingredient_eighteen') != null) {
            $ingredientEighteen = $request->input('ingredient_eighteen');
        } else {
             $ingredientEighteen = $ingredients->ingredient_eighteen;
        }
        if($request->input('ingredient_quant_eighteen') != null) {
            $ingredientQuantEighteen = $request->input('ingredient_quant_eighteen');
        } else {
            $ingredientQuantEighteen = $ingredients->ingredient_quant_eighteen;
        }
        if($request->input('ingredient_eighteen_type') != null) {
            $ingredientEighteenType = $request->input('ingredient_eighteen_type');
        } else {
            $ingredientEighteenType = $ingredients->ingredient_eighteen_type;
        }

        if ($request->input('ingredient_nineteen') != null) {
            $ingredientNineteen = $request->input('ingredient_nineteen');
        } else {
             $ingredientNineteen = $ingredients->ingredient_nineteen;
        }
        if($request->input('ingredient_quant_nineteen') != null) {
            $ingredientQuantNineteen = $request->input('ingredient_quant_nineteen');
        } else {
            $ingredientQuantNineteen = $ingredients->ingredient_quant_nineteen;
        }
        if($request->input('ingredient_nineteen_type') != null) {
            $ingredientNineteenType = $request->input('ingredient_nineteen_type');
        } else {
            $ingredientNineteenType = $ingredients->ingredient_nineteen_type;
        }

        if ($request->input('ingredient_twenty') != null) {
            $ingredientTwenty = $request->input('ingredient_twenty');
        } else {
             $ingredientTwenty = $ingredients->ingredient_twenty;
        }
        if($request->input('ingredient_quant_twenty') != null) {
            $ingredientQuantTwenty = $request->input('ingredient_quant_twenty');
        } else {
            $ingredientQuantTwenty = $ingredients->ingredient_quant_twenty;
        }
        if($request->input('ingredient_twenty_type') != null) {
            $ingredientTwentyType = $request->input('ingredient_twenty_type');
        } else {
            $ingredientTwentyType = $ingredients->ingredient_twenty_type;
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
                'ingredient_eleven' => $ingredientEleven,
                'ingredient_quant_eleven' => $ingredientQuantEleven,
                'ingredient_eleven_type' => $ingredientElevenType,
                'ingredient_twelve' => $ingredientTwelve,
                'ingredient_quant_twelve' => $ingredientQuantTwelve,
                'ingredient_twelve_type' => $ingredientTwelveType,
                'ingredient_thirteen' => $ingredientThirteen,
                'ingredient_quant_thirteen' => $ingredientQuantThirteen,
                'ingredient_thirteen_type' => $ingredientThirteenType,
                'ingredient_fourteen' => $ingredientFourteen,
                'ingredient_quant_fourteen' => $ingredientQuantFourteen,
                'ingredient_fourteen_type' => $ingredientFourteenType,
                'ingredient_fifteen' => $ingredientFifteen,
                'ingredient_quant_fifteen' => $ingredientQuantFifteen,
                'ingredient_fifteen_type' => $ingredientFifteenType,
                'ingredient_sixteen' => $ingredientSixteen,
                'ingredient_quant_sixteen' => $ingredientQuantSixteen,
                'ingredient_sixteen_type' => $ingredientSixteenType,
                'ingredient_eighteen' => $ingredientEighteen,
                'ingredient_quant_eighteen' => $ingredientQuantEighteen,
                'ingredient_eighteen_type' => $ingredientEighteenType,
                'ingredient_nineteen' => $ingredientNineteen,
                'ingredient_quant_nineteen' => $ingredientQuantNineteen,
                'ingredient_nineteen_type' => $ingredientNineteenType,
                'ingredient_twenty' => $ingredientTwenty,
                'ingredient_quant_twenty' => $ingredientQuantTwenty,
                'ingredient_twenty_type' => $ingredientTwentyType,
            ]);

        return redirect()->action(
            [RecipeController::Class, 'AdminRecipeOverviewView'])
            ->with('status', 'Ingredients updated on recipe!');
    }
}
