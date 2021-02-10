<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\DeliveryAddress;
use App\Models\BillingAddress;
use App\Http\Requests\ConfirmPayment;
use App\Models\Order;
use Sesson;

class CheckoutController extends Controller
{
    // VIEWS
    public function CheckoutView() {
        $sessionId = session()->getId();
        $cart = Cart::where('session_id', $sessionId)->get();

        return view('checkout', [
            "cart" => $cart
        ]);
    }

    public function CheckoutConfirmationView($id) {
        $order = Order::find($id);
        $products = $order->products()->get();

        return view('checkout_confirm', [
            'order' => $order,
            'products' => $products
        ]);
    }

    // FUNCTIONS
    public function ConfirmPayment(ConfirmPayment $request) {
        $cartId = $request->input('cart_id');

        foreach($cartId as $carts) {
            $carts = Cart::find($carts);
            $cart[] = [
                'id' => $carts->id,
                'quantity' => $carts->quantity,
                'price' => $carts->price,
                'product' => $carts->product_id
            ];
        }

        $del_option = Cart::where('session_id', session()->getId())->value('delivery_option');
        
        $address = DeliveryAddress::create($request->all());

        $order = Order::create([
            'address_id' => $address->id,
            'order_status' => 1,
            'delivery_option' => $del_option
        ]);

        foreach ($cart as $item) {
            $order->products()->attach($item['product'], ['quantity' => $item['quantity'], 'order_price' => $item['price']]);
            $cart = Cart::find($item['id']);
            $cart->delete();
        }
        session()->flush();

        $id = $order->id;

        return redirect()->action(
            [CheckoutController::class, 'CheckoutConfirmationView'], 
            ['id' => $id]
        );
    }
}
