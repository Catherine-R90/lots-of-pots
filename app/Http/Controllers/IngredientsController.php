<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Models\RecipeCategory;
use App\Models\Recipe;
use App\Models\Ingredients;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class IngredientsController extends Controller
{
    // ADD INGREDIENTS VIEW
    public function AdminAddIngredientsView($id) {
        $recipe = Recipe::find($id);
        $num_of_ingredients = $recipe->num_of_ingredients;
        $iterations = array_fill(0, $num_of_ingredients, 'ingredient');

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin.recipes.add_ingredients', [
                    "recipe" => $recipe,
                    "iterations" => $iterations
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
        
    }

    // EDIT INGREDIENTS VIEW
    public function AdminEditIngredientsView($id) {
        $recipe = Recipe::find($id);
        $num_of_ingredients = $recipe->num_of_ingredients;
        $iterations = array_fill(0, $num_of_ingredients, 'ingredient');

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('/admin/recipes/edit_ingredients', [
                    "recipe" => $recipe,
                    "iterations" => $iterations,
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
        
    }

    // ADD INGREDIENTS
    public function AdminAddIngredients(Request $request) {
        $recipeId = $request->input('recipe_id');
        $recipe = Recipe::find($recipeId);
        $num_of_ingredients = $recipe->num_of_ingredients;
        $iterations = array_fill(0, $num_of_ingredients, 'ingredient');

        for($i = 0; $i < count($iterations); $i++) {
            foreach($iterations as $ingredient) {
                $name = $request->input('ingredient_name'.$i);
                $quant = $request->input('ingredient_quant'.$i);
                $quant_type = $request->input('ingredient_quant_type'.$i);
            }
            Ingredients::create([
                'recipe_id' => $recipe->id,
                'ingredient_name' => $name,
                'ingredient_quant' => $quant,
                'ingredient_quant_type' => $quant_type
            ]);
        }
        
        return redirect()->action(
            [RecipeController::Class, 'AdminRecipeOverviewView'])
            ->with('status', 'Ingredients added to recipe!');
    }

    // EDIT INGREDIENTS
    public function AdminEditIngredients(Request $request) {
        $recipeId = $request->input('recipe_id');
        $recipe = Recipe::find($recipeId);

        $ingredients = Ingredients::where('recipe_id', $recipeId)->get();

        

        $num_of_ingredients = $recipe->num_of_ingredients;
        $iterations = array_fill(0, $num_of_ingredients, 'ingredient');

        for($i = 0; $i < count($iterations); $i++) {
            foreach($iterations as $ingredient) {
                $name = $request->input('ingredient_name'.$i);
                $quant = $request->input('ingredient_quant'.$i);
                $quant_type = $request->input('ingredient_quant_type'.$i);
            }

            if($name != null || $quant != null || $quant_type != null) {
                foreach($ingredients as $ingredient) {
                    $ingredient->delete();
                }

                Ingredients::create([
                    'recipe_id' => $recipeId,
                    'ingredient_name' => $name,
                    'ingredient_quant' => $quant,
                    'ingredient_quant_type' => $quant_type
                ]);
            }
            
        }
        
        return redirect()->action(
            [RecipeController::Class, 'AdminRecipeOverviewView'])
            ->with('status', 'Ingredients updated on recipe!');
    }
}
