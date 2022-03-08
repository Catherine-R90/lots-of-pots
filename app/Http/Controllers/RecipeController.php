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
use App\Models\Comment;
use App\Models\CommentImage;
use App\Http\Requests\AddRecipe;
use App\Http\Requests\EditRecipe;
use App\Http\Controllers\IngredientsController;
use Jenssegers\Agent\Agent;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class RecipeController extends Controller
{
    // VIEWS
    // RECIPE VIEW
    public function RecipeView($id, $portion = null) {
        $agent = new Agent;
        $recipe = Recipe::find($id);
        $images = RecipeImage::where('recipe_id', $id)->get();
        $products = $recipe->products()->get();
        if (count($products) > 0) {
            $productImages = ProductImage::all();
        } else {
            $productImages = null;
            $products = null;
        }
        
        $ingredients = Ingredients::where('recipe_id', $id)->get();

        if($portion == null) {
            $portion = 1;
        } else {
            $portion = $portion;
        }

        $instructions = preg_split('/[:]/', $recipe->instructions);

        $comments = Comment::where("recipe_id", $recipe->id)->get();

        if ($user = Sentinel::check()) {
            $user = $user;
            $userSession = null;
        } else {
            $userSession = session()->getId();
            $user = null;
        }

        if($agent->isDesktop()) {
            return view('/recipes/recipe', [
                "recipe" => $recipe,
                "images" => $images,
                "products" => $products,
                "productImages" => $productImages,
                "ingredients" => $ingredients,
                "instructions" => $instructions,
                "portion" => $portion,
                "comments" => $comments,
                "userSession" => $userSession,
                "agent" => $agent,
                "user" => $user
            ]);
        }

        if($agent->isMobile()) {
            return view('/recipes/mobile_recipe', [
                "recipe" => $recipe,
                "images" => $images,
                "products" => $products,
                "productImages" => $productImages,
                "ingredients" => $ingredients,
                "instructions" => $instructions,
                "portion" => $portion,
                "comments" => $comments,
                "userSession" => $userSession,
                "agent" => $agent,
                "user" => $user
            ]);
        }

}

    // ADMIN RECIPE VIEW
    public function AdminRecipeOverviewView() {
        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('/admin/recipes/recipe_manage_overview');
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
    }

    public function AdminAddRecipeView() {
        $categories = RecipeCategory::all();
        $products = Product::all();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin.recipes.add_recipe',[
                    "categories" => $categories,
                    "products" => $products
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
    }

    // ADD RECIPE PRODUCTS VIEW
    public function AdminAddRecipeProductView($id) {
        $recipe = Recipe::find($id);
        $products = Product::all();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin.recipes.add_recipe_product', [
                    "recipe" => $recipe,
                    "products" => $products
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
    }

    // DELETE RECIPE VIEW
    public function AdminDeleteRecipeView() {
        $recipes = Recipe::all();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('/admin/recipes/delete_recipe',[
                    "recipes" => $recipes,
                    ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
    }

    // SELECT RECIPE TO EDIT VIEW
    public function AdminSelectRecipeEditView() {
        $recipes = Recipe::all();
        $categories = RecipeCategory::all();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('/admin/recipes/select_recipe_edit', [
                    "recipes" => $recipes,
                    "categories" => $categories
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
    }

    // EDIT RECIPE VIEW
    public function AdminEditRecipeView($id) {
        $recipe = Recipe::find($id);
        $categories = RecipeCategory::all();
        $products = Product::all();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('/admin/recipes/edit_recipe', [
                    "recipe" => $recipe,
                    "categories" => $categories,
                    "products" => $products
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
    }

    // EDIT RECIPE PRODUCTS
    public function AdminEditRecipeProductView($id) {
        $recipe = Recipe::find($id);
        $products = Product::all();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin.recipes.edit_recipe_product', [
                    "recipe" => $recipe,
                    "products" => $products
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
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
        $imageName = $request->file('image_one')->store('recipeImages');

        // CREATE RECIPE
        $recipe = Recipe::create([
            "name" => $request->input('name'),
            "prep_time" => $request->input('prep_time'),
            "cook_time" => $request->input('cook_time'),
            "instructions" => $request->input('instructions'),
            "description" => $request->input('description'),
            "recipe_category" => $request->input('recipe_category'),
            "num_of_ingredients" => $request->input('num_of_ingredients'),
        ]);
        $recipeId = $recipe->id;
    
        // CREATE RECIPE IMAGE
        RecipeImage::create([
            'image_one_name' => $imageName,
            'recipe_id' => $recipeId
        ]);

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
        // SAVE IMAGES
        if ($request->file('image_one') != null) {
            $imageOneName = $request->file('image_one')->store('recipeImages');
        } else {
            $imageOneName = $image->image_one_name;
        }

        RecipeImage::updateOrInsert(
            ['recipe_id' => $recipeId],
            ['image_one_name' => $imageOneName]
        );

        return redirect()->action(
            [RecipeController::class, 'AdminEditRecipeProductView'], 
            ['id' => $recipeId]);
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
        $ingredients = Ingredients::where('recipe_id', $recipe->id)->get();
        if ($ingredients != null) {
            foreach($ingredients as $ingredient) {
                $ingredient->delete();
            }
        }
        $recipeImageId = RecipeImage::where('recipe_id', $recipe->id)->first();
        if ($recipeImageId != null) {
            $recipeImageId->delete();
        }
        $recipe->delete();

        return redirect()->back()->with('status', 'Recipe and images deleted!');
    }
}
