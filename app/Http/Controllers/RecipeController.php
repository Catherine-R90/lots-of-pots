<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Models\RecipeCategory;
use App\Models\Recipe;
use App\Models\RecipeImage;
use App\Models\Ingredients;
use App\Models\Product;
use App\Http\Requests\AddRecipe;
use App\Http\Requests\EditRecipe;

class RecipeController extends Controller
{
    // VIEWS
    public function RecipeView($id) {
        $recipe = Recipe::find($id);
        $images = DB::table('recipe_images')
                            ->where('recipe_id', $id)
                            ->get();

        $data = Ingredients::where('recipes_id', $id)
                            ->first();

            $ingredients = [
            $data->ingredient_one." ".$data->ingredient_quant_one,
            $data->ingredient_two." ".$data->ingredient_quant_two,
            $data->ingredient_three." ".$data->ingredient_quant_three,
            $data->ingredient_four." ".$data->ingredient_quant_four,
            $data->ingredient_five." ".$data->ingredient_quant_five,
            $data->ingredient_six." ".$data->ingredient_quant_six,
            $data->ingredient_seven." ".$data->ingredient_quant_seven,
            $data->ingredient_eight." ".$data->ingredient_quant_eight,
            $data->ingredient_nine." ".$data->ingredient_quant_nine,
            $data->ingredient_ten." ".$data->ingredient_quant_ten,
        ];

        $instructions = preg_split('/[.]/', $recipe->instructions);
                    
        return view('/recipes/recipe', [
            "recipe" => $recipe,
            "images" => $images,
            "ingredients" => $ingredients,
            "instructions" => $instructions
        ]);
    }

    // ADMIN RECIPE CONTROLS
    public function AdminRecipeOverviewView() {
        return view('/admin/recipe_manage_overview');
    }

    public function AdminAddRecipeView() {
        $categories = RecipeCategory::all();
        $products = Product::all();
        return view('/admin/add_recipe',[
            "categories" => $categories,
            "products" => $products
        ]);
    }

    public function AdminDeleteRecipeView() {
        $recipes = Recipe::all();

        return view('/admin/delete_recipe',[
        "recipes" => $recipes,
        ]);
    }

    public function AdminEditRecipeView() {
        $recipes = Recipe::all();
        $categories = RecipeCategory::all();
        $products = Product::all();

        return view('/admin/edit_recipe', [
            "recipes" => $recipes,
            "categories" => $categories,
            "products" => $products
        ]);
    }


