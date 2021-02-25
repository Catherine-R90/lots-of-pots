<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
// use App\Models\Address;

class OrderController extends Controller
{
    // VIEWS
    public function AdminOrderOverviewView() {
        $orders = Order::all();

        return view('admin/orders_overview',[
            "orders" => $orders,
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
    public function FlagOrderStatus($id, $request) {
        
    }

    public function DeleteOrder(Request $request) {
        $id = $request->input('id');
        $order = Order::find($id);
        $order->delete();

        return redirect()->action([
            OrderController::Class, 'AdminOrderOverviewView'
        ]);
    }
}
