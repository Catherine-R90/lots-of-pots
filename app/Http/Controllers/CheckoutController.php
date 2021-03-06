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
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirm;

class CheckoutController extends Controller
{
    // VIEWS
    public function AddAddressView() {
        $agent = new Agent;
        $sessionId = session()->getId();
        $cart = Cart::where('session_id', $sessionId)->get();

        if($agent->isDesktop()) {
            return view('add_address', [
                "cart" => $cart
            ]);
        }
        if($agent->isMobile()) {
            return view('mobile_add_address', 
            [
                "cart" => $cart
            ]);
        }
        
    }

    public function CheckoutConfirmationView($id) {
        $agent = new Agent;
        $order = Order::find($id);
        $products = $order->products()->get();
        $deliveryAddress = DeliveryAddress::where('id', $order->delivery_address_id)->first();

        Mail::to($deliveryAddress->email)->send(new OrderConfirm($order, $deliveryAddress));

        if($agent->isDesktop()) {
            return view('checkout_confirm', [
                'order' => $order,
                'products' => $products
            ]);
        }
        if($agent->isMobile()) {
            return view('mobile_checkout_confirm', [
                'order' => $order,
                'products' => $products
            ]);
        }
        
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

        $order_number = "lop".random_int(100000, 999999);

        $existing_nums = Order::all();
        
        foreach($existing_nums as $existing) {
            if($existing->order_number == $order_number) {
                $order_number = "lop".random_int(100000, 999999);
            }
        }

        $order = Order::create([
            'delivery_address_id' => $address->id,
            'order_status' => 1,
            'delivery_option' => $del_option,
            "order_number" => $order_number
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
