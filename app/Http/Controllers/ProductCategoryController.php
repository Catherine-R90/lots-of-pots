<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;
use App\Models\Product;
use Jenssegers\Agent\Agent;

class ProductCategoryController extends Controller
{
    public function ProductCategoryView($id) {
        $allCategories = ProductCategory::all();
        $category = ProductCategory::find($id);
        $products = Product::where('product_category_id', $id)->get();
        $agent = new Agent;

        if($agent->isDesktop()) {
            return view('/shop/product_category', [
                "allCategories" => $allCategories,
                "category" => $category,
                "products" => $products,
            ]);
        }
        if($agent->isMobile()) {
            return view('/shop/product_category_mobile', [
                "allCategories" => $allCategories,
                "category" => $category,
                "products" => $products,
            ]);
        }
    }

    // ADMIN PRODUCT CATEGORY CONTROLS
    public function AdminEditProductCategoriesView() {
        $allCategories = ProductCategory::all();
        $categoriesNotInUse = ProductCategory::CategoriesNotInUse();

        return view('/admin/edit_product_categories',  [
            "allCategories" => $allCategories,
            "categoriesNotInUse" => $categoriesNotInUse
        ]);
    }

    // FUNCTIONS
    // ADD PRODUCT CATEGORY
    public function AdminAddProductCategory(Request $request) {
        $productCategory = new ProductCategory;
        $productCategory->category = $request->input("product_category");
        $productCategory->save();
        return redirect()->back();
    }

    // EDIT PRODUCT CATEGORY
    public function AdminEditProductCategory(Request $request) {
        $id = $request->input("id");
        $newCategory = $request->input("category");
        $oldCategory = ProductCategory::find($id);
        $oldCategory->category = $newCategory;
        $oldCategory->save();
        return redirect()->back();
    }

    // DELETE PRODUCT CATEGORY
    public function AdminDeleteProductCategory(Request $request) {
        $id = $request->input("id");
        $productCategory = ProductCategory::find($id);
        $productCategory->delete();
        return redirect()->back();
    }
}
