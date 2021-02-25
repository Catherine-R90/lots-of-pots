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
use App\Models\ProductImage;
use App\Http\Requests\AddRecipe;
use App\Http\Requests\EditRecipe;
use App\Http\Controllers\IngredientsController;

class RecipeController extends Controller
{
    // VIEWS
    // RECIPE VIEW
    public function RecipeView($id, $portion = null) {
        $recipe = Recipe::find($id);
        $images = DB::table('recipe_images')
                            ->where('recipe_id', $id)
                            ->get();
        $products = $recipe->products()->get();
        if (count($products) > 0) {
            $productImages = ProductImage::all();
        } else {
            $productImages = null;
            $products = null;
        }
        
        $data = Ingredients::where('recipes_id', $id)->first();

        if($portion == null) {
            $portion = 1;
        } else {
            $portion = $portion;
        }

        $ingredientOneQuant = $data->ingredient_quant_one * $portion;
        $ingredientTwoQuant = $data->ingredient_quant_two * $portion;
        $ingredientThreeQuant = $data->ingredient_quant_four * $portion;
        $ingredientFourQuant = $data->ingredient_quant_four * $portion;
        $ingredientFiveQuant = $data->ingredient_quant_five * $portion;
        $ingredientSixQuant = $data->ingredient_quant_six * $portion;
        $ingredientSevenQuant = $data->ingredient_quant_seven * $portion;
        $ingredientEightQuant = $data->ingredient_quant_eight * $portion;
        $ingredientNineQuant = $data->ingredient_quant_nine * $portion;
        $ingredientTenQuant = $data->ingredient_quant_ten * $portion;
        $ingredientElevenQuant = $data->ingredient_quant_eleven * $portion;
        $ingredientTwelveQuant = $data->ingredient_quant_twelve * $portion;
        $ingredientThirteenQuant = $data->ingredient_quant_thirteen * $portion;
        $ingredientFourteenQuant = $data->ingredient_quant_fourteen * $portion;
        $ingredientFifteenQuant = $data->ingredient_quant_fifteen * $portion;
        $ingredientSixteenQuant = $data->ingredient_quant_sixteen * $portion;
        $ingredientSeventeenQuant = $data->ingredient_quant_seventeen * $portion;
        $ingredientEighteenQuant = $data->ingredient_quant_eighteen * $portion;
        $ingredientNineteenQuant = $data->ingredient_quant_nineteen * $portion;
        $ingredientTwentyQuant = $data->ingredient_quant_twenty * $portion;
        

        $ingredients = [
        $data->ingredient_one." ".$ingredientOneQuant." ".$data->ingredient_one_type,
        $data->ingredient_two." ".$ingredientTwoQuant." ".$data->ingredient_two_type,
        $data->ingredient_three." ".$ingredientThreeQuant." ".$data->ingredient_three_type,
        $data->ingredient_four." ".$ingredientFourQuant." ".$data->ingredient_four_type,
        $data->ingredient_five." ".$ingredientFiveQuant." ".$data->ingredient_five_type,
        $data->ingredient_six." ".$ingredientSixQuant." ".$data->ingredient_six_type,
        $data->ingredient_seven." ".$ingredientSevenQuant." ".$data->ingredient_seven_type,
        $data->ingredient_eight." ".$ingredientEightQuant." ".$data->ingredient_eight_type,
        $data->ingredient_nine." ".$ingredientNineQuant." ".$data->ingredient_nine_type,
        $data->ingredient_ten." ".$ingredientTenQuant." ".$data->ingredient_ten_type,
        $data->ingredient_eleven." ".$ingredientElevenQuant." ".$data->ingredient_eleven_type,
        $data->ingredient_twelve." ".$ingredientTwelveQuant." ".$data->ingredient_twelve_type,
        $data->ingredient_thirteen." ".$ingredientThirteenQuant." ".$data->ingredient_thirteen_type,
        $data->ingredient_fourteen." ".$ingredientFourteenQuant." ".$data->ingredient_fourteen_type,
        $data->ingredient_fifteen." ".$ingredientFifteenQuant." ".$data->ingredient_fifteen_type,
        $data->ingredient_sixteen." ".$ingredientSixteenQuant." ".$data->ingredient_sixteen_type,
        $data->ingredient_seventeen." ".$ingredientSeventeenQuant." ".$data->ingredient_seventeen_type,
        $data->ingredient_eighteen." ".$ingredientEighteenQuant." ".$data->ingredient_eighteen_type,
        $data->ingredient_nineteen." ".$ingredientNineteenQuant." ".$data->ingredient_nineteen_type,
        $data->ingredient_twenty." ".$ingredientTwentyQuant." ".$data->ingredient_twenty_type,
        ];

        $instructions = preg_split('/[:]/', $recipe->instructions);
        
        return view('/recipes/recipe', [
            "recipe" => $recipe,
            "images" => $images,
            "products" => $products,
            "productImages" => $productImages,
            "ingredients" => $ingredients,
            "instructions" => $instructions,
            "portion" => $portion
        ]);
}

    // ADMIN RECIPE VIEW
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

    // ADD RECIPE PRODUCTS VIEW
    public function AdminAddRecipeProductView($id) {
        $recipe = Recipe::find($id);
        $products = Product::all();

        return view('admin/add_recipe_product', [
            "recipe" => $recipe,
            "products" => $products
        ]);
    }

    // DELETE RECIPE VIEW
    public function AdminDeleteRecipeView() {
        $recipes = Recipe::all();

        return view('/admin/delete_recipe',[
        "recipes" => $recipes,
        ]);
    }

