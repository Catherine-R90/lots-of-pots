<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductImage;
use Session;
use Jenssegers\Agent\Agent;

class CartController extends Controller
{
    // VIEWS
    public function CartView() {
        $agent = new Agent;
        $sessionId = session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->get();

        if($agent->isDesktop()) {
            return view('cart', [
                "cartItems" => $cartItems,
            ]);
        }
        if($agent->isMobile()) {
            return view('mobile_cart',[
                "cartItems" => $cartItems,
            ]);
        }
        
    }

    // FUNCTIONS
    public function AddToCart($id, Request $request) {
        $product = Product::find($id);
        $quantity = $request->input('quantity');
        $productImage = ProductImage::where('product_id', $id)->value('id');
        $sessionId = session()->getId();

        Cart::create([
            "product_id" => $product->id,
            "product_image_id" => $productImage,
            "price" => $product->price,
            "quantity" => $quantity,
            "session_id" => $sessionId,
            "delivery_option" => 0,
        ]);

        $product->stock = ($product->stock - $quantity);
        $product->save();

        return redirect()->back();  
    }

    public function AdjustCartQuantity(Request $request) {
        $quantity = $request->input('quantity');
        $id = $request->input('id');
        Cart::where('id', $id)->update(['quantity' => $quantity]);

        return redirect()->action([
            CartController::Class, 'CartView'
        ]);
    }

    public function RemoveItemCart(Request $request) {
        $id = $request->input('id');
        $cart = Cart::find($id);
        $product = Product::where('id', $cart->product_id)->first();
        $product->stock = $product->stock + $cart->quantity;
        $product->save();
        $cart->delete();

        return redirect()->back();
    }

    public function ClearCart(Request $request) {
        $sessionId = session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->get();
        foreach($cartItems as $item) {
            $product = Product::where('id', $item->product_id)->first();
            $product->stock = $product->stock + $item->quantity;
            $product->save();   
            $item->delete();
        }

        return redirect()->back();
    }

    public function AddDelivery(Request $request) {
        $deliveryOption = $request->input('del_opt');
        $sessionId = session()->getId();
        $cart = Cart::where('session_id', $sessionId)->get();
        foreach($cart as $item) {
            $item->delivery_option = $deliveryOption;
            $item->save();
        }

        return redirect()->action([
            CartController::Class, 'CartView'
        ]);
    } 
}
