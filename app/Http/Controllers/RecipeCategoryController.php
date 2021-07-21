<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;
use App\Models\RecipeCategory;
use App\Models\RecipeImage;
use Jenssegers\Agent\Agent;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class RecipeCategoryController extends Controller
{
    // VIEWS
    public function RecipeCategoryView($id) {
        $agent = new Agent;
        $allCategories = RecipeCategory::all();
        $category = RecipeCategory::find($id);
        $recipes = Recipe::where('recipe_category', $id)->get();
        $imageNames = RecipeImage::all();

        if($agent->isDesktop()) {
            return view('/recipes/recipe_category', [
                "allCategories" => $allCategories,
                "category" => $category,
                "recipes" => $recipes,
                "imageNames" => $imageNames,
            ]);
        }
        if($agent->isMobile()) {
            return view('/recipes/mobile_recipe_category', [
                "category" => $category,
                "recipes" => $recipes,
                "imageNames" => $imageNames,
            ]);
        }
    }

    // ADMIN RECIPE CATEGORY VIEWS
    public function AdminEditRecipeCategoryView() {
        $allCategories = RecipeCategory::all();
        $categoriesNotInUse = RecipeCategory::CategoriesNotInUse();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('/admin/recipes/edit_recipe_categories', [
                    "allCategories" => $allCategories,
                    "categoriesNotInUse" => $categoriesNotInUse
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
    // ADD RECIPE CATEGROY
    public function AdminAddRecipeCategory(Request $request) {
        $recipeCategory = new RecipeCategory;
        $recipeCategory->category = $request->input('recipe-category');
        $recipeCategory->save();
        return redirect()->back();
    }

    // EDIT RECIPE CATEGROY
    public function AdminEditRecipeCategory(Request $request) {
        $id = $request->input("id");
        $newCategory = $request->input("category");
        $oldCategory = RecipeCategory::find($id);
        $oldCategory->category = $newCategory;
        $oldCategory->save();
        return redirect()->back();
    }

    // DELETE RECIPE CATEGROY
    public function AdminDeleteRecipeCategory(Request $request) {
        $id = $request->input('id');
        $recipeCategory = RecipeCategory::find($id);
        $recipeCategory->delete();
        return redirect()->back();
    }
}
