<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;
use App\Models\Recipe;
use App\Models\Product;
use App\Models\ProductImage;

class PageController extends Controller
{
    public function HomepageView() {
        $primaryCategories = DB::table('product_categories')->where('id', '<=', 2)->get();
        foreach($primaryCategories as $primaryCategory) {
            $productId = Product::where('product_category_id', $primaryCategory->id);
            $primaryImage = ProductImage::where('product_id', $productId)->value('image_one_name');
        }
        $secondaryCategories = DB::table('product_categories')->where('id', '>', 2)->get();

        $recipes = DB::table('recipes')->latest()->limit(5)->get();
        return view('home', [
            "primaryCategories" => $primaryCategories,
            "primaryImage" => $primaryImage,
            "secondaryCategories" => $secondaryCategories,
            "recipes" => $recipes
        ]);
    }

    public function FaqView() {
        return view('faqs');
    }

    public function ReturnsAndRefundsView() {
        return "Hello returns and refunds view!";
    }

    public function PrivacyPolicyView() {
        return "Hello privacy policy view!";
    }

    public function TermsAndConditionsView() {
        return "Hello terms and conditions view!";
    }
}
