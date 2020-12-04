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
    public function RecipeView($id) {
        $recipe = Recipe::find($id);
        $images = DB::table('recipe_images')
                            ->where('recipe_id', $id)
                            ->get();
        $products = $recipe->products()->get();
        if (count($products) > 0) {
            foreach ($products as $product) {
                $productImage = ProductImage::where('product_id', $product->id)->first();
            }
        } else {
            $productImage = null;
        }
        $data = Ingredients::where('recipes_id', $id)
                            ->first();

            $ingredients = [
            $data->ingredient_one." ".$data->ingredient_quant_one." ".$data->ingredient_one_type,
            $data->ingredient_two." ".$data->ingredient_quant_two." ".$data->ingredient_two_type,
            $data->ingredient_three." ".$data->ingredient_quant_three." ".$data->ingredient_three_type,
            $data->ingredient_four." ".$data->ingredient_quant_four." ".$data->ingredient_four_type,
            $data->ingredient_five." ".$data->ingredient_quant_five." ".$data->ingredient_five_type,
            $data->ingredient_six." ".$data->ingredient_quant_six." ".$data->ingredient_six_type,
            $data->ingredient_seven." ".$data->ingredient_quant_seven." ".$data->ingredient_seven_type,
            $data->ingredient_eight." ".$data->ingredient_quant_eight." ".$data->ingredient_eight_type,
            $data->ingredient_nine." ".$data->ingredient_quant_nine." ".$data->ingredient_nine_type,
            $data->ingredient_ten." ".$data->ingredient_quant_ten." ".$data->ingredient_ten_type,
        ];

        $instructions = preg_split('/[:]/', $recipe->instructions);
        
        return view('/recipes/recipe', [
            "recipe" => $recipe,
            "images" => $images,
            "products" => $products,
            "productImage" => $productImage,
            "ingredients" => $ingredients,
            "instructions" => $instructions
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
    
        // CREATE RECIPE IMAGE
        $recipeImage = new RecipeImage;
        $recipeImage->recipe_id = $id;
        $recipeImage->image_one_name = $imageOneName;
        $recipeImage->image_two_name = $imageTwoName;
        $recipeImage->image_three_name = $imageThreeName;
        $recipeImage->save();

        // RECIPE PRODUCT
        $productId[] = $request->input('product_id');
        $products = Product::find([$productId]);
        $recipe->products()->attach($products);

        return redirect()->action(
            [IngredientsController::class, 'AdminAddIngredientsView'], ['id' => $id])
            ->with('status', 'Recipe details and images added!');
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

        if($request->input('num_of_ingredients') != null) {
            $num_of_ingredients = $request->input('num_of_ingredients');
        } else {
            $num_of_ingredients = $recipe->num_of_ingredients;
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
            'num_of_ingredients' => $num_of_ingredients
            ]);
        
        // RECIPE PRODUCT
        if ($request->input('product_id') != null) {
            $productId[] = $request->input('product_id');
            $products = Product::find([$productId]);
            $recipe->products()->sync($products);
        }

        // UPDATE IMAGES
        if ($request->input('image_one_name')!= null) {
            $imageOneName = $request->input('image_one_name');
        } else {
            $imageOneName = $image->image_one_name;
        }

        if ($request->input('image_two_name')) {
            $imageTwoName = $request->input('image_two_name');
        } else {
            $imageTwoName = $image->image_two_name;
        }

        if ($request->input('image_three_name')!= null) {
            $imageThreeName = $request->input('image_three_name');
        } else {
            $imageThreeName = $image->image_three_name;
        }
        RecipeImage::updateOrInsert(
            ['recipe_id' => $recipeId],
            ['image_one_name' => $imageOneName,
            'image_two_name' => $imageTwoName,
            'image_three_name' => $imageThreeName]
        );
        // SAVE IMAGES
        if ($request->file('image_one') != null) {
            $request->file('image_one')->storeAs('recipeImages', $imageOneName);
        }
        if ($request->file('image_two') != null) {
            $request->file('image_two')->storeAs('recipeImages', $imageTwoName);
        }
        if ($request->file('image_three') != null) {
            $request->file('image_three')->storeAs('recipeImages', $imageThreeName);
        }

        return redirect()->action(
            [IngredientsController::class, 'AdminAddIngredientsView'], ['id' => $recipeId])
            ->with('status', 'Recipe details and images updated!');
    }

    // DELETE RECIPE
    public function AdminDeleteRecipe(Request $request) {
        $id = $request->input('id');
        $recipe = Recipe::find($id);
        $recipe->products()->detach();
        $recipeImages = DB::table('recipe_images')->where('id', $recipe->id)->get();
        $recipeImages->delete();
        $recipe->delete();

        return redirect()->back()->with('status', 'Recipe and images deleted!');
    }
}
