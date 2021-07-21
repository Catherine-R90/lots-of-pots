<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;
use App\Models\Recipe;
use App\Models\Product;
use App\Models\ProductImage;
use Jenssegers\Agent\Agent;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
class PageController extends Controller
{
    public function HomepageView() {
        $categories = ProductCategory::all();
        $recipes = Recipe::latest()->limit(5)->get();
        $products = Product::all();
        $images = ProductImage::all();
        $agent = new Agent();

        if($agent->isDesktop()) {
            return view('home', [
                "categories" => $categories,
                "recipes" => $recipes,
                "products" => $products,
                "images" => $images
            ]);
        }
        if($agent->isMobile()) {
            return view('home_mobile', [
                "categories" => $categories,
                "recipes" => $recipes,
                "products" => $products,
                "images" => $images
            ]);
        }        
    }

    public function FaqView() {
        $agent = new Agent;

        if($agent->isDesktop()) {
            return view('faqs');
        }
        if($agent->isMobile()) {
            return view('mobile_faqs');
        }
    }

    public function ReturnsAndRefundsView() {
        return view('policies');
    }

    public function PrivacyPolicyView() {
        return view("privacy_policy");
    }

    public function TermsAndConditionsView() {
        return view("t&c");
    }

    public function AdminOverviewView() {
        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin.admin_overview', [
                    'user' => $user,
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
    }
}
