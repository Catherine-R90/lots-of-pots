<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\RecipeImage;
use App\Models\CartItems;
use App\Models\Cart;
use App\Http\Requests\AddProduct;
use Freshbitsweb\LaravelCartManager\Traits\Cartable;
use Jenssegers\Agent\Agent;

class ProductController extends Controller
{
    use Cartable;

    // VIEWS
    public function ProductView($id) {
        $agent = new Agent;
        $product = Product::find($id);
        $images = ProductImage::
                    where('product_id', $id)
                    ->get();
        $recipes = $product->recipes()->get();
        if(count($recipes) > 0) {
            $recipeImages = RecipeImage::all();
        } else {
            $recipes = null;
            $recipeImages = null;
        }

        foreach ($images as $image) {
            $imageOne = $image->image_one_name;
            $imageTwo = $image->image_two_name;
            $imageThree = $image->image_three_name;
            $imageFour = $image->image_four_name;
        }

        $details = preg_split('/[;]/', $product->details);

        if($agent->isDesktop()) {
            return view('shop/product_page', [
                "product" => $product,
                "details" => $details,
                "imageOne" => $imageOne,
                "imageTwo" => $imageTwo,
                "imageThree" => $imageThree,
                "imageFour" => $imageFour,
                "recipes" => $recipes,
                "recipeImages" => $recipeImages
            ]);
        }
        if($agent->isMobile()) {
            return view('shop/mobile_product_page', [
                "product" => $product,
                "details" => $details,
                "imageOne" => $imageOne,
                "imageTwo" => $imageTwo,
                "imageThree" => $imageThree,
                "imageFour" => $imageFour,
                "recipes" => $recipes,
                "recipeImages" => $recipeImages
            ]);
        }
            
    }

    // ADMIN PRODUCT CONTROLS
    public function AdminProductsOverviewView() {
        return view('/admin/product_manage_overview');
    }

    public function AdminAddProductView() {
        $categories = ProductCategory::all();

        return view('/admin/add_product', [
            "categories" => $categories
        ]);
    }

    public function AdminEditProductOverviewView() {
        $products = Product::all();
        return view('/admin/edit_product_overview', [
            "products" => $products
        ]);
    }

    public function AdminEditProductView($id) {
        $product = Product::find($id);
        $categories = ProductCategory::all();
        $images = ProductImage::where('product_id', $product->id)->get();

        return view('/admin/edit_product', [
            "product" => $product,
            "categories" => $categories,
            "images" => $images
        ]);
    }

    public function AdminDeleteProductView() {
        $products = Product::all();
        $images = ProductImage::all();

        return view('/admin/delete_product', [
            "products" => $products,
            "images" => $images
        ]);
    }

    // ADMIN
    // ADD PRODUCT
    public function AdminAddProduct(AddProduct $request) {
        // $imageOneName = $request->input('image_one_name');
        // $imageTwoName = $request->input('image_two_name');
        // $imageThreeName = $request->input('image_three_name');
        // $imageFourName = $request->input('image_four_name');

        $imageOneName = $request->file('image_one')->store('productImages');

        if ($request->file('image_two') != null) {
            $imageTwoName = $request->file('image_two')->store('productImages');
        } else {
            $imageTwoName = null;
        }
        if ($request->file('image_three') != null) {
            $imageThreeName = $request->file('image_three')->store('productImages');
        } else {
            $imageThreeName = null;
        }
        if ($request->file('image_four') != null) {
            $imageFourName = $request->file('image_four')->store('productImages');
        } else {
            $imageFourName = null;
        }

        $product = Product::create($request->all());

        ProductImage::create([
            'product_id' => $product->id,
            'image_one_name' => $imageOneName,
            'image_two_name' => $imageTwoName,
            'image_three_name' => $imageThreeName,
            'image_four_name' => $imageFourName
        ]);

        return redirect()->back();
    }

    // EDIT PRODUCT
    public function AdminEditProduct(Request $request) {
        $product = Product::find($request->input('id'));

        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $details = $request->input('details');
        $category = $request->input('product_category_id');

        if($name != null) {
            $product->name = $name;
        }
        if($description != null) {
            $product->description = $description;
        }
        if($price != null) {
            $product->price = $price;
        }
        if($details != null) {
            $product->details = $details;
        }
        if($category != null) {
            $product->product_category_id = $category;
        }

        $product->save();


        $imageTwoName = $request->input('image_two_name');
        $imageThreeName = $request->input('image_three_name');
        $imageFourName = $request->input('image_four_name');

        if ($request->file('image_one') != null) {
            $imageOneName = $request->file('image_one')->store('productImages');
        }
        if ($request->file('image_two') != null) {
            $imageTwoName = $request->file('image_two')->store('productImages');
        }
        if ($request->file('image_three') != null) {
            $imageThreeName = $request->file('image_three')->store('productImages');
        }
        if ($request->file('image_four') != null) {
            $imageFourName = $request->file('image_four')->store('productImages');
        }

        $image = ProductImage::where('product_id', $request->input('id'))->first();

        if($imageOneName != null) {
            $image->image_one_name = $imageOneName;
        }
        if($imageTwoName != null) {
            $image->image_two_name = $imageTwoName;
        }
        if($imageThreeName != null) {
            $image->image_three_name = $imageThreeName;
        }
        if($imageFourName != null) {
            $image->image_four_name = $imageFourName;
        }

        $image->save();

        return redirect()->back();
    }

    // DELETE PRODUCT
    public function AdminDeleteProduct(Request $request) {
        $id = $request->input('id');
        $product = Product::find($id);
        $images = $product->images()->get();
        $product->delete();
        foreach($images as $image) {
            $id = ProductImage::find($image->id);
            $id->delete();
        }
        return redirect()->back();
    }

    // DELETE IMAGE
    public function AdminDeleteImage(Request $request) {
        $id = $request->input('id');
        $image = ProductImage::find($id);
        $image->delete();
        return redirect()->back();
    }
}
