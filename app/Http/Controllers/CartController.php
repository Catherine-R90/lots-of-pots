<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // VIEWS
    public function CartView() {
        cart()->refreshAllItemsData();
        $cart = cart()->toArray();
        $cartAttributes = cart()->data();
        $cartTotals = cart()->totals();
        $cartItems = cart()->items($displayCurrency = true);

        return view('cart', [
            "cart" => $cart,
            "cartAttributes" => $cartAttributes,
            "cartTotals" => $cartTotals,
            "cartItems" => $cartItems
        ]);
    }


    // FUNCTIONS
    public function FreeDeliveryCalculator($subtotal) {
        
    }
}
