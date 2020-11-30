<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function CheckoutView($id) {
        return "Hello checkout view! $id";
    }

    public function CheckoutConfirmationView($id) {
        return "Hello checkout confirmation! $id";
    }
}
