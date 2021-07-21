<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\DeliveryAddress;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class OrderController extends Controller
{
    // VIEWS
    public function AdminOrderOverviewView() {
        $orders = Order::all();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin/orders/orders_overview',[
                    "orders" => $orders,
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }

    }

    public function AdminIncompleteOrdersView() {
        $orders = Order::where('order_status', 1)->get();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin/orders/incomplete_orders', [
                    "orders" => $orders,
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
        
    }

    public function AdminPickedOrdersView() {
        $orders = Order::where('order_status', 2)->get();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin/orders/picked_orders',[
                    "orders" => $orders,
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
    }

    public function AdminSentOrdersView() {
        $orders = Order::where('order_status', 3)->get();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin/orders/sent_orders', [
                    "orders" => $orders
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
    }

    public function AdminCompleteOrdersView() {
        $orders = Order::where('order_status', 4)->get();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin/orders/complete_orders', [
                    "orders" => $orders
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
    }

    public function AdminOrderView($id) {
        $order = Order::find($id);
        $products = $order->products()->get();
        $address = $order->address()->get();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin/orders/view_order', [
                    "order" => $order,
                    "products" => $products,
                    "address" => $address
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
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
