<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalPaymentController extends Controller
{
    public function HandlePayment($id) {
        $data = [];
        $order = Order::find($id);
        $products = $order->products()->get();

        foreach($products as $product) {
            $name = $product->name;
            $price = $product->pivot->order_price;
            $description = $product->description;
            $qty = $product->pivot->quantity;

            $items[] =
                [
                'name' => $name,
                'price' => $price,
                'desc' => $description,
                'qty' => $qty,
                ];
        }

        if($order->delivery_option == 1) {
            $del_option = 0;
        }
        if($order->delivery_option == 2) {
            $del_option = 5;
        }
        if($order->delivery_option == 3) {
            $del_option = 10;
        }

        $data['items'] = $items;
        $data['shipping'] = $del_option;       
        $data['invoice_id'] = $order->id;
        $data['invoice_description'] = "Order #".$data['invoice_id']." Invoice";
        $data['return_url'] = url('/checkout/confirmation/'.$id);
        $data['cancel_url'] = url('/cancel-payment');

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }

        $data['subtotal'] = $total;
        $data['total'] = $total + $del_option;

        $provider = new ExpressCheckout;
        $options = [
            'BRANDNAME' => 'Lots Of Pots',
        ];
        
        $response = $provider->addOptions($options)->setExpressCheckout($data);

        return redirect($response['paypal_link']);
    }

    public function CancelPaymentView() {
        return view('payment_cancel');
    }

    public function paymentSuccessView(Request $request) {
        $paypalModule = new ExpressCheckout;
<<<<<<< HEAD
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
=======
        $response = $paypalModule->getExpressChecjoutDetails($request->token);
>>>>>>> 0831cf0753259b73cb3ece5f6b19efa2ed4e05e9

        if(in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return redirect()->action([
                [CheckoutController::class, 'CheckoutConfirmationView'], 
                ['id' => $id]
            ]);
        }

        dd('Error occured!');
    }
}
