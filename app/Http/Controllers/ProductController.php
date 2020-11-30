<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\CartItems;
use App\Models\Cart;
use App\Http\Requests\AddProduct;
use Freshbitsweb\LaravelCartManager\Traits\Cartable;

class ProductController extends Controller
{
    use Cartable;

    // VIEWS
    public function AllProductsView() {
        $products = Product::all();

        return view('all-products');
    }

    public function ProductView($id) {
        $product = Product::find($id);
        $images = DB::table('product_images')
                    ->where('product_id', $id)
                    ->get();

        foreach ($images as $image) {
            $imageOne = $image->image_one_name;
            $imageTwo = $image->image_two_name;
            $imageThree = $image->image_three_name;
            $imageFour = $image->image_four_name;
        }

        $imageNames = [
            $imageOne,
            $imageTwo,
            $imageThree,
            $imageFour
        ];

        return view('shop/product_page', [
            "product" => $product,
            "imageNames" => $imageNames
        ]);
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

    public function AdminEditProductView($id) {
        return "Hello admin edit product view! $id";
    }

    public function AdminDeleteProductView() {
        $products = Product::all();
        $images = ProductImage::all();

        return view('/admin/delete_product', [
            "products" => $products,
            "images" => $images
        ]);
    }

    
    // CUSTOMER
    // ADD TO CART
    public function addToCart(Request $request) {
        $id = $request->input('id');
        $product = Product::find($id);
        $image = ProductImage::where('product_id', $id)
        ->first();
        $cartItems = new CartItems;

        $cartItems->product_id = $id;
        $cartItems->name = $product->name;
        $cartItems->price = $product->price;
        $cartItems->image = $image->image_one_name;
        $cartItems->quantity = $request->input('quantity');

        return $cartItems->save();
    }

    // REMOVE FROM CART
    public function CustomerDeleteProduct() {
        return cart()->removeAt(request($cartIndex));
    }

    // INCREMENT CART CONTENTS
    public function incrementCartItem() {
        return cart()->incrementQuantityAt(request('cartItemIndex'));
    }

    // DECREMENT CART CONTENTS
    public function decremenetCartData() {
        return cart()->decrementQuantityAt(request('cartItemIndex'));
    }

    // CLEAR CART
    public function clearCart() {
        return cart()->clear();
    }

    // ADMIN
    // ADD PRODUCT
    public function AdminAddProduct(AddProduct $request) {
        
        $imageOneName = $request->input('image_one_name');
        $imageTwoName = $request->input('image_two_name');
        $imageThreeName = $request->input('image_three_name');
        $imageFourName = $request->input('image_four_name');

        $imageOne = $request->file('image_one')->storeAs('productImages', $imageOneName);

        if ($request->file('image_two') != null) {
            $imageTwo = $request->file('image_two')->storeAs('productImages', $imageTwoName);
        }
        if ($request->file('image_three') != null) {
            $imageThree = $request->file('image_three')->storeAs('productImages', $imageThreeName);
        }
        if ($request->file('image_four') != null) {
            $imageFour = $request->file('image_four')->storeAs('productImages', $imageFourName);
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
    public function AdminEditProduct($id, $request) {
        
    }

    // DELETE PRODUCT
    public function AdminDeleteProduct(Request $request) {
        $id = $request->input('id');
        $product = Product::find($id);
        // $imageId = $request->input('imageId');
        // $image = ProductImage::find($imageId);
        $product->delete();
        // $image->delete();
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
