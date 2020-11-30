<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // VIEWS
    public function CustomerOrderView($customer_id, $order_id) {
        return "Hello customer order view! $customer_id $order_id";
    }

    public function AdminOrderOverviewView() {
        return "Hello admin order overview view";
    }

    public function AdminOrderView($id) {
        return "Hello admin order view! $id";
    }


    // FUNCTIONS
    public function FlagOrderStatus($id, $request) {
        
    }
}
