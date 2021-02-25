<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\DeliveryAddress;
use App\Models\BillingAddress;
use App\Http\Requests\AddDeliveryAddress;
use App\Models\Order;
use App\Models\PayPalPaymentController;
use Sesson;

class CheckoutController extends Controller
{
    // VIEWS
    public function AddAddressView() {
        $sessionId = session()->getId();
        $cart = Cart::where('session_id', $sessionId)->get();

        return view('add_address', [
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
    public function AddDeliveryAddress(AddDeliveryAddress $request) {
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
        
        $name = $request->input('name');
        $firstLine = $request->input('first_line');
        $secondLine = $request->input('second_line');
        $city = $request->input('city');
        $postcode = str_replace(' ', '',$request->input('postcode'));
        $phone = str_replace(' ', '', $request->input('phone_number'));
        $email = $request->input('email');
        $address = DeliveryAddress::create([
            'name' => $name,
            'first_line' => $firstLine,
            'second_line' => $secondLine,
            'city' => $city,
            'postcode' => $postcode,
            'phone_number' => $phone,
            'email' => $email
        ]);

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

        return redirect('/handle-payment/'.$id);
    }
}
