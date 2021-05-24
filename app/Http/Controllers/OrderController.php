<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\DeliveryAddress;

class OrderController extends Controller
{
    // VIEWS
    public function AdminOrderOverviewView() {
        $orders = Order::all();

        return view('admin/orders_overview',[
            "orders" => $orders,
        ]);
    }

    public function AdminIncompleteOrdersView() {
        $orders = Order::where('order_status', 1)->get();

        return view('admin/incomplete_orders', [
            "orders" => $orders,
        ]);
    }

    public function AdminPickedOrdersView() {
        $orders = Order::where('order_status', 2)->get();

        return view('admin/picked_orders',[
            "orders" => $orders,
        ]);
    }

    public function AdminSentOrdersView() {
        $orders = Order::where('order_status', 3)->get();

        return view('admin/sent_orders', [
            "orders" => $orders
        ]);
    }

    public function AdminCompleteOrdersView() {
        $orders = Order::where('order_status', 4)->get();

        return view('admin/complete_orders', [
            "orders" => $orders
        ]);
    }

    public function AdminOrderView($id) {
        $order = Order::find($id);
        $products = $order->products()->get();
        $address = $order->address()->get();
        return view('admin/view_order', [
            "order" => $order,
            "products" => $products,
            "address" => $address
        ]);
    }


    // FUNCTIONS
    public function FlagOrderStatus($id, Request $request) {
        $order = Order::find($id);
        $order_status = $request->input('status');
        $order->order_status = $order_status;
        $order->save();

        return redirect()->action([
            OrderController::class, 'AdminOrderOverviewView'
        ]);
    }

    public function DeleteOrder($id) {
        $order = Order::find($id);
        $address = DeliveryAddress::find($order->delivery_address_id);
        $order->products()->detach();
        $address->orders()->delete();
        $order->delete();

        return redirect()->action([
            OrderController::Class, 'AdminOrderOverviewView'
        ]);
    }
}
