<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // CUSTOMER VIEWS
    public function CustomerAccountOverviewView($id) {
        return "Hello customer account overview! $id";
    }

    public function CustomerAccountDetailsView($id) {
        return "Hello customer account details! $id";
    }

    // ADMIN VIEWS
    public function AdminAccountOverviewView() {
        return view('admin/admin_overview');
    }

    public function AdminAccountDetailsView($id) {
        return "Hello admin account details! $id";
    }


    // FUNCTIONS
    // LOGIN AND LOGOUT
    public function Login($id) {
    
    }

    public function Logout($id) {

    }

    public function EditPersonalDetails($id, $request) {

    }

    public function EditDeliveryAddress($id, $request) {

    }
}