    // SELECT RECIPE TO EDIT VIEW
    public function AdminSelectRecipeEditView() {
        $recipes = Recipe::all();

        return view('/admin/select_recipe_edit', [
            "recipes" => $recipes,
        ]);
    }

    // EDIT RECIPE VIEW
    public function AdminEditRecipeView($id) {
        $recipe = Recipe::find($id);
        $categories = RecipeCategory::all();
        $products = Product::all();

        return view('/admin/edit_recipe', [
            "recipe" => $recipe,
            "categories" => $categories,
            "products" => $products
        ]);
    }

    // EDIT RECIPE PRODUCTS
    public function AdminEditRecipeProductView($id) {
        $recipe = Recipe::find($id);
        $products = Product::all();

        return view('/admin/edit_recipe_product', [
            "recipe" => $recipe,
            "products" => $products
        ]);
    } 


    // FUNCTIONS
    // PORTION CALCULATOR
    public function PortionCalculator(Request $request) {
        $id = $request->input('id');
        $portion = $request->input('portion');

        return redirect()->action(
            [RecipeController::class, 'RecipeView'], 
            ['id' => $id, 
            'portion' => $portion
            ]);
    }

    // ADD RECIPE
    public function AdminAddRecipe(AddRecipe $request) {
        
        // IMAGES
        $imageOneName = $request->input('image_one_name');

        $request->file('image_one')->storeAs('recipeImages', $imageOneName);

        // CREATE RECIPE
        $recipe = Recipe::create($request->all());
        $recipeId = $recipe->id;
    
        // CREATE RECIPE IMAGE
        $recipeImage = new RecipeImage;
        $recipeImage->recipe_id = $recipeId;
        $recipeImage->image_one_name = $imageOneName;
        $recipeImage->save();

        return redirect()->action(
            [RecipeController::class, 'AdminAddRecipeProductView'], ['id' => $recipeId]);
    }

    // ADD PRODUCTS TO RECIPE
    public function AdminAddRecipeProduct(Request $request) {
        $recipe = Recipe::find($request->input('recipe_id'));
        $products = $request->input('product_id');

        $recipe->products()->attach($products);

        return redirect()->action(
            [IngredientsController::class, 'AdminAddIngredientsView'], ['id' => $recipe->id]);
    }

    // EDIT RECIPE
    public function AdminEditRecipe(EditRecipe $request) {
        // FIND RECIPE
        $recipeId = $request->input('recipe_id');
        $recipe = Recipe::find($recipeId);
        $image = RecipeImage::where('recipe_id', $recipeId)->first();

        if($request->input('name') != null) {
            $name = $request->input('name');
        } else {
            $name = $recipe->name;
        }

        if($request->input('prep_time') != null) {
            $prep_time = $request->input('prep_time');
        } else {
            $prep_time = $recipe->prep_time;
        }

        if($request->input('cook_time') != null) {
            $cook_time = $request->input('cook_time');
        } else {
            $cook_time = $recipe->cook_time;
        }

        if($request->input('instructions') != null) {
            $instructions = $request->input('instructions');
        } else {
            $instructions = $recipe->instructions;
        }

        if($request->input('recipe_category') != null) {
            $recipe_category = $request->input('recipe_category');
        } else {
            $recipe_category = $recipe->recipe_category;
        }

        if($request->input('description') != null) {
            $description = $request->input('description');
        } else {
            $description = $recipe->description;
        }

        // UPDATE RECIPE
        Recipe::updateOrInsert(
            ['id' => $recipeId], 
            ['id' => $recipeId,
            'name' => $name,
            'prep_time' => $prep_time,
            'cook_time' => $cook_time,
            'instructions' => $instructions,
            'recipe_category' => $recipe_category,
            'description' => $description,
            ]);

        // UPDATE IMAGES
        if ($request->input('image_one_name')!= null) {
            $imageOneName = $request->input('image_one_name');
        } else {
            $imageOneName = $image->image_one_name;
        }

        RecipeImage::updateOrInsert(
            ['recipe_id' => $recipeId],
            ['image_one_name' => $imageOneName]
        );
        // SAVE IMAGES
        if ($request->file('image_one') != null) {
            $request->file('image_one')->storeAs('recipeImages', $imageOneName);
        }

        return redirect()->action(
            [RecipeController::class, 'AdminEditRecipeProductView'], ['id' => $recipeId]);
    }

    // EDIT PRODUCTS FOR RECIPE
    public function AdminEditRecipeProduct(Request $request) {
        $recipe = Recipe::find($request->input('recipe_id'));
        $products = $request->input('product_id');

        if ($products != null) {
            $recipe->products()->sync($products);
        }

        return redirect()->action(
            [IngredientsController::class, 'AdminEditIngredientsView'], 
            ['id' => $recipe->id]);
    }

    // DELETE RECIPE
    public function AdminDeleteRecipe(Request $request) {
        $id = $request->input('id');
        $recipe = Recipe::find($id);
        $recipe->products()->detach();
        $ingredients = Ingredients::where('recipes_id', $recipe->id)->first();
        if ($ingredients != null) {
            $ingredients->delete();
        }
        $recipeImageId = RecipeImage::where('recipe_id', $recipe->id)->first();
        if ($recipeImageId != null) {
            $recipeImageId->delete();
        }
        $recipe->delete();

        return redirect()->back()->with('status', 'Recipe and images deleted!');
    }
}