    // FUNCTIONS
    // ADD RECIPE
    public function AdminAddRecipe(AddRecipe $request) {
        
        // IMAGES
        $imageOneName = $request->input('image_one_name');
        $imageTwoName = $request->input('image_two_name');
        $imageThreeName = $request->input('image_three_name');

        $request->file('image_one')->storeAs('recipeImages', $imageOneName);

        if ($request->file('image_two') != null) {
            $request->file('image_two')->storeAs('recipeImages', $imageTwoName);
        }
        if ($request->file('image_three') != null) {
            $request->file('image_three')->storeAs('recipeImages', $imageThreeName);
        }

        // CREATE RECIPE
        $recipe = Recipe::create($request->all());
        $id = $recipe->id;

        // RECIPE PRODUCT
        if ($request->input('productId[]')!= null) {
            $productId[] = $request->input('productId');
            $recipe->product->save($productId[]);
        }
    
        // CREATE RECIPE IMAGE
        $recipeImage = new RecipeImage;
        $recipeImage->recipe_id = $id;
        $recipeImage->image_one_name = $imageOneName;
        $recipeImage->image_two_name = $imageTwoName;
        $recipeImage->image_three_name = $imageThreeName;
        $recipeImage->save();

        // INGREDIENTS
        if ($request->input('ingredient_one') != null) {
            $ingredientOne = $request->input('ingredient_one');
        
            if ($request->input('ingredient_quant_one')!= null) {
                $ingredientOneQuant = $request->input('ingredient_quant_one');

                Ingredients::updateOrInsert(
                    ["recipes_id" => $id],
                    ["recipes_id" => $id,
                    "ingredient_one" => $ingredientOne,
                    "ingredient_quant_one" => $ingredientOneQuant,
                    ]);
            
                if ($request->input('ingredient_two')!= null) {
                    $ingredientTwo = $request->input('ingredient_two');
                
                    if ($request->input('ingredient_quant_two')!= null) {
                        $ingredientTwoQuant = $request->input('ingredient_quant_two');
                    
                        Ingredients::updateOrInsert(
                            ["recipes_id" => $id],
                            ["recipes_id" => $id,
                            "ingredient_one" => $ingredientOne,
                            "ingredient_quant_one" => $ingredientOneQuant,
                            "ingredient_two" => $ingredientTwo,
                            "ingredient_quant_two" => $ingredientOneQuant,
                            ]);

                        if ($request->input('ingredient_three')!= null) {
                            $ingredientThree = $request->input('ingredient_three');
                        
                            if ($request->input('ingredient_quant_three')!= null) {
                                $ingredientThreeQuant = $request->input('ingredient_quant_three');
                            
                                Ingredients::updateOrInsert(
                                    ["recipes_id" => $id],
                                    ["recipes_id" => $id,
                                    "ingredient_one" => $ingredientOne,
                                    "ingredient_quant_one" => $ingredientOneQuant,
                                    "ingredient_two" => $ingredientTwo,
                                    "ingredient_quant_two" => $ingredientTwoQuant,
                                    "ingredient_three" => $ingredientThree,
                                    "ingredient_quant_three" => $ingredientThreeQuant,]);

                                if ($request->input('ingredient_four')!= null) {
                                    $ingredientFour = $request->input('ingredient_four');
                                
                                    if ($request->input('ingredient_quant_four')!= null) {
                                        $ingredientFourQuant = $request->input('ingredient_quant_four');
                                    
                                        Ingredients::updateOrInsert(
                                            ["recipes_id" => $id],
                                            ["recipes_id" => $id,
                                            "ingredient_one" => $ingredientOne,
                                            "ingredient_quant_one" => $ingredientOneQuant,
                                            "ingredient_two" => $ingredientTwo,
                                            "ingredient_quant_two" => $ingredientTwoQuant,
                                            "ingredient_three" => $ingredientThree,
                                            "ingredient_quant_three" => $ingredientThreeQuant,
                                            "ingredient_four" => $ingredientFour,
                                            "ingredient_quant_four" => $ingredientFourQuant,]);

                                        if ($request->input('ingredient_five')!= null) {
                                            $ingredientFive = $request->input('ingredient_five');
                                        
                                            if ($request->input('ingredient_quant_five')!= null) {
                                                $ingredientFiveQuant = $request->input('ingredient_quant_five');
                                            
                                                Ingredients::updateOrInsert(
                                                    ["recipes_id" => $id],
                                                    ["recipes_id" => $id,
                                                    "ingredient_one" => $ingredientOne,
                                                    "ingredient_quant_one" => $ingredientOneQuant,
                                                    "ingredient_two" => $ingredientTwo,
                                                    "ingredient_quant_two" => $ingredientTwoQuant,
                                                    "ingredient_three" => $ingredientThree,
                                                    "ingredient_quant_three" => $ingredientThreeQuant,
                                                    "ingredient_four" => $ingredientFour,
                                                    "ingredient_quant_four" => $ingredientFourQuant,
                                                    "ingredient_five" => $ingredientFive,
                                                    "ingredient_quant_five" => $ingredientFiveQuant,]);

                                                if ($request->input('ingredient_six') != null) {
                                                    $ingredientSix = $request->input('ingredient_six');
                                                
                                                    if ($request->input('ingredient_quant_six') != null) {
                                                        $ingredientSixQuant = $request->input('ingredient_quant_six');
                                                    
                                                        Ingredients::updateOrInsert(
                                                            ["recipes_id" => $id],
                                                            ["recipes_id" => $id,
                                                            "ingredient_one" => $ingredientOne,
                                                            "ingredient_quant_one" => $ingredientOneQuant,
                                                            "ingredient_two" => $ingredientTwo,
                                                            "ingredient_quant_two" => $ingredientTwoQuant,
                                                            "ingredient_three" => $ingredientThree,
                                                            "ingredient_quant_three" => $ingredientThreeQuant,
                                                            "ingredient_four" => $ingredientFour,
                                                            "ingredient_quant_four" => $ingredientFourQuant,
                                                            "ingredient_five" => $ingredientFive,
                                                            "ingredient_quant_five" => $ingredientFiveQuant,
                                                            "ingredient_six" => $ingredientSix,
                                                            "ingredient_quant_six" => $ingredientSixQuant,]);

                                                        if ($request->input('ingredient_seven')!= null) {
                                                            $ingredientSeven = $request->input('ingredient_seven');

                                                            if ($request->input('ingredient_quant_seven')!= null) {
                                                                $ingredientSevenQuant = $request->input('ingredient_quant_seven');
                                                            
                                                                Ingredients::updateOrInsert(
                                                                    ["recipes_id" => $id],
                                                                    ["recipes_id" => $id,
                                                                    "ingredient_one" => $ingredientOne,
                                                                    "ingredient_quant_one" => $ingredientOneQuant,
                                                                    "ingredient_two" => $ingredientTwo,
                                                                    "ingredient_quant_two" => $ingredientTwoQuant,
                                                                    "ingredient_three" => $ingredientThree,
                                                                    "ingredient_quant_three" => $ingredientThreeQuant,
                                                                    "ingredient_four" => $ingredientFour,
                                                                    "ingredient_quant_four" => $ingredientFourQuant,
                                                                    "ingredient_five" => $ingredientFive,
                                                                    "ingredient_quant_five" => $ingredientFiveQuant,
                                                                    "ingredient_six" => $ingredientSix,
                                                                    "ingredient_quant_six" => $ingredientSixQuant,
                                                                    "ingredient_seven" => $ingredientSeven,
                                                                    "ingredient_quant_seven" => $ingredientSevenQuant,]);

                                                                if($request->input('ingredient_eight')!= null) {
                                                                    $ingredientEight = $request->input('ingredient_eight');
                                                                
                                                                    if ($request->input('ingredient_quant_eight')!= null) {
                                                                        $ingredientEightQuant = $request->input('ingredient_quant_eight');

                                                                        Ingredients::updateOrInsert(
                                                                            ["recipes_id" => $id],
                                                                            ["recipes_id" => $id,
                                                                            "ingredient_one" => $ingredientOne,
                                                                            "ingredient_quant_one" => $ingredientOneQuant,
                                                                            "ingredient_two" => $ingredientTwo,
                                                                            "ingredient_quant_two" => $ingredientTwoQuant,
                                                                            "ingredient_three" => $ingredientThree,
                                                                            "ingredient_quant_three" => $ingredientThreeQuant,
                                                                            "ingredient_four" => $ingredientFour,
                                                                            "ingredient_quant_four" => $ingredientFourQuant,
                                                                            "ingredient_five" => $ingredientFive,
                                                                            "ingredient_quant_five" => $ingredientFiveQuant,
                                                                            "ingredient_six" => $ingredientSix,
                                                                            "ingredient_quant_six" => $ingredientSixQuant,
                                                                            "ingredient_seven" => $ingredientSeven,
                                                                            "ingredient_quant_seven" => $ingredientSevenQuant,
                                                                            "ingredient_eight" => $ingredientEight,
                                                                            "ingredient_quant_eight" => $ingredientEightQuant,]);
                                                                    
                                                                        if ($request->input('ingredient_nine')!= null) {
                                                                            $ingredientNine = $request->input('ingredient_nine');
                                                                        
                                                                            if ($request->input('ingredient_quant_nine')!= null) {
                                                                                $ingredientNineQuant = $request->input('ingredient_quant_nine');
                                                                            
                                                                                Ingredients::updateOrInsert(
                                                                                    ["recipes_id" => $id],
                                                                                    ["recipes_id" => $id,
                                                                                    "ingredient_one" => $ingredientOne,
                                                                                    "ingredient_quant_one" => $ingredientOneQuant,
                                                                                    "ingredient_two" => $ingredientTwo,
                                                                                    "ingredient_quant_two" => $ingredientTwoQuant,
                                                                                    "ingredient_three" => $ingredientThree,
                                                                                    "ingredient_quant_three" => $ingredientThreeQuant,
                                                                                    "ingredient_four" => $ingredientFour,
                                                                                    "ingredient_quant_four" => $ingredientFourQuant,
                                                                                    "ingredient_five" => $ingredientFive,
                                                                                    "ingredient_quant_five" => $ingredientFiveQuant,
                                                                                    "ingredient_six" => $ingredientSix,
                                                                                    "ingredient_quant_six" => $ingredientSixQuant,
                                                                                    "ingredient_seven" => $ingredientSeven,
                                                                                    "ingredient_quant_seven" => $ingredientSevenQuant,
                                                                                    "ingredient_eight" => $ingredientEight,
                                                                                    "ingredient_quant_eight" => $ingredientEightQuant,
                                                                                    "ingredient_nine" => $ingredientNine,
                                                                                    "ingredient_quant_nine" => $ingredientNineQuant,]);

                                                                                if ($request->input('ingredient_ten')!= null) {
                                                                                    $ingredientTen = $request->input('ingredient_ten');
                                                                                
                                                                                    if ($request->input('ingredient_quant_ten')!= null) {
                                                                                        $ingredientTenQuant = $request->input('ingredient_quant_ten');
                                                                                    
                                                                                        Ingredients::updateOrInsert(
                                                                                            ["recipes_id" => $id],
                                                                                            ["recipes_id" => $id,
                                                                                            "ingredient_one" => $ingredientOne,
                                                                                            "ingredient_quant_one" => $ingredientOneQuant,
                                                                                            "ingredient_two" => $ingredientTwo,
                                                                                            "ingredient_quant_two" => $ingredientTwoQuant,
                                                                                            "ingredient_three" => $ingredientThree,
                                                                                            "ingredient_quant_three" => $ingredientThreeQuant,
                                                                                            "ingredient_four" => $ingredientFour,
                                                                                            "ingredient_quant_four" => $ingredientFourQuant,
                                                                                            "ingredient_five" => $ingredientFive,
                                                                                            "ingredient_quant_five" => $ingredientFiveQuant,
                                                                                            "ingredient_six" => $ingredientSix,
                                                                                            "ingredient_quant_six" => $ingredientSixQuant,
                                                                                            "ingredient_seven" => $ingredientSeven,
                                                                                            "ingredient_quant_seven" => $ingredientSevenQuant,
                                                                                            "ingredient_eight" => $ingredientEight,
                                                                                            "ingredient_quant_eight" => $ingredientEightQuant,
                                                                                            "ingredient_nine" => $ingredientNine,
                                                                                            "ingredient_quant_nine" => $ingredientNineQuant,
                                                                                            "ingredient_ten" => $ingredientTen,
                                                                                            "ingredient_quant_ten" => $ingredientTenQuant
                                                                                            ]
                                                                                        );}
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return redirect()->back();
    }

    // EDIT RECIPE
    public function AdminEditRecipe(EditRecipe $request) {
        // FIND RECIPE
        $recipeId = $request->input('recipe_id');
        $recipe = Recipe::find($recipeId);

        // UPDATE RECIPE
        if ($request->input('name') != null) {
            $recipe->name = $request->input('name');
            $recipe->save();
        }
        if ($request->input('prep_time') != null) {
            $recipe->prep_time = $request->input('prep_time');
            $recipe->save();
        }
        if ($request->input('cook_time') != null) {
            $recipe->cook_time = $request->input('cook_time');
            $recipe->save();
        }
        if ($request->input('instructions') != null) {
            $recipe->instructions = $request->input('instructions');
            $recipe->save();
        }
        if ($request->input('recipe_category') != null) {
            $recipe->recipe_category = $request->input('recipe_category');
            $recipe->save();
        }
        if ($request->input('description') != null) {
            $recipe->description = $request->input('description');
            $recipe->save();
        }
        if ($request->input('num_of_ingredients') != null) {
            $recipe->num_of_ingredients = $request->input('num_of_ingredients');
            $recipe->save();
        }
        
        // IMAGES
        if ($request->input('image_one_name')!= null) {
            $imageOneName = $request->input('image_one_name');
            
            DB::table('recipe_images')->updateOrInsert(
                ['recipe_id' => $recipeId],
                ['recipe_id' => $recipeId,
                'image_one_name' => $imageOneName,]);

                if ($request->file('image_one') != null) {
                        $request->file('image_one')->storeAs('recipeImages', $imageOneName);
                }

            if ($request->input('image_two_name')) {
                $imageTwoName = $request->input('image_two_name');

                DB::table('recipe_images')->updateOrInsert(
                    ['recipe_id' => $recipeId],
                    ['recipe_id' => $recipeId,
                    'image_one_name' => $imageOneName, 
                    'image_two_name' => $imageTwoName,]);
            
                    if ($request->file('image_one') != null) {
                    $imageOne = $request->file('image_one')->storeAs('recipeImages', $imageOneName);
                    }
                    if ($request->file('image_two') != null) {
                        $imageTwo = $request->file('image_two')->storeAs('recipeImages', $imageTwoName);
                    }
                    
                if ($request->input('image_three_name')!= null) {
                    $imageThreeName = $request->input('image_three_name');
                
                    DB::table('recipe_images')->updateOrInsert(
                        ['recipe_id' => $recipeId],
                        ['recipe_id' => $recipeId,
                        'image_one_name' => $imageOneName, 
                        'image_two_name' => $imageTwoName, 
                        'image_three_name' => $imageThreeName]);

                        if ($request->file('image_one') != null) {
                            $request->file('image_one')->storeAs('recipeImages', $imageOneName);
                        }
                        if ($request->file('image_two') != null) {
                            $request->file('image_two')->storeAs('recipeImages', $imageTwoName);
                        }
                        if ($request->file('image_three') != null) {
                            $request->file('image_three')->storeAs('recipeImages', $imageThreeName);
                        }
                }
            }
        }
        
        // INGREDIENTS
        if ($request->input('ingredient_one') != null) {
            $ingredientOne = $request->input('ingredient_one');
        
            DB::table('ingredients')->updateOrInsert(
                ["recipes_id" => $recipeId],
                ["recipes_id" => $recipeId,
                "ingredient_one" => $ingredientOne,]);
        }

        if ($request->input('ingredient_quant_one')!= null) {
            $ingredientOneQuant = $request->input('ingredient_quant_one');
        
            DB::table('ingredients')->updateOrInsert(
                ["recipes_id" => $recipeId],
                ["recipes_id" => $recipeId,
                "ingredient_quant_one" => $ingredientOneQuant,]);
        }

        $ingredientOneType = $request->input('ingredient_one_type');
        $ingredientTwo = $request->input('ingredient_two');
        $ingredientTwoQuant = $request->input('ingredient_quant_two');
        $ingredientTwoType = $request->input('ingredient_two_type');
        $ingredientThree = $request->input('ingredient_three');
        $ingredientThreeQuant = $request->input('ingredient_quant_three');
        $ingredientThreeType = $request->input('ingredient_three_type');
        $ingredientFour = $request->input('ingredient_four');
        $ingredientFourQuant = $request->input('ingredient_quant_four');
        $ingredientFourType = $request->input('ingredient_four_type');
        $ingredientFive = $request->input('ingredient_five');
        $ingredientFiveQuant = $request->input('ingredient_quant_five');
        $ingredientFiveType = $request->input('ingredient_five_type');
        $ingredientSix = $request->input('ingredient_six');
        $ingredientSixQuant = $request->input('ingredient_quant_six');
        $ingredientSixType = $request->input('ingredient_six_type');
        $ingredientSeven = $request->input('ingredient_seven');
        $ingredientSevenQuant = $request->input('ingredient_quant_seven');
        $ingredientSevenType = $request->input('ingredient_seven_type');
        $ingredientEight = $request->input('ingredient_eight');
        $ingredientEightQuant = $request->input('ingredient_quant_eight');
        $ingredientEightType = $request->input('ingredient_eight_type');
        $ingredientNine = $request->input('ingredient_nine');
        $ingredientNineQuant = $request->input('ingredient_quant_nine');
        $ingredientNineType = $request->input('ingredient_nine_type');
        $ingredientTen = $request->input('ingredient_ten');
        $ingredientTenQuant = $request->input('ingredient_quant_ten');
        $ingredientTenType = $request->input('ingredient_ten_type');

        Ingredients::updateOrInsert(
            ["recipes_id" => $recipeId],
            ["recipes_id" => $recipeId,
        "ingredient_two" => $ingredientTwo,
        "ingredient_quant_two" => $ingredientTwoQuant,
        "ingredient_three" => $ingredientThree,
        "ingredient_quant_three" => $ingredientThreeQuant,
        "ingredient_four" => $ingredientFour,
        "ingredient_quant_four" => $ingredientFourQuant,
        "ingredient_five" => $ingredientFive,
        "ingredient_quant_five" => $ingredientFiveQuant,
        "ingredient_six" => $ingredientSix,
        "ingredient_quant_six" => $ingredientSixQuant,
        "ingredient_seven" => $ingredientSeven,
        "ingredient_quant_seven" => $ingredientSevenQuant,
        "ingredient_eight" => $ingredientEight,
        "ingredient_quant_eight" => $ingredientEightQuant,
        "ingredient_nine" => $ingredientNine,
        "ingredient_quant_nine" => $ingredientNineQuant,
        "ingredient_ten" => $ingredientTen,
        "ingredient_quant_ten" => $ingredientTenQuant,
        "ingredient_one_type" => $ingredientOneType,
        "ingredient_two_type" => $ingredientTwoType,
        "ingredient_three_type" => $ingredientThreeType,
        "ingredient_four_type" => $ingredientFourType,
        "ingredient_five_type" => $ingredientFiveType,
        "ingredient_six_type" => $ingredientSixType,
        "ingredient_seven_type" => $ingredientSevenType,
        "ingredient_eight_type" => $ingredientEightType,
        "ingredient_nine_type" => $ingredientNineType,
        "ingredient_ten_type" => $ingredientTenType,
        ]);

        if($request->input('product_id[]')!= null) {
            $productId[] = $request->input('product_id[]');
            $recipe->products->sync([$productId]);
        }

        return redirect()->back();
    }

    // DELETE RECIPE
    public function AdminDeleteRecipe(Request $request) {
        $id = $request->input('id');
        $recipe = Recipe::find($id);
        $recipe->delete();

        return redirect()->back();
    }
}
